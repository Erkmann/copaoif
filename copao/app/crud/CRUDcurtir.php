<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 12/06/18
 * Time: 13:12
 */
require_once "../model/DBConexao.php";
require_once "../model/Curtir.php";

class CRUDcurtir
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConexao::getConexao();
    }

    //INSERT
    public function InsertCurtida(Curtir $c) {
        $sql = "INSERT INTO `curtir`(`time_id_time`, `usuario_id_usuario`) VALUES ('{$c->getIdTime()}','{$c->getIdUsuario()}')";
        $this->conexao->exec($sql);
    }
    //END INSERT

    //DELETE
    public function DeleteCurtida(Curtir $c) {
        $sql = "DELETE FROM curtir WHERE usuario_id_usuario = '{$c->getIdUsuario()}' AND time_id_time = '{$c->getIdTime()}'";
        $this->conexao->exec($sql);
    }
    //END DELETE

    //getcurtit
    public function getCurtidas() {
        $sql = "SELECT * FROM `curtir`";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $arrayCurtidas = array();

        foreach ($resultado as $res){
            $id_time = $res['time_id_time'];
            $id_usuario = $res['usuario_id_usuario'];

            $curtidaObj = new Curtir($id_time, $id_usuario);
            $arrayCurtidas[] = $curtidaObj;
        }

        return $arrayCurtidas;
    }
    //END getcurtir

    public function getCurtidaExata(Curtir $c)
    {
        $sql = "SELECT COUNT(*) as qtd_curtidas FROM `curtir` WHERE `time_id_time` = '{$c->getIdTime()}' AND `usuario_id_usuario` = {$c->getIdUsuario()}";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $resultado['qtd_curtidas'];

        return $qtd_c;

    }

    public function getCurtidaPorTime(Curtir $c)
    {
        $sql = "SELECT COUNT(*) as qtd_curtidas FROM `curtir` WHERE `time_id_time` = '{$c->getIdTime()}'";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $resultado['qtd_curtidas'];

        return $qtd_c;

    }

}

//TESTE

    //$a = new Curtir(9, 3);
    //$b = new CRUDcurtir();
    //$c = $b->getCurtidaPorTime($a);
    //echo $c;
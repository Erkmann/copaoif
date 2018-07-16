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
    public function InsertCurtida($id_usuario, $id_time) {
        $sql = "INSERT INTO `curtir`(`id_time`, `id_usuario`) VALUES ('{$id_time}','{$id_usuario}')";
        $this->conexao->exec($sql);
    }
    //END INSERT

    //DELETE
    public function DeleteCurtida($id_usuario, $id_time) {
        $sql = "DELETE FROM curtir WHERE id_usuario = '{$id_usuario}' AND id_time = '{$id_time}'";
        $this->conexao->exec($sql);
    }
    //END DELETE

    //getcurtit
    public function getCurtidas() {
        $sql = "SELECT * FROM `curtir`";
        $resultado = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $arrayCurtidas = array();

        foreach ($resultado as $res){
            $id_time = $res['id_time'];
            $id_usuario = $res['id_usuario'];

            $curtidaObj = new Curtir($id_time, $id_usuario);
            $arrayCurtidas[] = $curtidaObj;
        }

        return $arrayCurtidas;
    }
    //END getcurtir
}
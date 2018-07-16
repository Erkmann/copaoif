<?php
/**
 * Created by PhpStorm.
 * User: Henrique Hartmann
 * Date: 10/06/2018
 * Time: 16:36
 */
require_once "../model/DBConexao.php";
require_once "../model/Jogador.php";
require_once "../model/Time.php";
require_once "../crud/CRUDtime.php";

class CRUDjogador
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = DBConexao::getConexao();
    }

    //INSERT
    public function InsertJogador(Jogador $jogador) {
        $sql = "INSERT INTO jogador (numero_camisa, nome, gols, cartao_amarelo, cartao_vermelho, id_time) 
                VALUES ('{$jogador->getNumeroCamisa()}', '{$jogador->getNome()}', '{$jogador->getGols()}',
                        '{$jogador->getCartaoAmarelo()}', '{$jogador->getCartaoVermelho()}', '{$jogador->getIdTime()}')";
            $this->conexao->exec($sql);
    }
    //END INSERT

    //UPDATE
    public function UpdateJogador(Jogador $jogador) {
        $sql = "UPDATE jogador 
                SET id_jogador='{$jogador->getIdJogador()}', numero_camisa='{$jogador->getNumeroCamisa()}',
                    nome='{$jogador->getNome()}', gols='{$jogador->getGols()}', cartao_amarelo='{$jogador->getCartaoAmarelo()}',
                    cartao_vermelho='{$jogador->getCartaoVermelho()}', id_time='{$jogador->getIdTime()}'
                WHERE id_jogador=".$jogador->getIdJogador();
            $this->conexao->exec($sql);
    }
    //END UPDATE

    //DELETE
    public function DeleteJogador(int $codigo) {
        $sql = "DELETE FROM jogador WHERE id_jogador=".$codigo;
        $this->conexao->exec($sql);
    }
    //END DELETE

    //getJOGADORES
    public function getJogadores() {
        $sql = "SELECT * FROM jogador";
        $resultado = $this->conexao->query($sql);
        $jogadores = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $listaJogadores = array();
        foreach ($jogadores as $jogador) {
            $id = $jogador['id_jogador'];
            $camisa = $jogador['numero_camisa'];
            $nome = $jogador['nome'];
            $gols = $jogador['gols'];
            $amarelo = $jogador['cartao_amarelo'];
            $vermelho = $jogador['cartao_vermelho'];
            $time = $jogador['id_time'];
            $obj = new Jogador($id, $camisa, $nome, $gols, $amarelo, $vermelho, $time);
            $listaJogadores[] = $obj;
        }
        return $listaJogadores;

    }

    public function getJogadoresGol(){
    $sql = "SELECT * FROM `jogador` ORDER BY `jogador`.`gols` desc";
        $resultado = $this->conexao->query($sql);
        $jogadores = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $listaJogadores = array();
        foreach ($jogadores as $jogador) {
            $id = $jogador['id_jogador'];
            $camisa = $jogador['numero_camisa'];
            $nome = $jogador['nome'];
            $gols = $jogador['gols'];
            $amarelo = $jogador['cartao_amarelo'];
            $vermelho = $jogador['cartao_vermelho'];
            $time = $jogador['id_time'];
            $obj = new Jogador($id, $camisa, $nome, $gols, $amarelo, $vermelho, $time);
            $listaJogadores[] = $obj;
        }
        return $listaJogadores;
    }
    //END getJOGADORES

    //getJOGADOR
    public function getJogador(int $id) {
        $sql = "SELECT * FROM jogador WHERE id_jogador=".$id;
        $resultado = $this->conexao->query($sql);
        $jogador = $resultado->fetch(PDO::FETCH_ASSOC);
        $objjogador = new Jogador($jogador['id_jogador'], $jogador['numero_camisa'], $jogador['nome'],
                                  $jogador['gols'], $jogador['cartao_amarelo'], $jogador['cartao_vermelho'],
                                  $jogador['id_time']);
//        var_dump($objjogador);
        return $objjogador;
    }
    //END getJOGADOR

    //getTIME
    public function getTime(int $codigo) {
        $sql = "SELECT * FROM time INNER JOIN jogador ON time.id_time = jogador.id_time WHERE jogador.id_time ='{$codigo}' LIMIT 1";
        $resultado = $this->conexao->query($sql);
        $time = $resultado->fetch(PDO::FETCH_ASSOC);
        $objtime = new Time($time['id_time'], $time['logo'], $time['nome_time'], $time['pontos'], $time['cor']);
        return $objtime;
    }
    //END getTIME
}

//$a = new CRUDjogador();
//$j = $a->getJogadoresGol();
//print_r($j);


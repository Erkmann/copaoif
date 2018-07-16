<?php

require_once "../model/DBConexao.php";
require_once "../model/Partida.php";

class CRUDpartida
{
    private $conexao;

    public function __construct(){
        $this->conexao = DBConexao::getConexao();
    }

    //INSERT
    public function insertPartida(Partida $partida){

        $sql = "INSERT INTO `partida` (`id_partida`, `id_time_mandante`, `id_time_visitante`, `data`, `resultadoTimeA`, `resultadoTimeB`, `vencedor`)  VALUES (null,'{$partida->getIdTimeMandante()}','{$partida->getIdTimeVisitante()}','{$partida->getData()}','{$partida->getResultadoTimeA()}','{$partida->getResultadoTimeB()}','{$partida->getVencedor()}')";
        try{$this->conexao->exec($sql);}catch (Exception $e){
            echo "Execao Capturada: $e->getMessage()";
        }

    }

    public function getPartidasTime($id){
        $sql = "SELECT * FROM partida, time WHERE partida.id_time_mandante = time.id_time OR partida.id_time_visitante = time.id_time AND time.id_time = '{$id}' ORDER BY id_partida DESC ";
        $partida = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $partidas = array();
        foreach ($partida as $p){
            $pa = new Partida($p['id_partida'], $p['id_time_mandante'], $p['id_time_visitante'], $p['data'], $p['resultadoTimeA'], $p['resultadoTimeB'], $p['vencedor']);
            $partidas[] = $pa;
        }

        return $partidas;

    }


    //DELETE
    public function deletePartida(Partida $excluir){
        $sql = "DELETE FROM partida WHERE id_partida=".$excluir;

        $this->conexao->exec($sql);
    }

    //UPDATE
    public function updatePartida(Partida $partida, $id){
        $sql = "UPDATE `partida` SET `id_partida`= '{$id}',`id_time_mandante`='{$partida->getIdTimeMandante()}',`id_time_visitante`='{$partida->getIdTimeVisitante()}',`data`='{$partida->getData()}',`resultadoTimeA`='{$partida->getResultadoTimeA()}',`resultadoTimeB`='{$partida->getResultadoTimeB()}',`vencedor`='{$partida->getVencedor()}' WHERE id_partida='{$id}'";

        try{$this->conexao->exec($sql);}catch (Exception $e){echo $e->getMessage();}
    }

    //GET PARTIDA
    public function getPartida(int $id){
        $sql = "SELECT * FROM partida WHERE id_partida=".$id;
        $result = $this->conexao->query($sql);
        $partida = $result->fetch(PDO::FETCH_ASSOC);
        $objPArtida = new Partida($partida['id_partida'], $partida['id_time_mandante'], $partida['id_time_visitante'], $partida['data'], $partida['resultadoTimeA'], $partida['resultadoTimeB'], $partida['vencedor']);

        return $objPArtida;
    }

    //GET PARTIDAS
    public function getPartidas(){
        $sql = "SELECT * FROM partida";
        $result = $this->conexao->query($sql);
        $partidas = $result->fetchAll(PDO::FETCH_ASSOC);
        foreach ($partidas as $partida){
            $idpar = $partida['id_partida'];
            $idtimeman = $partida['id_time_mandante'];
            $idtimevisi = $partida['id_time_visitante'];
            $data = $partida['data'];
            $obj = new Partida($idpar, $idtimeman, $idtimevisi, $data, $partida['resultadoTimeA'], $partida['resultadoTimeB'], $partida['vencedor']);
            $listapartidas[] = $obj;
        }

        return $listapartidas;
    }
}
<?php

require_once "../model/DBConexao.php";
require_once "../model/Time.php";
require_once "../model/Jogador.php";

class CRUDtime
{
    public $conexao;
    public function __construct()
    {
        $this->conexao = DBConexao::getConexao();
    }

    public function getTimesC(){
        $sql = "SELECT * from time order by pontos desc ";
        $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $resultado = array();
        foreach ($res as $r){
            $t = new Time($r['id_time'], $r['logo'], $r['nome_time'], $r['pontos'], $r['cor']);
            $resultado[] = $t;
        }

        return $resultado;
    }

    public function getTimes(){
        $sql = "SELECT * from time";
        $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $resultado = array();
        foreach ($res as $r){
            $t = new Time($r['id_time'], $r['logo'], $r['nome_time'], $r['pontos'], $r['cor']);
            $resultado[] = $t;
        }

        return $resultado;
    }

    public function getTimesPontos(){
        $sql = "SELECT * FROM `time` ORDER BY `time`.`pontos` DESC";
        $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $resultado = array();
        foreach ($res as $r){
            $t = new Time($r['id_time'], $r['logo'], $r['nome_time'], $r['pontos'], $r['cor']);
            $resultado[] = $t;
        }

        return $resultado;
    }

    public function getPartidasTime($id){
        $sql = "SELECT * FROM partida WHERE partida.id_time_mandante = '{$id}' OR partida.id_time_visitante = '{$id}' ORDER BY id_partida DESC ";
        $partida = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $partidas = array();
        foreach ($partida as $p){
            $pa = new Partida($p['id_partida'], $p['id_time_mandante'], $p['id_time_visitante'], $p['data'], $p['resultadoTimeA'], $p['resultadoTimeB'], $p['vencedor']);
            $partidas[] = $pa;
        }

        return $partidas;

    }

    
    public function getTime($id){
        $sql = "SELECT * FROM time WHERE id_time = '{$id}'";

        $res = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);
        $resultado = new Time($res['id_time'], $res['logo'], $res['nome_time'], $res['pontos'], $res['cor']);

        return $resultado;
    }


    public function vitoria($id){
        $a = $this->getTime($id);
        $novoP = $a->getPontos() + 3;

        $sql = "UPDATE time SET id_time = '{$a->getIdTime()}', logo = '{$a->getLogo()}', nome_time = '{$a->getNomeTime()}', pontos = '{$novoP}', cor = '{$a->getCor()}' WHERE id_time = '{$id}'";
        try{$this->conexao->exec($sql);}catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }

    }

    public function empate($id){
        $a = $this->getTime($id);
        $novoP = $a->getPontos() + 1;

        $sql = "UPDATE time SET id_time = '{$a->getIdTime()}', logo = '{$a->getLogo()}', nome_time = '{$a->getNomeTime()}', pontos = '{$novoP}', cor = '{$a->getCor()}' WHERE id_time = '{$id}'";
        try{$this->conexao->exec($sql);}catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function getJogadores($id){
        $sql = "SELECT * FROM jogador, time WHERE jogador.id_time = time.id_time AND jogador.id_time = '{$id}' ORDER BY `jogador`.`numero_camisa` ASC";

        $res = $this->conexao->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $resultado = array();

        foreach ($res as $r){
            $jogador = new Jogador($r['id_jogador'], $r['numero_camisa'], $r['nome'], $r['gols'], $r['cartao_amarelo'], $r['cartao_vermelho'], $r['id_time']);
            $resultado[] = $jogador;
        }

        return $resultado;
    }

    public function insertTime(Time $time){
        $sql = "INSERT INTO time (`id_time`, `logo`, `nome_time`, `pontos`, `cor`) values ('{$time->getIdTime()}', '{$time->getLogo()}', '{$time->getNomeTime()}', '{$time->getPontos()}', '{$time->getCor()}')";
        $this->conexao->exec($sql);
    }

    public function deleteTime($id){
        $sql = "DELETE FROM `time` WHERE id_time =  '{$id}'";
        $this->conexao->exec($sql);

    }

    public function updateTime(Time $a){
        $sql = "UPDATE time SET id_time = '{$a->getIdTime()}', logo = '{$a->getLogo()}', nome_time = '{$a->getNomeTime()}', pontos = '{$a->getPontos()}', cor = '{$a->getCor()}' WHERE id_time = '{$a->getIdTime()}'";
        try{$this->conexao->exec($sql);}catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        }
    }

    public function getCurtidaPorTime(Time $t)
    {
        $sql = "SELECT COUNT(*) as qtd_curtidas FROM `curtir` WHERE `time_id_time` = '{$t->getIdTime()}'";
        $resultado = $this->conexao->query($sql)->fetch(PDO::FETCH_ASSOC);

        $qtd_c = $resultado['qtd_curtidas'];

        return $qtd_c;

    }
}




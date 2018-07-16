<?php

class Partida
{
    private $id_partida;
    private $id_time_mandante;
    private $id_time_visitante;
    private $data;
    private $resultadoTimeA;
    private $resultadoTimeB;
    private $vencedor;

    public function __construct($id_partida, $id_time_mandante, $id_time_visitante, $data, $resultadoA, $resultadoB, $vencedor)
    {
        $this->id_partida = $id_partida;
        $this->id_time_mandante = $id_time_mandante;
        $this->id_time_visitante = $id_time_visitante;
        $this->data = $data;
        $this->resultadoTimeA = $resultadoA;
        $this->resultadoTimeB = $resultadoB;
        $this->vencedor = $vencedor;
    }

    public function getIdPartida()
    {
        return $this->id_partida;
    }

    public function setIdPartida($id_partida)
    {
        $this->id_partida = $id_partida;
    }

    public function getIdTimeMandante()
    {
        return $this->id_time_mandante;
    }

    public function setIdTimeMandante($id_time_mandante)
    {
        $this->id_time_mandante = $id_time_mandante;
    }

    public function getIdTimeVisitante()
    {
        return $this->id_time_visitante;
    }

    public function setIdTimeVisitante($id_time_visitante)
    {
        $this->id_time_visitante = $id_time_visitante;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getResultadoTimeA()
    {
        return $this->resultadoTimeA;
    }

    public function setResultadoTimeA($resultadoTimeA)
    {
        $this->resultadoTimeA = $resultadoTimeA;
    }

    public function getResultadoTimeB()
    {
        return $this->resultadoTimeB;
    }

    public function setResultadoTimeB($resultadoTimeB)
    {
        $this->resultadoTimeB = $resultadoTimeB;
    }

    public function getVencedor()
    {
        return $this->vencedor;
    }

    public function setVencedor($vencedor)
    {
        $this->vencedor = $vencedor;
    }







}

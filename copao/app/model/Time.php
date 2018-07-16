<?php

class Time
{
    private $id_time;
    private $logo;
    private $nome_time;
    private $pontos;
    private $cor;

    public function __construct($id_time, $logo, $nome_time, $pontos, $cor)
    {
        $this->id_time = $id_time;
        $this->logo = $logo;
        $this->nome_time = $nome_time;
        $this->pontos = $pontos;
        $this->cor = $cor;
    }

    public function getIdTime()
    {
        return $this->id_time;
    }

    public function setIdTime($id_time)
    {
        $this->id_time = $id_time;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getNomeTime()
    {
        return $this->nome_time;
    }

    public function setNomeTime($nome_time)
    {
        $this->nome_time = $nome_time;
    }

    public function getPontos()
    {
        return $this->pontos;
    }

    public function setPontos($pontos)
    {
        $this->pontos = $pontos;
    }

    public function getCor()
    {
        return $this->cor;
    }

    public function setCor($cor)
    {
        $this->cor = $cor;
    }

}
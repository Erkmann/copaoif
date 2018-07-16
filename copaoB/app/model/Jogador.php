<?php

class Jogador
{

    private $id_jogador;
    private $numero_camisa;
    private $nome;
    private $gols;
    private $cartao_amarelo;
    private $cartao_vermelho;
    private $id_time;

    public function __construct($id_jogador, $numero_camisa, $nome, $gols, $cartao_amarelo, $cartao_vermelho, $id_time)
    {
        $this->id_jogador = $id_jogador;
        $this->numero_camisa = $numero_camisa;
        $this->nome = $nome;
        $this->gols = $gols;
        $this->cartao_amarelo = $cartao_amarelo;
        $this->cartao_vermelho = $cartao_vermelho;
        $this->id_time = $id_time;
    }

    public function getIdJogador()
    {
        return $this->id_jogador;
    }

    public function setIdJogador($id_jogador)
    {
        $this->id_jogador = $id_jogador;
    }

    public function getNumeroCamisa()
    {
        return $this->numero_camisa;
    }

    public function setNumeroCamisa($numero_camisa)
    {
        $this->numero_camisa = $numero_camisa;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getGols()
    {
        return $this->gols;
    }

    public function setGols($gols)
    {
        $this->gols = $gols;
    }

    public function getCartaoAmarelo()
    {
        return $this->cartao_amarelo;
    }

    public function setCartaoAmarelo($cartao_amarelo)
    {
        $this->cartao_amarelo = $cartao_amarelo;
    }

    public function getCartaoVermelho()
    {
        return $this->cartao_vermelho;
    }

    public function setCartaoVermelho($cartao_vermelho)
    {
        $this->cartao_vermelho = $cartao_vermelho;
    }

    public function getIdTime()
    {
        return $this->id_time;
    }

    public function setIdTime($id_time)
    {
        $this->id_time = $id_time;
    }


}
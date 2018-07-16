<?php

class Usuario
{

    private $id_usuario;
    private $nome_usuario;
    private $id_tipo_usuario;
    private $senha;
    private $email;



    public function __construct($id_usuario, $nome_usuario, $id_tipo_usuario, $senha, $email)
    {
        $this->id_usuario = $id_usuario;
        $this->nome_usuario = $nome_usuario;
        $this->id_tipo_usuario = $id_tipo_usuario;
        $this->senha = $senha;
        $this->email = $email;

    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getNomeUsuario()
    {
        return $this->nome_usuario;
    }

    public function setNomeUsuario($nome_usuario)
    {
        $this->nome_usuario = $nome_usuario;
    }

    public function getIdTipoUsuario()
    {
        return $this->id_tipo_usuario;
    }

    public function setIdTipoUsuario($id_tipo_usuario)
    {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

}
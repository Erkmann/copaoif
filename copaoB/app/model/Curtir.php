<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 12/06/18
 * Time: 13:37
 */

class Curtir
{
    private $id_usuario;
    private $id_time;

    public function __construct($id_usuario, $id_time)
    {
        $this->id_usuario = $id_usuario;
        $this->id_time = $id_time;
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getIdTime()
    {
        return $this->id_time;
    }

    public function setIdTime($id_time): void
    {
        $this->id_time = $id_time;
    }

}
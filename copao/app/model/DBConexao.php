<?php

class DBConexao
{
    const HOST = "localhost";
    const NOMEBANCO = "id6474734_copao";
    const USUARIO = "id6474734_copao";
    const SENHA = "copaoifc2018";



    public static function getConexao(){
        $conexao = new PDO("mysql:host=".self::HOST.";dbname=".self::NOMEBANCO.";charset=utf8", self::USUARIO, self::SENHA);
        return $conexao;

    }



}
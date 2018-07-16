<?php
/**
 * Created by PhpStorm.
 * User: Henrique Hartmann
 * Date: 09/06/2018
 * Time: 14:37
 */
require_once "../model/DBConexao.php";
require_once "../model/Usuario.php";

class CRUDusuario
{
    private $conexao;
    public function __construct()
    {
        $this->conexao = DBConexao::getConexao();
    }

    //INSERT
    public function InsertUsuario(Usuario $user) {
        $sql = "INSERT INTO usuario (nome_usuario, id_tipo_usuario, email, senha) 
                VALUES ('{$user->getNomeUsuario()}', 1, '{$user->getEmail()}', '{$user->getSenha()}')";
            $this->conexao->exec($sql);
    }
    //END INSERT

    //UPDATE
    public function UpdateUsuario(Usuario $user) {
        $sql = "UPDATE usuario 
                SET id_usuario='{$user->getIdUsuario()}',nome_usuario='{$user->getNomeUsuario()}',
                    id_tipo_usuario='{$user->getIdTipoUsuario()}',email='{$user->getEmail()}',senha='{$user->getSenha()}' 
                WHERE id_usuario ='{$user->getIdUsuario()}'";
            $this->conexao->exec($sql);
    }
    //END UPDATE

    //DELETE
    public function DeleteUsuarios(int $codigo) {
        $sql = "DELETE FROM usuario WHERE id_usuario=".$codigo;
            $this->conexao->exec($sql);
    }
    //END DELETE

    //getUsuarios
    public function getUsuarios() {
        $sql = "SELECT * FROM usuario";
        $resultado = $this->conexao->query($sql);
        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usuarios as $usuario) {
            $id = $usuario['id_usuario'];
            $nome = $usuario['nome_usuario'];
            $tipo = $usuario['id_tipo_usuario'];
            $senha = $usuario['senha'];
            $email = $usuario['email'];
            $obj = new Usuario($id, $nome, $tipo, $senha, $email);
            $listaUsuarios[] = $obj;
        }
        return $listaUsuarios;
    }
    //END getUSUARIOS

    //getUSUARIO
    public function getUsuario(int $id) {
        $sql = "SELECT * FROM usuario WHERE id_usuario=".$id;
        $resultado = $this->conexao->query($sql);
        $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
        $objuser = new Usuario($usuario['id_usuario'], $usuario['nome_usuario'], $usuario['id_tipo_usuario'], $usuario['senha'], $usuario['email']);
//        var_dump($objuser);
        return $objuser;
    }
    //END getUSUARIO

    public function verificaLogin($email, $senha){
        $sql = "SELECT email, senha FROM usuario WHERE senha = '{$senha}' and email = '{$email}'";
        $b = $this->conexao->query($sql);
        $resultado = $b->fetch(PDO::FETCH_ASSOC);


        $count = count($resultado);


        if($count == 1){
            return "nao";
        }

        else {return "sim";}

    }
}

//TESTE
//$user = new Usuario(2, 'testeeeex', '1', 'testeeeeek', 'testeee@gmail.com');
//$crud = new CRUDusuario();
//$a = $crud->verificaLogin("copaoifc@gmail.com", "copao");
////$crud->UpdateUsuario($user);
////$usuarios = $crud->getUsuarios();
//echo $a;
//END TESTE
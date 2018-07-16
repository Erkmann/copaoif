<?php
/**
 * Created by PhpStorm.
 * User: Henrique Hartmann
 * Date: 09/06/2018
 * Time: 14:56
 */
require_once "../app/model/CRUDusuario.php";

if (!isset($_GET['acao'])){
        header('location: ../../Teste/index.html');
}else {

    switch ($_GET['acao']) {

        case 'cadastrar':
            $user = new Usuario('', $_POST['nome'], '', $_POST['senha'], $_POST['email']);
            $cruduser = new CRUDusuario();
            $cruduser->InsertUsuario($user);
            header('location: controleAcao.php?acao=lista');
        break;

        case 'atualizar':
            $codigo = $_GET['codigo'];
            $user = new Usuario($_POST['id'], $_POST['nome'], $_POST['tipo'], $_POST['senha'], $_POST['email']);
            $cruduser = new CRUDusuario();
            $cruduser->UpdateUsuario($user, $codigo);
//            echo "id:".$_POST['id']."/ nome:".$_POST['nome']."/ tipo:".$_POST['tipo']."/ senha:".$_POST['senha']."/ email:".$_POST['email'];
            header('location: controleAcao.php?acao=lista');
        break;

        case 'lista':
            $cruduser = new CRUDusuario();
            $usuarios = $cruduser->getUsuarios();
            require_once "listausuario.php";
        break;

        case 'editar':
            $codigo = $_GET['codigo'];
            $cruduser = new CRUDusuario();
            $usuario = $cruduser->getUsuario($codigo);
            require_once "formdoupdate.php";
        break;

        case 'excluir':
            $codigo = $_GET['codigo'];
            $cruduser = new CRUDusuario();
            $cruduser->DeleteUsuarios($codigo);
            header('location: controleAcao.php?acao=lista');
        break;
    }
}
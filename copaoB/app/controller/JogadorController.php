<?php

require_once "../crud/CRUDjogador.php";
require_once "../crud/CRUDtime.php";

ini_set('display_errors', '0'); 


function lista() {
    $crud = new CRUDjogador();
    $jogadores = $crud->getJogadores();
    include_once "../views/adminJogadores.php";
}

function jogC() {
    $jogador = new Jogador('', $_POST['numero_camisa'], $_POST['nome'], $_POST['gols'], $_POST['cartao_amarelo'], $_POST['cartao_vermelho'], $_POST['id_time']);
    $crud = new CRUDjogador();
    $crud->InsertJogador($jogador);

    header('location: JogadorController.php?acao=index');
}

function jogU() {
    $jogador = new Jogador($_POST['id_jogador'], $_POST['numero_camisa'], $_POST['nome'], $_POST['gols'], $_POST['cartao_amarelo'], $_POST['cartao_vermelho'], $_POST['id_time']);
    $crud = new CRUDjogador();
    $crud->UpdateJogador($jogador);

    header('location: JogadorController.php?acao=index');
}

function jogD($id) {
    $crud = new CRUDjogador();
    $crud->DeleteJogador($id);

    header('location: JogadorController.php?acao=index');
}

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}

switch ($acao){
    case 'index':
        lista();
    break;

    case 'cadjog':
        include_once "../views/formJogadorCad.php";
    break;

    case 'cadjogconf':
        jogC();
    break;

    case 'editar':
        $t = new CRUDtime();
        $id = $_GET['id'];
        $times = $t->getTimes();
        $crud = new CRUDjogador();
        $jogador = $crud->getJogador($id);
        include_once "../views/formJogadorUpd.php";
    break;

    case 'editarjogconf':
        $id = $_GET['id'];
        jogU();
     break;

    case 'excluir':
        $id = $_GET['id'];
        jogD($id);
    break;

    case 'artilheiros':
        $crudTime = new CRUDtime();
        $crudJogadores = new CRUDjogador();
        $artilheiros = $crudJogadores->getJogadoresGol();

        $count = count($artilheiros);
        $arrayTimes = array();
        foreach ($artilheiros as $artilheiro){
            $time = $crudTime->getTime($artilheiro->getIdTime());
            $arrayTimes[] = $time;
        }

        include_once "../views/artilheiros.php";
}
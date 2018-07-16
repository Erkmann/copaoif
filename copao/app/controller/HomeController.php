<?php

require_once __DIR__."/../crud/CRUDtime.php";
require_once __DIR__."/../crud/CRUDjogador.php";
require_once __DIR__."/../crud/CRUDpartida.php";

session_start();

ini_set('display_errors', '0'); 


function index(){

    $crudTime = new CRUDtime();
    $times = $crudTime->getTimesC();
    $timesP = $crudTime->getTimesPontos();
    $crudJogadores = new CRUDjogador();

    $artilheiros = $crudJogadores->getJogadoresGol();

    $arrayTimes = array();
    foreach ($artilheiros as $artilheiro){
        $time = $crudTime->getTime($artilheiro->getIdTime());
        $arrayTimes[] = $time;
    }

    $partida = new CRUDpartida();
    $partidas = $partida->getPartidas3();






    include_once "../views/index.php";
}

function indexLogado(){

    $crudTime = new CRUDtime();
    $times = $crudTime->getTimesC();
    $timesP = $crudTime->getTimesPontos();
    $crudJogadores = new CRUDjogador();

    $artilheiros = $crudJogadores->getJogadoresGol();

    $arrayTimes = array();
    foreach ($artilheiros as $artilheiro){
        $time = $crudTime->getTime($artilheiro->getIdTime());
        $arrayTimes[] = $time;
    }

    $partida = new CRUDpartida();
    $partidas = $partida->getPartidas3();

    $user = $_SESSION['nome'];
    $tipo = $_SESSION['tipo'];

    $logado = ['tipo' => $tipo];

    include_once "../views/index.php";
}



if (!isset($_SESSION['tipo'])){
    index();
}

if (isset($_SESSION['tipo'])){
    indexLogado();
}


?>
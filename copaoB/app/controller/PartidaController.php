<?php

    include_once "../crud/CRUDpartida.php";
    include_once "../model/Partida.php";
    include_once "../crud/CRUDtime.php";



function formAtt(Partida $partida){
    $t = new CRUDtime();
    $times = $t->getTimes();
    $nomeTime1 = $partida->getIdTimeMandante();
    $nomeTime2 = $partida->getIdTimeVisitante();

    $time = $t->getTime($nomeTime1);
    $time2 = $t->getTime($nomeTime2);

    include_once "../views/adminPartidasAtt.php";

}

function viewAdm(){
    $t = new CRUDtime();
    $c = new CRUDpartida();
    $partidas = $c->getPartidas();
    include_once "../views/partidAdm.php";
}

function attPartida($id){

    $p = new Partida($id, $_POST['timeA'], $_POST['timeB'], $_POST['data'], $_POST['gol1'], $_POST['gol2'], $_POST['vencedor']);
    $part = new CRUDpartida();
    $part->updatePartida($p, $id);

   header('location: ../../index.php');


}

function view($id_partida){

    $c = new CRUDpartida();
    $partida = $c->getPartida($id_partida);
    $t = new CRUDtime();

    $timeA = $partida->getIdTimeMandante();
    $timeB = $partida->getIdTimeVisitante();

    $t1 = $t->getTime($timeA);
    $t2 = $t->getTime($timeB);

    include_once "../views/partida.php";

}


function views(){
    $t = new CRUDtime();
    $c = new CRUDpartida();
    $partidas = $c->getPartidas();

    include_once "../views/partidas.php";
}


function form(){
    $time = new CRUDtime();
    $times = $time->getTimes();
    require_once "../views/adminPartidas.php";
}

function addPartida(){
    $cP = new CRUDpartida();
    $p = new Partida(null, $_POST['timeA'], $_POST['timeB'], $_POST['data'], $_POST['gol1'], $_POST['gol2'], $_POST['vencedor']);

    echo $cP->insertPartida($p);

    header('location: ../../index.php');

}

function del($id){
    $p = new CRUDpartida();
    $p->deletePartida($id);

    header('location: ../../index.php');
}

if(!isset($_GET['acao'])){
    include_once "../views/erro.php";
}

if ($_GET['acao'] == "addForm"){
    form();
}

if ($_GET['acao'] == "attForm"){
    $part = new CRUDpartida();
    $partida = $part->getPartida($_GET['id']);

    formAtt($partida);
}

if ($_GET['acao'] == "add"){
    addPartida();
}

if ($_GET['acao'] == "att"){
    attPartida($_GET['id']);
}

if($_GET['acao'] == 'viewP'){
    view($_GET['id']);
}
if ($_GET['acao'] == 'viewPartidas'){
    views();
}
if ($_GET['acao'] == 'viewAdm'){
    viewAdm();
}

if ($_GET['acao'] == 'delete'){
    del($_GET['id']);
}
if ($_GET['acao'] == 'verTime'){

}
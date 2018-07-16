<?php
require_once "../crud/CRUDtime.php";
require_once "../crud/CRUDpartida.php";

function timeUpd($id){

    $c = new CRUDtime();
    $time = $c->getTime($id);
    include_once "../views/adminTimes.php";
}

function timeU($id){
    $c = new CRUDtime();
    $timee = $c->getTime($id);
    $time = new Time($id, $timee->getLogo(),$_POST['nome'], $_POST['pontos'], $timee->getCor());
    $c->updateTime($time);

    header('location: ../../index.php');
}

function view(){
    $c = new CRUDtime();
    $times = $c->getTimesC();
    include_once "../views/times.php";
}

function viewA(){
    $c = new CRUDtime();
    $times = $c->getTimes();
    include_once "../views/timesAdm.php";
}

function del($id){
    $c = new CRUDtime();
    $c->deleteTime($id);

    header('location:../../index.php');
}

function form(){

}

if(!isset($_GET['rota'])){
    include_once "../views/erro.php";
}

if ($_GET["rota"] == "verTime"){
    $crudTime = new CRUDtime();
    $time = $crudTime->getTime($_GET["id"]);
    $jogadores = $crudTime->getJogadores($_GET["id"]);
    $partidas = $crudTime->getPartidasTime($_GET["id"]);


    require_once "../views/time.php";
}

if ($_GET['rota'] == "timesUpdate"){
    timeUpd($_GET['id']);
}

if ($_GET['rota'] == "updateTime") {
timeU($_GET['id']);
}

if($_GET['rota'] == 'ver'){
    view();
}

if($_GET['rota'] == 'verA'){
    viewA();
}

if ($_GET['rota'] == 'delete'){
    del($_GET['id']);
}

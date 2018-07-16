<?php
require_once __DIR__."/../crud/CRUDcurtir.php";


if ($_GET['rota'] == "curtir")
    if(isset($_GET['id_usuario'])){
        $id_usuario = $_GET['id_usuario'];
        $id_time = $_GET['id_time'];
        $rota = $_GET['rota'];
        $numClicks = $_GET['numClicks'];

        $a = new Curtir($id_usuario, $id_time);
        $b = new CRUDcurtir();
        $c = $b->getCurtidaExata($a);
        if ($c == 0){
          $b->InsertCurtida($a);
          $d = $b->getCurtidaPorTime($a);
          echo $d;
        }
        elseif ($c == 1){
          $b->DeleteCurtida($a);
            $e = $b->getCurtidaPorTime($a);
            echo $e;
        }
        else{
          echo "Cadastre-se ou Faça o login";
        }
    }
if ($_GET['rota'] == "cor"){
    $id_usuario = $_GET['id_usuario'];
    $id_time = $_GET['id_time'];

    $a = new Curtir($id_usuario, $id_time);
    $b = new CRUDcurtir();
    $c = $b->getCurtidaExata($a);

    echo $c;
}
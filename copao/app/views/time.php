<?php session_start();
?>
<!DOCTYPE html>
<html>


<head>
    <title><?= $time->getNomeTime() ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/time.css" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            //var btnFavorito = $("#like");
            var verificadorBotao = 0;
            var num_curtidas = $("#numCurtidas").html();
            var id_usuario = $("#a").html();
            var id_time = $("#b").html();

                $.get("CurtirController.php",
                    {
                        rota: "cor",
                        id_usuario: id_usuario,
                        id_time: id_time
                    },
                    function (data) {
                        $("#c").html(data);
                        var c = $("#c").html();
                        if (c == 1){
                            $("#like").addClass("curtido");
                           

                        }
                        if (c == 0){
                            $("#like").removeClass("curtido");
                           
                        }
                    });


            $("#like").click(function () {
                verificadorBotao = verificadorBotao + 1;
                //alert(verificadorBotao);
                $("#like").toggleClass("curtido");

                    $.get("CurtirController.php",
                        {
                            rota: "curtir",
                            numClicks: verificadorBotao,
                            id_usuario: id_usuario,
                            id_time: id_time

                        },
                        function (data) {
                            $("#numCurtidas").html(data);
                            var num_curtidas2 =  $("#numCurtidas").html();
                            var num_curtidas_final = num_curtidas2 - num_curtidas;
                            //alert(num_curtidas_final);

                            if (num_curtidas_final > 0){
                                //$("#like").addClass("curtido");
                            }
                            if(num_curtidas_final <= 0){
                                //$("#like").removeClass("curtido");
                            }
                        })

            })

            $("#numCurtidasD").click(function () {
                alert("Cadastre-se ou faça login para curtir");
            })

        })
    </script>




    <style>
        h1{
            text-align: center;

        }

        .curtido{
            background-color: #2EFF80 !important ;
        }

    </style>
</head>

<body>
<?php if (!isset($_SESSION) or !isset($_SESSION['tipo'])){
    echo "<nav class=\"navbar navbar-expand-md bg-primary navbar-dark\">
    <div class=\"container\">
      <a class=\"navbar-brand\" href=\"../../index.php\">Copão IF</a>
      <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbar2SupportedContent\">
        <span class=\"navbar-toggler-icon\"></span>
      </button>
      <div class=\"collapse navbar-collapse text-center justify-content-end\" id=\"navbar2SupportedContent\">
        <a href=\"../controller/UsuarioController.php?rota=loginForm\" class=\"btn navbar-btn ml-2 text-white btn-secondary\">
          <i class=\"fa d-inline fa-lg fa-user-circle-o\"></i>&nbsp;Login</a>
        <a href=\"UsuarioController.php?rota=formCadastro\" class=\"btn navbar-btn ml-2 text-white btn-secondary\">
          <i class=\"fa d-inline fa-lg fa-user-circle-o\"></i>&nbsp;Cadastrar</a>
      </div>
    </div>
  </nav>";
}

elseif (isset($_SESSION) and $_SESSION['tipo'] != 2){
    include_once "navLogged.php";
}

elseif (isset($_SESSION) and $_SESSION['tipo'] == 2){

    include_once "navAdmin.php";
}

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid d-block img-time rounded-circle mx-auto" src="<?= $time->getLogo() ?>" width="200px" height="200px">
                <h1 class="text-center my-2"><?= $time->getNomeTime(); ?></h1>
                <button id="a" class="disabled text-hide"><?= $_SESSION['id']?></button>
                <button id="b" class="disabled text-hide"><?= $_GET['id'] ?></button>
                <button id="c" class="disabled text-hide"></button>
                <?php if (isset($_SESSION) and isset($_SESSION['tipo'])){
                echo "<button class=\" btn btn-secondary\" id=\"like\">CURTIR <p id=\"numCurtidas\">$curtidas</p></button>";
                }elseif (!isset($_SESSION) or !isset($_SESSION['tipo'])){
                echo "<button class=\" btn btn-secondary\" id=\"numCurtidasD\">$curtidas Curtidas</button>";
                }

                ?>
            </div>
        </div>
    </div>
</div>
<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <h1>PARTIDAS</h1>
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Time A</th>
                        <th class="text-center">Resultado</th>
                        <th class="text-right">Time B</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($partidas as $partida): ?>
                    <tr>
                        <td><?= $partida->getData() ?></td>
                            <td><?php $time = $crudTime->getTime($partida->getIdTimeMandante()); echo $time->getNomeTime() ?>
                            <img class="img-fluid d-block rounded-circle float-left" src="<?php $time = $crudTime->getTime($partida->getIdTimeMandante()); echo $time->getLogo()?>" width="40 40px">
                        </td>

                        <td class="text-center"><?= $partida->getResultadoTimeA() ?> x <?= $partida->getResultadoTimeB() ?></td>
                        <td class="text-right"><?php $time2 = $crudTime->getTime($partida->getIdTimeVisitante()); echo $time2->getNomeTime()?>
                            <img class="img-fluid d-block rounded-circle float-right" src="<?php $time2 = $crudTime->getTime($partida->getIdTimeVisitante()); echo $time2->getLogo()?>" width="40 40px">
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <h1>JOGADORES</h1>
                    <thead>
                    <tr>
                        <th>Camisa</th>
                        <th>Nome</th>
                        <th>Gols</th>
                        <th>Cartões Amarelos</th>
                        <th>Cartões Vermelhos</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($jogadores as $jogador):?>
                    <tr>
                        <td><?= $jogador->getNumeroCamisa() ?></td>
                        <td><?= $jogador->getNome() ?></td>
                        <td><?= $jogador->getGols() ?></td>
                        <td><?= $jogador->getCartaoAmarelo() ?></td>
                        <td><?= $jogador->getCartaoVermelho() ?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="py-5 text-white bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 text-center">
                <p>© Copyright 2018 Copão IFC - Todos os direitos Reservados.</p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
<?php
    include_once "../crud/CRUDpartida.php";
    include_once "../crud/CRUDtime.php";

    session_start();

    $time = new CRUDtime();
    $times = $time->getTimes();
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="https://v40.pingendo.com/assets/4.0.0/default/theme.css" type="text/css"> </head>

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
                <form class="" method="post" action="PartidaController.php?acao=add">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Time 1</label>
                        <select name="timeA" class="custom-control custom-select" draggable="true">
                            <option selected="">Selecione um Time</option>
                            <?php foreach ($times as $t):?>
                            <option value="<?= $t->getIdTime()?>"><?= $t->getNomeTime()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Time 2</label>
                        <select name="timeB" class="custom-control custom-select">
                            <option selected="">Selecione o outro Time</option>
                            <?php foreach ($times as $t):?>
                                <option value="<?= $t->getIdTime()?>"><?= $t->getNomeTime()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Data</label>
                        <input type="text" class="form-control" id="inlineFormInput" name="data" placeholder="Dia de Mes de Ano"> </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gols Time 1</label>
                        <input type="text" class="form-control" id="inlineFormInput" placeholder="0" name="gol1"> </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gols Time 2</label>
                        <input type="text" class="form-control" id="inlineFormInput" placeholder="0" name="gol2"> </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Vencedor</label>
                        <select class="custom-control custom-select" name="vencedor">
                            <option value="0" selected="">Empate</option>
                            <?php foreach ($times as $t):?>
                                <option value="<?= $t->getIdTime()?>"><?= $t->getNomeTime()?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
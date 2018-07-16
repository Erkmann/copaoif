<!DOCTYPE html>
<html>

<head>
   <title>Copão IF</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="../assets/css/index.css" type="text/css"> </head>

<body>
<?php if (!isset($logado)){
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

elseif (isset($logado) and $logado['tipo'] != 2){
    include_once "navLogged.php";
}

elseif (isset($logado) and $logado['tipo'] == 2){

    include_once "navAdmin.php";
}

?>


          <div class="py-5">
              <div class="container">
                  <div class="row">
                      <div class="col-md-4">
                          <p class="lead">Classificação</p>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>Posição</th>
                                  <th>Time</th>
                                  <th>Pontos</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                  <td>1</td>
                                  <td><?= $timesP[0]->getNomeTime();?></td>
                                  <td><?= $timesP[0]->getPontos();?></td>
                              </tr>
                              <tr>
                                  <td>2</td>
                                  <td><?= $timesP[1]->getNomeTime();?></td>
                                  <td><?= $timesP[1]->getPontos();?></td>
                              </tr>
                              <tr>
                                  <td>3</td>
                                  <td><?= $timesP[2]->getNomeTime();?></td>
                                  <td><?= $timesP[2]->getPontos();?></td>
                              </tr>
                              <tr>
                                  <td>
                                      <a href="TimeController.php?rota=ver" class="btn btn-outline-primary">+</a>&nbsp</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="col-md-4">
                          <p class="lead">Artilheiros
                              <br> </p>
                          <table class="table">
                              <thead>
                              <tr>
                                  <th contenteditable="true">Posição</th>
                                  <th>Gols</th>
                                  <th>Artilheiro</th>
                                  <th>Time</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $a=array('0','1','2'); foreach ($a as $aa):?>
                              <tr>
                                  <td><?= $aa +1; ?></td>
                                  <td><?= $artilheiros[$aa]->getGols() ?></td>
                                  <td><?= $artilheiros[$aa]->getNome() ?></td>
                                  <td><?= $arrayTimes[$aa]->getNomeTime()?></td>
                              </tr>
                              <?php endforeach;?>
                              <tr>
                                  <td>
                                      <a href="JogadorController.php?acao=artilheiros" class="btn btn-outline-primary">+</a>&nbsp</td>
                              </tr>
                          </table>
                      </div>
                      <div class="col-md-4">
                          <p class="lead">Partidas
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>Data</th>
                                  <th>Time A</th>
                                  <th>Resultado</th>
                                  <th>Time B</th>

                              </tr>
                              </thead>
                              <tbody>
                              <?php foreach ($partidas as $p): ?>
                              <tr>
                                  <td><?= $p->getData(); ?></td>
                                  <td><?php $t1 = $crudTime->getTime($p->getIdTimeMandante()); echo $t1->getNomeTime();?></td>
                                  <td><?= $p->getResultadoTimeA()?> x <?= $p->getResultadoTimeB()?></td>
                                  <td><?php $t1 = $crudTime->getTime($p->getIdTimeVisitante()); echo $t1->getNomeTime();?></td>
                              </tr>
                              <?php endforeach;?>
                             <tr>
                                  <td>
                                      <a href="PartidaController.php?acao=viewPartidas" class="btn btn-outline-primary">+</a>&nbsp</td>
                              </tr>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($times as $time): ?>
                <div class="col-md-2">
                    <img class="d-block mx-auto img-fluid rounded-circle" src="<?= $time->getLogo(); ?>">
                    <a class="btn btn-primary btn-lg btn-circle" href="TimeController.php?rota=verTime&id=<?= $time->getIdTime()?>">+ </a>
                </div>
            <?php endforeach; ?>
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


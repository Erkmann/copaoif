<?php session_start();?>
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

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Número Camisa</th>
        <th>Nome</th>
        <th>Gols</th>
        <th>Cartões Amarelos</th>
        <th>Cartões Vermelhos</th>
        <th>Id do Time</th>
        <th>Ações</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($jogadores as $jogador): ?>
        <tr>
            <th scope="row"><?= $jogador->getIdJogador() ?></th>
            <td><?=$jogador->getNumeroCamisa() ?></td>
            <td><?=$jogador->getNome() ?></td>
            <td><?=$jogador->getGols() ?></td>
            <td><?=$jogador->getCartaoAmarelo() ?></td>
            <td><?=$jogador->getCartaoVermelho() ?></td>
            <td><?=$jogador->getIdTime() ?></td>
            <td><a class="btn navbar-btn ml-2 text-white btn-secondary" href="JogadorController.php?acao=editar&id=<?=$jogador->getIdJogador();?>">Editar</a> <a class="btn navbar-btn ml-2 text-white btn-secondary" href="JogadorController.php?acao=excluir&id=<?=$jogador->getIdJogador();?>">Excluir</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>


<div class="py-5 text-white bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3 text-center">
                <p>© Copyright 2018 Copão IFC - Todos os direitos Reservados.</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

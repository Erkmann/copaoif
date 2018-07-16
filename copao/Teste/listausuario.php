<?php
/**
 * Created by PhpStorm.
 * User: Henrique Hartmann
 * Date: 09/06/2018
 * Time: 15:59
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Email</th>
        <th>Senha</th>
        <th>Ações</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <th scope="row"><?= $usuario->getIdUsuario() ?></th>
            <td><?=$usuario->getNomeUsuario() ?></td>
            <td><?=$usuario->getIdTipoUsuario() ?></td>
            <td><?=$usuario->getEmail() ?></td>
            <td><?=$usuario->getSenha() ?></td>
            <td><a href="controleAcao.php?acao=editar&codigo=<?=$usuario->getIdUsuario();?>">Editar</a>|<a href="controleAcao.php?acao=excluir&codigo=<?=$usuario->getIdUsuario();?>">Excluir</a></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>

</body>
</html>

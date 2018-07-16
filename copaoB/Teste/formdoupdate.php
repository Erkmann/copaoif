<?php
/**
 * Created by PhpStorm.
 * User: Henrique Hartmann
 * Date: 09/06/2018
 * Time: 15:44
 */
$codigo = $_GET['codigo'];
echo " esse é o id:$codigo";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="controleAcao.php?acao=atualizar&codigo=<?= $codigo ?>">
    <div>
        <label>Id</label>
        <input maxlength="100" type="text" name="id" placeholder="Digite o novo id" value="<?= $usuario->getIdUsuario() ?>">
    </div>
    <div>
        <label>Nome</label>
        <input maxlength="100" type="text" name="nome" placeholder="Digite o novo nome" value="<?= $usuario->getNomeUsuario() ?>">
    </div>
    <div>
        <label>Tipo</label>
        <input maxlength="100" type="text" name="tipo" placeholder="Digite o novo tipo" value="<?= $usuario->getIdTipoUsuario() ?>">
    </div>
    <div>
        <label>Email</label>
        <input maxlength="100" type="email" name="email" placeholder="Digite o novo email" value="<?= $usuario->getEmail() ?>">
    </div>
    <div>
        <label>Senha</label>
        <input maxlength="100" type="text" name="senha" placeholder="Digite a nova senha" value="<?= $usuario->getSenha() ?>">
    </div>
    <div>
        <input type="submit" value="Enviar">
    </div>
</form>
</body>
</html>

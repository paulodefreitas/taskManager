<?php
session_start();

include './../app/configuracao.php';
include './../app/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Paulo César de Freitas">
    <title><?=APP_NOME ?></title>
    <link rel="stylesheet" href="<?=URL?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL?>/public/css/estilos.css">
</head>
<body class="d-flex flex-column h-100">
    <?php
        include '../app/Views/topo.php';
        $rotas = new Rota();
        include '../app/Views/rodape.php';
    ?>
    <script src="<?=URL?>/public/js//bootstrap.bundle.min.js"></script>
    <script src="<?=URL?>/public/js/jquery.funcoes.js"></script> 
</body>
</html>
<?php

use \App\Session\Login;

$usuarioLogado = Login::getUsuarioLogado();

//DETALHES DO USUÁRIO
$usuario = $usuarioLogado ?
$usuarioLogado['username'].' <a href="Logout.php" class="text-light font-weight-bold ml-2">Sair</a>' :
'Visitante <a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Desafio Kabum</title>

    <style>
        .header {
            padding: 60px;
            text-align: center;
            background: #e39c39;
            color: white;
            font-size: 30px;
        }
    </style>
</head>

<section>

    <body class="bg-dark text-light">
        <div class="container">
        </section>

            <div class="header">
                <h1>Desafio Kabum</h1>
                <p>Painel Admnistrativo</p>

                <hr class="border-light">
                
                <div class="d-flex justify-content-start">
                    <?=$usuario?>
                </div>

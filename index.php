<?php

include __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use \App\Session\Login;

//Obrigar usuário estar logado.
Login::requireLogin();

$clientes = Cliente::getClientes();

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/footer.php';
include __DIR__.'/includes/listagem.php';

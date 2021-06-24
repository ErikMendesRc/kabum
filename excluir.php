<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Cliente;
use \App\Session\Login;

//Obrigar usuário estar logado.
Login::requireLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['idcliente']) or !is_numeric($_GET['idcliente'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA O CLIENTE
$obCliente = Cliente::getCliente($_GET['idcliente']);

//VALIDAÇÃO DA VAGA
if(!$obCliente instanceof Cliente){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obCliente->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';
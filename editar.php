<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE', 'Editar Vaga');

use \App\Entity\Cliente;
use \App\Session\Login;

//Obrigar usuário estar logado.
Login::requireLogin();

//VALIDAÇÃO DO ID
if(!isset($_GET['idcliente']) or !is_numeric($_GET['idcliente'])){
    header('location: index.php?status=error');
    exit;
  }

  //CONSULTA A VAGA
$obCliente = Cliente::getCliente($_GET['idcliente']);

//VALIDAÇÃO DA VAGA
if(!$obCliente instanceof Cliente){
  header('location: index.php?status=error');
  exit;
}

//Validar $__POST
if(isset(
    $_POST['nome'],
    $_POST['cpf'],
    $_POST['rg'],
    $_POST['dataNascimento'],
    $_POST['endereco'],
    $_POST['complemento'],
    $_POST['cidade'],
    $_POST['estado'],
    $_POST['cep'])){

    $obCliente->nome = $_POST['nome'];
    $obCliente->cpf = $_POST['cpf'];
    $obCliente->rg = $_POST['rg'];
    $obCliente->telefone = $_POST['telefone'];
    $obCliente->dataNascimento = $_POST['dataNascimento'];
    $obCliente->endereco = $_POST['endereco'];
    $obCliente->complemento = $_POST['complemento'];
    $obCliente->cidade = $_POST['cidade'];
    $obCliente->estado = $_POST['estado'];
    $obCliente->cep = $_POST['cep'];

    $obCliente-> atualizar();
    header('location: index.php?status=success');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/footer.php';
include __DIR__.'/includes/formulario.php';

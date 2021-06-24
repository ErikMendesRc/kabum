<?php

require  __DIR__.'/vendor/autoload.php';

define('TITLE', 'Cadastrar Vaga');

use \App\Entity\Cliente;
use \App\Session\Login;

//Obrigar usuário estar logado.
Login::requireLogin();

$obCliente = new Cliente;


if(isset(
    $_POST['nome'],
    $_POST['cpf'],
    $_POST['rg'],
    $_POST['telefone'],
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
    $obCliente-> Cadastrar();
    
    header('location: index.php?status=success');
    exit;

}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/footer.php';
include __DIR__.'/includes/formulario.php';

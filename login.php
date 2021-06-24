<?php

require __DIR__.'/vendor/autoload.php';


use \App\Session\Login;
use \App\Entity\Usuario;

//Obrigar usuário a não estar logado.
Login::requireLogout();

$alertaLogin = '';
$alertaCadastro = '';

if(isset($_POST['acao'])){

  switch($_POST['acao']){
    case 'logar':
      
      $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

      if(!$obUsuario instanceof Usuario || !password_verify($_POST['password'], $obUsuario->password)){
        $alertaLogin = 'Email ou senha inválidos';
        break;
      }

      Login::login($obUsuario);


      break;

    case 'cadastrar':

      //VALIDAÇÃO DOS CAMPOS OBRIGATÓRIOS
      if(isset($_POST['username'],$_POST['email'],$_POST['password'])){

        $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

        if($obUsuario instanceof Usuario){
          $alertaCadastro = 'Esse email já está em uso';
          break;
        }
        
        $obUsuario = new Usuario;
        $obUsuario->username = $_POST['username'];
        $obUsuario->email = $_POST['email'];
        $obUsuario->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $obUsuario->cadastrar();

        //LOGA O USUÁRIO
        Login::login($obUsuario);
      }

      break; 
  }

}



include __DIR__.'/includes/header.php';
include __DIR__.'/includes/footer.php';
include __DIR__.'/includes/formulario-login.php';

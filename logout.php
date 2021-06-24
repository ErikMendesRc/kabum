<?php

require __DIR__.'/vendor/autoload.php';


use \App\Session\Login;


//Obrigar usuário a não estar logado.
Login::logout();

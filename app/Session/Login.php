<?php

namespace App\Session;

use App\Entity\Usuario;

class Login
{

    /**
     * Método para iniciar a Sessão
     */
    public static function init()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            //INICIA SESSÃO
            session_start();
        }
    }

    /**
     * Método para buscar os dados do usuário logado
     * @return array
     */
    public static function getUsuarioLogado()
    {
        //INICIA SESSÃO
        self::init();

        return self::isLogged() ? $_SESSION['usuarios'] : null;
    }


    /**
     * Método para logar o usuário.
     * @param Usuario $obUsuario
     */
    public static function login($obUsuario)
    {

        //INICIA A SESSÃO
        self::init();

        //SESSÃO DE USUÁRIO
        $_SESSION['usuarios'] = [
            'id'       => $obUsuario->id,
            'username' => $obUsuario->username,
            'password' => $obUsuario->password
        ];

        //REDIRECIONA PARA INDEX
        header('location: index.php');
        exit;
    }

    public static function logout()
    {
        self::init();

        unset($_SESSION['usuarios']);
        //REDIRECIONA PARA Login
        header('location: login.php');
        exit;
    }


    /**
     * Método para verificar se o usuário está ou não logado
     * @return boolean
     */
    public static function isLogged()
    {
        self::init();

        return isset($_SESSION['usuarios']['id']);
    }

    /**
     * Método para verificar se está deslogado
     */
    public static function requireLogin()
    {
        if (!self::isLogged()) {
            header('location: Login.php');
            exit;
        }
    }

    /**
     * Método para verificar se está logado
     */
    public static function requireLogout()
    {
        if (self::isLogged()) {
            header('location: index.php');
            exit;
        }
    }
}

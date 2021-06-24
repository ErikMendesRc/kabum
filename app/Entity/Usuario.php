<?php


namespace App\Entity;

use App\DataBase\Database;
use \PDO;

class Usuario{

    /**
     * Identificador do usuário
     * @var integer
     */
    public $id;

    /**
     * Nome do usuário
     * @var string
     */
    public $username;

    /**
     * Email do usuário
     * @var string
     */
    public $email;

    /**
     * Hash da senha do usuário
     * @var string
     */
    public $password;

    /**
     * Método responsável por cadastrar o usuário
     * @return boolean
     */
    public function cadastrar(){
        //DATABASE

        $obDatabase = new Database('usuarios');

        //INSERIR USUÁRIO
        $this->id = $obDatabase->Insert([
            'username' => $this->username,
            'email'    => $this->email,
            'password' => $this->password
        ]);

        return true;

    }

    public static function getUsuarioPorEmail ($email){
        return (new Database('usuarios'))-> select('email = "'. $email.'"')-> fetchObject(self::class);
    }
}
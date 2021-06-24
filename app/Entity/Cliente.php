<?php

namespace App\Entity;

use App\DataBase\Database;
use \PDO;

class Cliente
{

  /**
   * Indentificador único do cliente
   * @var integer
   */
  public $idcliente;

  /**
   * Nome do Cliente
   *@var string
   */
  public $nome;

  /**
   * Data de Nascimento do Cliente
   * @var date
   */
  public $dataNascimento;

  /**
   * Cpf do cliente
   *@var string
   */
  public $cpf;

  /**
   * RG do cliente
   *@var string
   */
  public $rg;

  /**
   * Telefone do Cliente
   *@var string
   */
  public $telefone;

  /**
   * Indentificador único do endereco
   * @var integer
   */
  public $idEndereco;

  /**
   * Endereco do Cliente
   *@var string
   */
  public $endereco;

  /**
   * Complemento do Cliente (Casa, Prédio...)
   *@var string
   */
  public $complemento;

  /**
   * Cep do Cliente
   * @var string
   */
  public $cep;

  /**
   * Estado do Cliente
   *@var char
   */
  public $estado;

  /**
   * Cidade do cliente
   *@var string
   */
  public $cidade;

  /**
   * Método responsável pelo cadastro dos clientes
   *@var boolean
   */
  public function Cadastrar()
  {

    //DEFINIR DATA
    $this->dataNascimento = date('Y-m-d');

    //INSERIR CLIENTE
    $obDatabase = new Database('cliente');
    $this->idcliente = $obDatabase->Insert([

      'nome' => $this->nome,
      'dataNascimento' => $this->dataNascimento,
      'cpf' => $this->cpf,
      'rg' => $this->rg,
      'telefone' => $this->telefone,
      'endereco' => $this->endereco,
      'complemento' => $this->complemento,
      'cep' => $this->cep,
      'estado' => $this->estado,
      'cidade' => $this->cidade,
    ]);

    return true;
  }

  /**
   * Método responsável por atualizar a vaga no banco
   * @return boolean
   */
  public function atualizar()
  {
    return (new Database('cliente'))->update('idcliente = ' . $this->idcliente, [
      'nome' => $this->nome,
      'dataNascimento' => $this->dataNascimento,
      'cpf' => $this->cpf,
      'rg' => $this->rg,
      'telefone' => $this->telefone,
      'endereco' => $this->endereco,
      'complemento' => $this->complemento,
      'cep' => $this->cep,
      'estado' => $this->estado,
      'cidade' => $this->cidade,
    ]);
  }

  /**
   * Método responsável por excluir a vaga do banco
   * @return boolean
   */
  public function excluir()
  {
    return (new Database('cliente'))->delete('idcliente = ' . $this->idcliente);
  }

  /**
   * Método para buscar os Clientes no BD
   *@param string $where
   *@param string $order
   *@param string $limit
   *@return array
   */
  public static function getClientes($where = null, $order = null, $limit = null)
  {
    return (new Database('cliente'))->select($where, $order, $limit)
      ->fetchAll(PDO::FETCH_CLASS, self::class);
  }

  /**
   * Método responsável por buscar um cliente com base em seu ID
   * @param  integer $id
   * @return Cliente
   */
  public static function getCliente($idcliente)
  {
    return (new Database('cliente'))->select('idcliente = ' . $idcliente)
      ->fetchObject(self::class);
  }
};

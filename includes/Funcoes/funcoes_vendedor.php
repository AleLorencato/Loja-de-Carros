<?php
require_once '../../includes/conecta.php';
require_once '../../includes/Funcoes/query.php';

class Vendedor
{
  private $conn;
  private $table = 'vendedor';

  public $codvendedor;
  public $nome;
  public $email;
  public $cpf;
  public $senha;
  public $image;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function inserir()
  {
    $query = "INSERT INTO " . $this->table . " (nome, email, cpf, senha, image) VALUES (?, ?, ?, ?, ?)";
    return Query::execute($this->conn, $query, [$this->nome, $this->email, $this->cpf, $this->senha, $this->image]);
  }

  public function alterar()
  {
    $query = "UPDATE " . $this->table . " SET nome = ?, email = ?, cpf = ?, senha = ?, image = ? WHERE codvendedor = ?";
    return Query::execute($this->conn, $query, [$this->nome, $this->email, $this->cpf, $this->senha, $this->image, $this->codvendedor]);
  }

  public function deletar()
  {
    $query = "DELETE FROM " . $this->table . " WHERE codvendedor = ?";
    return Query::execute($this->conn, $query, [$this->codvendedor]);
  }

  public function buscarPorId()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE codvendedor = ?";
    return Query::fetch($this->conn, $query, [$this->codvendedor]);
  }

  public function acessar()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE email = ? AND senha = ?";
    return Query::fetch($this->conn, $query, [$this->email, $this->senha]);
  }

  public function listar()
  {
    $query = "SELECT * FROM " . $this->table;
    return Query::fetchAll($this->conn, $query);
  }

}
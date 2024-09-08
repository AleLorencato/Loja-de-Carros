<?php

require_once '../../includes/conecta.php';
require_once '../../includes/Funcoes/query.php';

class Cliente
{
  private $conn;
  private $table = 'cliente';

  public $codcliente;
  public $nome;
  public $email;
  public $senha;
  public $image;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function inserir()
  {
    $query = "INSERT INTO " . $this->table . " (nome, email, senha, image) VALUES (?, ?, ?, ?)";
    return Query::execute($this->conn, $query, [$this->nome, $this->email, $this->senha, $this->image]);
  }

  public function alterar()
  {
    $query = "UPDATE " . $this->table . " SET nome = ?, email = ?, senha = ?, image = ? WHERE codcliente = ?";
    return Query::execute($this->conn, $query, [$this->nome, $this->email, $this->senha, $this->image, $this->codcliente]);
  }

  public function deletar()
  {
    $query = "DELETE FROM " . $this->table . " WHERE codcliente = ?";
    return Query::execute($this->conn, $query, [$this->codcliente]);
  }

  public function buscarPorEmail()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE email LIKE ?";
    return Query::fetch($this->conn, $query, [$this->email]);
  }

  public function buscarPorId()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE codcliente = ?";
    return Query::fetch($this->conn, $query, [$this->codcliente]);
  }

  public function acessar()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE email = ? AND senha = ?";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$this->email, $this->senha]);
    return $stmt;
  }

  public function listar()
  {
    $query = "SELECT * FROM " . $this->table;
    return Query::fetchAll($this->conn, $query);
  }
}
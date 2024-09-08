<?php
require_once '../../includes/conecta.php';
require_once '../../includes/Funcoes/query.php';

class Carro
{
  private $conn;
  private $table = 'veiculo';

  public $codveiculo;
  public $marca;
  public $modelo;
  public $preco;

  public function __construct($db)
  {
    $this->conn = $db;
  }

  public function inserir()
  {
    $query = "INSERT INTO " . $this->table . " (marca, modelo, preco) VALUES (?, ?, ?)";
    return Query::execute($this->conn, $query, [$this->marca, $this->modelo, $this->preco]);
  }

  public function alterar()
  {
    $query = "UPDATE " . $this->table . " SET preco = ? WHERE codveiculo = ?";
    return Query::execute($this->conn, $query, [$this->preco, $this->codveiculo]);
  }

  public function deletar()
  {
    $query = "DELETE FROM " . $this->table . " WHERE codveiculo = ?";
    return Query::execute($this->conn, $query, [$this->codveiculo]);
  }

  public function buscarPorId()
  {
    $query = "SELECT * FROM " . $this->table . " WHERE codveiculo = ?";
    return Query::fetch($this->conn, $query, [$this->codveiculo]);
  }

  public function listar()
  {
    $query = "SELECT * FROM " . $this->table;
    return Query::fetchAll($this->conn, $query);
  }

  public function filtrar($preco_min, $preco_max)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE preco BETWEEN ? AND ?";
    return Query::fetchAll($this->conn, $query, [$preco_min, $preco_max]);
  }
}
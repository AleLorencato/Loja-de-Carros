<?php

require_once '../conecta.php';
require_once '../Funcoes/funcoes_cliente.php';
require_once '../Funcoes/funcoes_veiculo.php';
require_once '../Funcoes/funcoes_vendedor.php';

function iniciarSessao($pessoa)
{
  session_start();
  $_SESSION['logado'] = true;
  $_SESSION['cod_pessoa'] = $pessoa['codcliente'];
  $_SESSION['nome'] = $pessoa['nome'];
  $_SESSION['image'] = $pessoa['image'];
}

$database = new Database();
$db = $database->connect();
$cliente = new Cliente($db);
$carro = new Carro($db);
$vendedor = new Vendedor($db);

if (isset($_GET['listarCarros'])) {
  session_start();
  $preco_min = $_POST['preco-min'];
  $preco_max = $_POST['preco-max'];
  $codcliente = $_SESSION['cod_pessoa'];

  print_r($preco_min);
  print_r($preco_max);

  $cliente->codcliente = $codcliente;
  $pessoa = $cliente->buscarPorId();

  if ($preco_min == null && $preco_max == null) {
    $carros = $carro->listar();
  } else {
    $carros = $carro->filtrar($preco_min, $preco_max);
  }
  $_SESSION['carros'] = $carros;

  header('location:../../Pages/Comprador/listarCarros.php');
  exit();
}

if (isset($_GET['mostrarPessoa'])) {
  $codcliente = $_GET['codcliente'];
  $cliente->codcliente = $codcliente;
  $pessoa = $cliente->buscarPorId();
  $_SESSION['pessoa'] = $pessoa;
  header('location:../../Pages/Comprador/mostraPessoa.php');
  exit();
}
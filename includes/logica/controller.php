<?php

require_once '../conecta.php';
require_once '../Funcoes/funcoes_cliente.php';
require_once '../Funcoes/funcoes_veiculo.php';
require_once '../Funcoes/funcoes_vendedor.php';
session_start();
$database = new Database();
$db = $database->connect();
$cliente = new Cliente($db);
$carro = new Carro($db);
$vendedor = new Vendedor($db);

if (isset($_GET['listarCarros'])) {

  $preco_min = isset($_POST['preco-min']) ? $_POST['preco-min'] : null;
  $preco_max = isset($_POST['preco-max']) ? $_POST['preco-max'] : null;
  $codcliente = $_SESSION['cod_pessoa'];

  $cliente->codcliente = $codcliente;
  $pessoa = $cliente->buscarPorId();

  if ($preco_min == null && $preco_max == null) {
    $carros = $carro->listar();
  } else if ($preco_min != null && $preco_max != null) {
    $carros = $carro->filtrar($preco_min, $preco_max);
  } else {
    $carros = $carro->listar();
  }
  $_SESSION['pessoa'] = $pessoa;
  $_SESSION['carros'] = $carros;

  header('location:../../Pages/Comprador/listarCarros.php');
  exit();
}

if (isset($_GET['listarCarrosVend'])) {
  $codvendedor = $_SESSION['cod_pessoa'];

  $vendedor->codvendedor = $codvendedor;

  $pessoa = $vendedor->buscarPorId();

  $carros = $carro->listar();

  $_SESSION['pessoa'] = $pessoa;
  $_SESSION['carros'] = $carros;
  header('location:../../Pages/Vendedor/listarCarros-vend.php');
  exit();
}

if (isset($_GET['listarVend'])) {
  $pessoas = $vendedor->listar();
  $_SESSION['pessoas'] = $pessoas;
  header('location:../../Pages/Vendedor/listarVendedor.php');
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

if (isset($_GET['mostrarVend'])) {
  $codvendedor = $_GET['codvendedor'];
  $vendedor->codvendedor = $codvendedor;
  $pessoa = $vendedor->buscarPorId();
  $_SESSION['pessoa'] = $pessoa;
  header('location:../../Pages/Vendedor/mostraPerfilVend.php');
  exit();
}
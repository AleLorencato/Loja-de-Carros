<?php
require_once('../conecta.php');
require_once('../Funcoes/funcoes_veiculo.php');



if (isset($_POST['editar-carro'])) {

$codveiculo = $_POST['editar-carro'];
$array = array($codveiculo);
$carro = buscarVeiculo($conexao, $array);
require_once('../../veiculo/alterarVeiculo.php');
}

if (isset($_POST['alterar-veiculo'])) {

$codveiculo = $_POST['codveiculo'];
$preco = $_POST['preco'];
$array = array($preco, $codveiculo);
alterarVeiculo($conexao, $array);
header('location:../../vendedor/listarCarros-adm.php');
}

if (isset($_POST['comprar'])) {
$codveiculo = $_POST['comprar'];
$array = array($codveiculo);
deletarVeiculo($conexao, $array);

header('location:../../comprador/listarCarros.php');
}

if (isset($_POST['anunciar'])) {
$nome = $_POST['nome'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$preco = $_POST['preco'];
$array = array($marca, $modelo, $preco);
anunciarVeiculo($conexao, $array);
header('location:../../vendedor/listarCarros-adm.php');
}

if (isset($_POST['filtrar'])) {
$preco_max = $_POST['preco-max'];
$preco_min = $_POST['preco-min'];
$array = array($preco_min, $preco_max);
$carros = filtrarVeiculo($conexao, $array);
if ($carros != false) {
    require_once('../../veiculo/filtrarVeiculo.php');
}
}
if (isset($_POST['deletar-carro'])) {
$codveiculo = $_POST['deletar-carro'];
$array = array($codveiculo);
deletarVeiculo($conexao, $array);
header('Location:../../vendedor/listarCarros-adm.php');
}
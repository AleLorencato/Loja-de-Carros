<?php
require_once('../conecta.php');
require_once('../Funcoes/funcoes_veiculo.php');

$database = new Database();
$db = $database->connect();
$carro = new Carro($db);

if (isset($_POST['editar-carro'])) {
    $carro->codveiculo = $_POST['editar-carro'];
    $carroData = $carro->buscarPorId();
    require_once('../../Pages/Veiculo/alterarVeiculo.php');
}

if (isset($_POST['alterar-veiculo'])) {
    $carro->codveiculo = $_POST['codveiculo'];
    $carro->preco = $_POST['preco'];
    $carro->alterar();
    header('location:../../Pages/Vendedor/listarCarros-adm.php');
}

if (isset($_POST['comprar'])) {
    $carro->codveiculo = $_POST['comprar'];
    $carro->deletar();
    header('location:../../Pages/Comprador/listarCarros.php');
}

if (isset($_POST['anunciar'])) {
    $carro->marca = $_POST['marca'];
    $carro->modelo = $_POST['modelo'];
    $carro->preco = $_POST['preco'];
    $carro->inserir();
    header('location:../../Pages/Vendedor/listarCarros-adm.php');
}

if (isset($_POST['filtrar'])) {
    $preco_max = $_POST['preco-max'];
    $preco_min = $_POST['preco-min'];
    $carros = $carro->filtrar($preco_min, $preco_max);
    if ($carros != false) {
        require_once('../../Pages/Comprador/listarCarros.php');
    }
}

if (isset($_POST['deletar-carro'])) {
    $carro->codveiculo = $_POST['deletar-carro'];
    $carro->deletar();
    header('Location:../../Pages/Vendedor/listarCarros-adm.php');
}
<?php
require_once('../conecta.php');
require_once('../Funcoes/funcoes_veiculo.php');

$database = new Database();
$db = $database->connect();
$carro = new Carro($db);

if (isset($_POST['alterar-veiculo'])) {
    $carro->codveiculo = $_POST['codveiculo'];
    $carro->preco = $_POST['preco'];
    $carro->alterar();
    header('location:../../Pages/Vendedor/listarCarros-vend.php');
}

if (isset($_POST['comprar'])) {
    $carro->codveiculo = $_POST['comprar'];
    $carro->deletar();
    header('Location: ../../includes/logica/controller.php?listarCarros');
}

if (isset($_POST['anunciar'])) {
    if (empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['preco'])) {
        echo "<script>alert('Preencha todos os campos!');</script>";
        require_once('../../Pages/Veiculo/adicionar_veiculo.php');
        exit();
    }
    $carro->marca = $_POST['marca'];
    $carro->modelo = $_POST['modelo'];
    $carro->preco = $_POST['preco'];
    $carro->inserir();
    header('location:../../includes/logica/controller.php?listarCarrosVend');
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
    header('Location:../../Pages/Vendedor/listarCarros-vend.php');
}
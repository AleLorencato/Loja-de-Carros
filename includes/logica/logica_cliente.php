<?php

require_once '../conecta.php';
require_once '../Funcoes/funcoes_cliente.php';
require_once '../Funcoes/funcoes_veiculo.php';

function iniciarSessao($pessoa)
{
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['cod_pessoa'] = $pessoa['codcliente'];
    $_SESSION['nome'] = $pessoa['nome'];
    $_SESSION['image'] = $pessoa['image'];
}

function validarImagem($file, $id)
{
    $maxFileSize = 2 * 1024 * 1024;
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    $fileSize = $file['size'];
    $fileTmpName = $file['tmp_name'];
    $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($fileSize > $maxFileSize) {
        return 'O arquivo é muito grande. O tamanho máximo permitido é 2MB.';
    }

    if (!in_array($fileExtension, $allowedExtensions)) {
        return 'Tipo de arquivo não permitido. Apenas JPG, JPEG, PNG e GIF são permitidos.';
    }

    $newFileName = "image{$id}." . $fileExtension;
    $target = "../../uploads/" . $newFileName;

    if (move_uploaded_file($fileTmpName, $target)) {
        return $newFileName;
    } else {
        return 'Erro ao fazer upload do arquivo.';
    }
}

$database = new Database();
$db = $database->connect();
$cliente = new Cliente($db);


if (isset($_POST['cadastrar'])) {
    $cliente->nome = $_POST['nome'];
    $cliente->email = $_POST['email'];
    $cliente->senha = $_POST['senha'];
    $cliente->image = 'foto.png';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $cliente->image = validarImagem($_FILES['image'], $cliente->email);
        if (strpos($cliente->image, 'Erro') !== false) {
            die($cliente->image);
        }
    }

    if ($cliente->inserir()) {
        $stmt = $cliente->acessar();
        $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);
        iniciarSessao($pessoa);
        header('location:../../Pages/Comprador/listarCarros.php');
    }
}

if (isset($_POST['entrar'])) {
    $cliente->email = $_POST['email'];
    $cliente->senha = $_POST['senha'];

    $stmt = $cliente->acessar();
    $pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($pessoa) {
        iniciarSessao($pessoa);
        header('location:../../Pages/Comprador/listarCarros.php');
    } else {
        header('location:../../Auth/login.php');
    }
}

if (isset($_POST['sair'])) {
    session_start();
    session_destroy();
    header('location:../../Auth/login.php');
}

if (isset($_POST['alterar'])) {
    $cliente->codcliente = $_POST['codcliente'];
    $cliente->nome = $_POST['nome'];
    $cliente->email = $_POST['email'];
    $cliente->senha = $_POST['senha'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $cliente->image = validarImagem($_FILES['image'], $cliente->codcliente);
        if (strpos($cliente->image, 'Erro') !== false) {
            die($cliente->image);
        }
    }

    if ($cliente->alterar()) {
        header("Location: ../../Pages/Comprador/mostraPessoa.php");
    }
}

if (isset($_POST['deletar'])) {
    $cliente->codcliente = $_POST['deletar'];
    if ($cliente->deletar()) {
        session_start();
        if ($_SESSION['adm'] == true) {
            header('Location:../../Pages/Vendedor/listarCarros-adm.php');
        } else {
            header('Location:../../Pages/Comprador/listarCarros.php');
        }
    }
}

if (isset($_POST['deletar-conta'])) {
    $cliente->codcliente = $_POST['deletar-conta'];
    if ($cliente->deletar()) {
        session_start();
        session_destroy();
        header('location:../../Auth/login.php');
    }
}


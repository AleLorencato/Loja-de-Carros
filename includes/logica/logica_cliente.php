<?php

require_once '../conecta.php';
require_once '../Funcoes/funcoes_cliente.php';


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

if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $image = 'foto.png';

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = validarImagem($_FILES['image'], $email);
        if (strpos($image, 'Erro') !== false) {
            die($image);
        }
    }

    $array = array($nome, $email, $senha, $image);
    inserirCliente($conexao, $array);
    $array = array($email, $senha);
    $pessoa = acessarCliente($conexao, $array);
    iniciarSessao($pessoa);
    header('location:../../Pages/Comprador/listarCarros.php');
}


if (isset($_POST['entrar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email, $senha);
    $pessoa = acessarCliente($conexao, $array);

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

if (isset($_POST['editar'])) {

    $codpessoa = $_POST['editar'];
    $array = array($codpessoa);
    $pessoa = buscarCliente($conexao, $array);
    require_once('../../Pages/Comprador/alterarPessoa.php');
}

if (isset($_POST['editar2'])) {
    $codpessoa = $_POST['editar2'];
    $array = array($codpessoa);
    $pessoa = buscarCliente($conexao, $array);
    require_once('../../Pages/Comprador/alterarPerfil.php');
}


if (isset($_POST['pesquisa'])) {
    $email = $_POST['email-pesquisa'];
    $array = array('%' . $email . '%');
    $pessoa = buscarClienteEmail($conexao, $array);
    if ($pessoa != false) {
        require_once('../../Pages/Comprador/mostraPessoa.php');
    }
}

if (isset($_POST['alterar'])) {
    $codcliente = $_POST['codcliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $image = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = validarImagem($_FILES['image'], $codcliente);
        if (strpos($image, 'Erro') !== false) {
            die($image);
        }
    }

    $array = array($nome, $email, $senha, $image, $codcliente);
    alterarCliente($conexao, $array);
    header("Location: ../../Pages/Comprador/mostraPessoa.php");
}

if (isset($_POST['deletar'])) {
    $codpessoa = $_POST['deletar'];
    $array = array($codpessoa);
    deletarCliente($conexao, $array);
    session_start();
    if ($_SESSION['adm'] == true) {
        header('Location:../../Pages/Vendedor/listarCarros-adm.php');
    } else {
        header('Location:../../Pages/Comprador/listarCarros.php');
    }
}

if (isset($_POST['deletar-conta'])) {
    $codpessoa = $_POST['deletar-conta'];
    $array = array($codpessoa);
    deletarCliente($conexao, $array);
    session_start();
    session_destroy();
    header('location:../../Auth/login.php');
}

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


if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $image = $_FILES['image']['name'];
    $target = "../../uploads/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

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

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target_dir = "../../uploads/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
    } else {
        $image = null;
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

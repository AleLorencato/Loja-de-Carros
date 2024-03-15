<?php

require_once '../conecta.php';
require_once '../Funcoes/funcoes_cliente.php';


function iniciarSessao($pessoa, $adm = false)
{
    if ($adm) {
        session_start();
        $_SESSION['adm'] = true;
        $_SESSION['logado'] = true;
        $_SESSION['nome'] = $pessoa['nome'];
        $_SESSION['cod_pessoa'] = $pessoa['codvendedor'];
    } else {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['cod_pessoa'] = $pessoa['codcliente'];
        $_SESSION['nome'] = $pessoa['nome'];
    }
}

if (isset ($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $senha);
    inserirCliente($conexao, $array);
    $array = array($email, $senha);
    $pessoa = acessarCliente($conexao, $array);
    iniciarSessao($pessoa);
    header('location:../../Pages/Comprador/listarCarros.php');
}


if (isset ($_POST['entrar'])) {

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


if (isset ($_POST['sair'])) {
    session_start();
    session_destroy();
    header('location:../../Auth/login.php');
}

if (isset ($_POST['editar'])) {

    $codpessoa = $_POST['editar'];
    $array = array($codpessoa);
    $pessoa = buscarCliente($conexao, $array);
    require_once ('../../Pages/Comprador/alterarPessoa.php');
}
if (isset ($_POST['editar2'])) {
    $codpessoa = $_POST['editar2'];
    $array = array($codpessoa);
    $pessoa = buscarCliente($conexao, $array);
    require_once ('../../Pages/Comprador/alterarPerfil.php');
}


if (isset ($_POST['pesquisa'])) {
    $email = $_POST['email-pesquisa'];
    $array = array('%' . $email . '%');
    $pessoa = buscarClienteEmail($conexao, $array);
    if ($pessoa != false) {
        require_once ('../../Pages/Comprador/mostraPessoa.php');
    }
}

if (isset ($_POST['alterar'])) {

    $codpessoa = $_POST['codcliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $senha, $codpessoa);
    alterarCliente($conexao, $array);
    $_SESSION['nome'] = $array['nome'];
    $_SESSION['email'] = $email;
    if ($adm == 1) {
        header('Location:../../Pages/Vendedor/listarCarros-adm.php');
    } else {
        header('location:../../Pages/Comprador/listarCarros.php');
    }

}

if (isset ($_POST['deletar'])) {
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

if (isset ($_POST['deletar-conta'])) {
    $codpessoa = $_POST['deletar-conta'];
    $array = array($codpessoa);
    deletarCliente($conexao, $array);
    session_start();
    session_destroy();
    header('location:../../Auth/login.php');
}
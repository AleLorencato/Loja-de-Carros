<?php
require_once '../conecta.php';
require_once '../Funcoes/funcoes_vendedor.php';

if (isset ($_POST['cadastrar-adm'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $array = array($nome, $email, $cpf, $senha);
  inserirVendedor($conexao, $array);
  $array = array($email, $senha);
  $pessoa = acessarVendedor($conexao, $array);
  iniciarSessao($pessoa, true);
  header('location:../../Pages/Vendedor/listarCarros-adm.php');
}

if (isset ($_POST['entrar-adm'])) {

  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $array = array($email, $senha);
  $pessoa = acessarVendedor($conexao, $array);

  if ($pessoa) {
    iniciarSessao($pessoa, true);
    header('location:../../Pages/Vendedor/listarCarros-adm.php');
  } else {
    header('location:../../Auth/login-adm.php');
  }
}

if (isset ($_POST['alterar-vendedor'])) {
  $codpessoa = $_POST['codvendedor'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $array = array($nome, $email, $cpf, $senha, $codpessoa);
  alterarVendedor($conexao, $array);
  header('location:../../Pages/Vendedor/listarCarros-adm.php');
}

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
if (isset ($_POST['cadastrar-adm'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $array = array($nome, $email, $cpf, $senha);
  inserirVendedor($conexao, $array);
  $array = array($email, $senha);
  $pessoa = acessarVendedor($conexao, $array);
  iniciarSessao($pessoa, true);
  header('location:../../Pages/Vendedor/listarCarros-adm.php');
}

if (isset ($_POST['entrar-adm'])) {

  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $array = array($email, $senha);
  $pessoa = acessarVendedor($conexao, $array);

  if ($pessoa) {
    iniciarSessao($pessoa, true);
    header('location:../../Pages/Vendedor/listarCarros-adm.php');
  } else {
    header('location:../../Auth/login-adm.php');
  }
}

if (isset ($_POST['alterar-vendedor'])) {
  $codpessoa = $_POST['codvendedor'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $array = array($nome, $email, $cpf, $senha, $codpessoa);
  alterarVendedor($conexao, $array);
  header('location:../../Pages/Vendedor/listarCarros-adm.php');
}
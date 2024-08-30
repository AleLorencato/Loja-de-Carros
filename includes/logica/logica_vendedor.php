<?php
require_once '../conecta.php';
require_once '../Funcoes/funcoes_vendedor.php';

function iniciarSessao($pessoa)
{
  session_start();
  $_SESSION['logado'] = true;
  $_SESSION['nome'] = $pessoa['nome'];
  $_SESSION['cod_pessoa'] = $pessoa['codvendedor'];
}

if (isset($_POST['cadastrar-adm'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $image = $_FILES['image']['name'];
  $target = "../../uploads/" . basename($image);
  move_uploaded_file($_FILES['image']['tmp_name'], $target);
  $array = array($nome, $email, $cpf, $senha, $image);
  inserirVendedor($conexao, $array);
  $array = array($email, $senha);
  $pessoa = acessarVendedor($conexao, $array);
  iniciarSessao($pessoa);
  header('location:../../Pages/Vendedor/listarCarros-adm.php');
}

if (isset($_POST['alterar-vendedor'])) {
  $codvendedor = $_POST['codvendedor'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = $_FILES['image']['name'];
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);
  } else {
    $image = null;
  }

  $array = array($nome, $email, $cpf, $senha, $image, $codvendedor);
  alterarVendedor($conexao, $array);
  header('location:../../Pages/Vendedor/mostraPerfilVend.php');
}




if (isset($_POST['entrar-adm'])) {

  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $array = array($email, $senha);
  $pessoa = acessarVendedor($conexao, $array);

  if ($pessoa) {
    iniciarSessao($pessoa);
    header('location:../../Pages/Vendedor/listarCarros-adm.php');
  } else {
    header('location:../../Auth/login-adm.php');
  }
}

if (isset($_POST['sair'])) {
  session_start();
  session_destroy();
  header('location:../../Auth/login.php');
}

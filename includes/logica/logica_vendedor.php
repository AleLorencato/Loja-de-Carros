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

function validarImagem($file, $id)
{
  $maxFileSize = 2 * 1024 * 1024; // 2MB
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

if (isset($_POST['cadastrar-adm'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];
  $senha = $_POST['senha'];
  $image = 'foto.png'; // Default image

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = validarImagem($_FILES['image'], $cpf);
    if (strpos($image, 'Erro') !== false) {
      die($image); // Handle error appropriately
    }
  }

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
  $image = null;

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = validarImagem($_FILES['image'], $codvendedor);
    if (strpos($image, 'Erro') !== false) {
      die($image); // Handle error appropriately
    }
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

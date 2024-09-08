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

$database = new Database();
$db = $database->connect();
$vendedor = new Vendedor($db);

if (isset($_POST['cadastrar-adm'])) {
  $vendedor->nome = $_POST['nome'];
  $vendedor->email = $_POST['email'];
  $vendedor->cpf = $_POST['cpf'];
  $vendedor->senha = $_POST['senha'];
  $vendedor->image = 'foto.png';

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $vendedor->image = validarImagem($_FILES['image'], $vendedor->cpf);
    if (strpos($vendedor->image, 'Erro') !== false) {
      die($vendedor->image);
    }
  }

  if ($vendedor->inserir()) {
    $pessoa = $vendedor->acessar();
    iniciarSessao($pessoa);
    header('location:../../Pages/Vendedor/listarCarros-adm.php');
  }
}

if (isset($_POST['alterar-vendedor'])) {
  $vendedor->codvendedor = $_POST['codvendedor'];
  $vendedor->nome = $_POST['nome'];
  $vendedor->email = $_POST['email'];
  $vendedor->cpf = $_POST['cpf'];
  $vendedor->senha = $_POST['senha'];

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $vendedor->image = validarImagem($_FILES['image'], $vendedor->codvendedor);
    if (strpos($vendedor->image, 'Erro') !== false) {
      die($vendedor->image);
    }
  }

  if ($vendedor->alterar()) {
    header('location:../../Pages/Vendedor/mostraPerfilVend.php');
  }
}

if (isset($_POST['entrar-adm'])) {
  $vendedor->email = $_POST['email'];
  $vendedor->senha = $_POST['senha'];

  $pessoa = $vendedor->acessar();

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
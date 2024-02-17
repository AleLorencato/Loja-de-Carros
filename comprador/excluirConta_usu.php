<!DOCTYPE html>
<html>

<head>
  <?php
  include_once('../includes/componentes/cabecalho.php');
  include_once('../includes/logica/conecta.php');
  include_once('../includes/logica/funcoes_pessoa.php');

  $codcliente = $_SESSION['cod_pessoa'];
  $array = array($codcliente);
  $pessoa = buscarcliente($conexao, $array);

  ?>
  <link rel="stylesheet" href="../pages.css">
  <title>Alterar Usuário</title>
</head>

<body>

  <main>
    <section>
      <p>Nome:
        <?php echo $pessoa['nome']; ?>
      </p>
      <p>Email:
        <?php echo $pessoa['email']; ?>
      </p>
      <p>Senha:
        <?php echo $pessoa['senha']; ?>
      </p>
      <form action="../includes/logica/logica_pessoa.php" method="post">
        <input type="hidden" id='codpessoa' name='codpessoa' value="<?php echo $pessoa['codcliente']; ?>">
        <button type="submit" name="deletar-conta" value="<?php echo $pessoa['codcliente']; ?>"> Deletar Conta </button>
      </form>
    </section>
  </main>

</body>

</html>
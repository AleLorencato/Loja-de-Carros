<!DOCTYPE html>
<html>
<?php
 include_once('../includes/componentes/cabecalho.php');
 include_once('../includes/logica/conecta.php');
 include_once('../includes/logica/funcoes_pessoa.php');

$codvendedor = $_SESSION['cod_pessoa'];
$array = array($codvendedor);
$pessoa=buscarVend($conexao,$array);

?>
    <title>Alterar Usuário</title>
</head>
<body>

<main>
    <section>
    <form action="../includes/logica/logica_pessoa.php" method="post">
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $pessoa['nome']; ?>"></p>
      <p><label for="email">Email: </label><input type="text" name="email" id="email" value="<?php echo $pessoa['email']; ?>"></p>
      <p><label for="cpf">CPF: </label><input type="text" name="cpf" id="cpf" value="<?php echo $pessoa['cpf']; ?>"></p>
      <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" value="<?php echo $pessoa['senha']; ?>"></p>
      <input type="hidden" id='codvendedor' name='codvendedor' value="<?php echo $pessoa['codvendedor']; ?>">
      <p> <button type="submit" id='alterar-vendedor' name='alterar-vendedor' value="Alterar">Alterar</button>
      </p>
        </form>
    </section>
</main>

</body>
</html>
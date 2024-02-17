<!DOCTYPE html>
<html>
<?php
 include_once('../componentes/cabecalho.php');
?>
    <title>Alterar Perfil</title>
</head>
<body>

<main>
    <section>
    <form action="logica_pessoa.php" method="post">
      <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome" value="<?php echo $pessoa['nome']; ?>"></p>
      <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha" value="<?php echo $pessoa['senha']; ?>"></p>
      <input type="hidden" id='codcliente' name='codcliente' value="<?php echo $pessoa['codcliente']; ?>">
      <p> <input type="submit" id='perfil' name='perfil' value="Alterar">
      </p>        
        </form>
    </section>
</main>

</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once('../includes/componentes/cabecalho.php');
    ?>
    <link rel="stylesheet" href="../pages.css">
    <title>Alterar Usuário</title>
</head>

<body>

    <main>
        <section>
            <form action="../includes/logica/logica_pessoa.php" method="post">
                <p><label for="nome">Nome: </label><input type="text" name="nome" id="nome"
                        value="<?php echo $pessoa['nome']; ?>"></p>
                <p><label for="email">Email: </label><input type="text" name="email" id="email"
                        value="<?php echo $pessoa['email']; ?>"></p>
                <p><label for="senha">Senha: </label><input type="password" name="senha" id="senha"
                        value="<?php echo $pessoa['senha']; ?>"></p>
                <input type="hidden" id='codcliente' name='codcliente' value="<?php echo $pessoa['codcliente']; ?>">
                <p> <input type="submit" id='alterar' name='alterar' value="Alterar">
                </p>
            </form>
        </section>
    </main>


</body>

</html>
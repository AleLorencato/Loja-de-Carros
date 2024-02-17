<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Alterar Dados</title>
    <?php
    include_once('../includes/componentes/cabecalho.php');
    include_once('../includes/logica/conecta.php');
    include_once('../includes/logica/funcoes_pessoa.php');

    $codcliente = $_SESSION['cod_pessoa'];
    $array = array($codcliente);
    $pessoa = buscarCliente($conexao, $array);

    ?>
        <script src="../script.js"></script>
        <link rel="stylesheet" href="../login.css">
</head>

<body>


    <section class="login-container">
        <form id="cadastro" action="../includes/logica/logica_pessoa.php" method="post" class="form-container">
            <input class="input" type="text" name="nome" placeholder="Digite seu Nome" id="nome"
                value="<?php echo $pessoa['nome']; ?>" />
            <input class="input" type="email" id="email" name="email" placeholder="Digite seu e-mail"
                value="<?php echo $pessoa['email']; ?>" />
            <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" />
            <input class=" input" type="password" name="confirmação senha" id="sh2" placeholder="Confirme sua senha" />
            <input type="hidden" class="input" id='codcliente' name='codcliente'
                value="<?php echo $pessoa['codcliente']; ?>">
            <button type="submit" id='alterar' name='alterar' value="Alterar" class="btn-primary">
                Alterar
            </button>
            <button onclick="location.href='listarCarros.php'" class="btn-secondary">Voltar</button>
        </form>
    </section>
    <div class="msg" id="mensagem"></div>
    <div class="msg" id="mensagem2"></div>
</body>

</html>
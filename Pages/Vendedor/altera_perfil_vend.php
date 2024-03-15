<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Alterar Dados</title>
    <?php
    include_once ("../../Includes/componentes/cabecalho.php");
    include_once ('../../Includes/Funcoes/funcoes_vendedor.php');
    include_once ("../../Includes/conecta.php");

    $codvendedor = $_SESSION['cod_pessoa'];
    $array = array($codvendedor);
    $pessoa = buscarVend($conexao, $array);

    ?>
    <script src="../../Auth/Scripts/cadastro.js"></script>
    <link rel="stylesheet" href="../../Auth/login.css">
</head>

<body>
    <section class="login-container">
        <form id="form" action="../../Includes/logica_vendedor.php" method="post" class="form-container">
            <input class="input" type="text" name="nome" placeholder="Digite seu Nome" id="nome"
                value="<?php echo $pessoa['nome']; ?>" />
            <input class="input" type="email" id="email" name="email" placeholder="Digite seu e-mail"
                value="<?php echo $pessoa['email']; ?>" />
            <input class="input" id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" oninput="mascara(this)"
                value="<?php echo $pessoa['cpf']; ?>" />
            <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" />
            <input class=" input" type="password" name="confirmação senha" id="sh2" placeholder="Confirme sua senha" />
            <input type="hidden" class="input" id='codvendedor' name='codvendedor'
                value="<?php echo $pessoa['codvendedor']; ?>">
            <button type="submit" id='alterar-vendedor' name='alterar-vendedor' value="Alterar" class="btn-primary">
                Alterar
            </button>
            <button onclick="location.href='./listarCarros-adm.php'" class="btn-secondary">Voltar</button>
        </form>
    </section>
    <div class="msg" id="mensagem"></div>
    <div class="msg" id="mensagem2"></div>
</body>

</html>
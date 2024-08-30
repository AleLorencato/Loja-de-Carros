<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Alterar Dados</title>
    <?php
    include_once("../../includes/componentes/cabecalho.php");
    include_once('../../includes/Funcoes/funcoes_vendedor.php');
    include_once("../../includes/conecta.php");

    $codvendedor = $_SESSION['cod_pessoa'];
    $array = array($codvendedor);
    $pessoa = buscarVendedor($conexao, $array);

    ?>
    <script src="../../Auth/Scripts/cadastro.js"></script>
    <link rel="stylesheet" href="../../Auth/login.css">
</head>

<body>
    <section class="login-container">
        <form id="form" action="../../includes/logica/logica_vendedor.php" method="post" enctype="multipart/form-data" class="form-container">
            <input class="input" type="text" name="nome" placeholder="Digite seu Nome" id="nome"
                value="<?php echo $pessoa['nome']; ?>" />
            <input class="input" type="email" id="email" name="email" placeholder="Digite seu e-mail"
                value="<?php echo $pessoa['email']; ?>" />
            <input class="input" id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" oninput="mascara(this)"
                value="<?php echo $pessoa['cpf']; ?>" />
            <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" />
            <input class="input" type="password" name="confirmação senha" id="sh2" placeholder="Confirme sua senha" />
            <input class="input" type="file" name="image" id="image" />
            <img id="image-preview" style="display:none; width: 100px; height: 100px;" />
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
    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('image-preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        document.getElementById('form').addEventListener('submit', function(event) {
            const email = document.getElementById('email').value;
            if (!validateEmail(email)) {
                alert('Por favor, insira um email válido.');
                event.preventDefault();
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(String(email).toLowerCase());
        }
    </script>
</body>

</html>
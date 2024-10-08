<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Alterar Dados</title>
    <?php
    include_once("../../includes/componentes/cabecalho.php");
    include_once('../../includes/Funcoes/funcoes_vendedor.php');
    include_once("../../includes/conecta.php");

    if (!isset($_SESSION['pessoa'])) {
        header('Location: ../../includes/logica/controller.php?mostrarVend&codvendedor=' . $_SESSION['cod_pessoa']);
        exit();
    }
    if (isset($_SESSION['message'])) {
        $mensagem = $_SESSION['message'];
    } else {
        $mensagem = '';
    }
    $pessoa = $_SESSION['pessoa'];

    ?>
    <script src="../../Auth/Scripts/cadastro.js"></script>
    <link rel="stylesheet" href="../../Auth/login.css">
</head>

<body>
    <main>
        <h1>Alterar Dados do Perfil</h1>
        <div class="login-wrapper">
            <section class="login-container">
                <form id="form" action="../../includes/logica/logica_vendedor.php" method="post"
                    enctype="multipart/form-data" class="form-container">
                    <input class="input" type="text" name="nome" placeholder="Digite seu Nome" id="nome"
                        value="<?php echo $pessoa['nome']; ?>" />
                    <input class="input" type="email" id="email" name="email" placeholder="Digite seu e-mail"
                        value="<?php echo $pessoa['email']; ?>" />
                    <input class="input" id="cpf" type="text" name="cpf" placeholder="Digite seu CPF"
                        oninput="mascara(this)" value="<?php echo $pessoa['cpf']; ?>" />
                    <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" />
                    <input class="input" type="password" name="confirmação senha" id="sh2"
                        placeholder="Confirme sua senha" />
                    <input class="input" type="file" name="image" id="image" />
                    <img id="image-preview" style="display:none; width: 100px; height: 100px;" />
                    <input type="hidden" class="input" id='codvendedor' name='codvendedor'
                        value="<?php echo $pessoa['codvendedor']; ?>">
                    <button type="submit" id='alterar-vendedor' name='alterar-vendedor' value="Alterar"
                        class="btn-primary">
                        Alterar
                    </button>
                    <p class="msg" id="mensagem"></p>
                    <p class="msg" id="mensagem2"></p>
                    <p class="imageResult">
                        <?php
                        echo $mensagem;
                        ?>
                    </p>
                    <button onclick="location.href='./mostraPerfilVend.php'" class="btn-secondary">Voltar</button>
                </form>
            </section>
        </div>

    </main>


    <script>
        document.getElementById('image').addEventListener('change', function (event) {
            const reader = new FileReader();
            reader.onload = function () {
                const preview = document.getElementById('image-preview');
                preview.src = reader.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        });

        document.getElementById('form').addEventListener('submit', function (event) {
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
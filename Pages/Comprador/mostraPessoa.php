<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("../../includes/componentes/cabecalho.php");
    include_once('../../includes/Funcoes/funcoes_cliente.php');
    include_once("../../includes/conecta.php");
    $codcliente = $_SESSION['cod_pessoa'];
    $array = array($codcliente);
    $pessoa = buscarCliente($conexao, $array);
    ?>
    <title>Listar Usuário</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>

    <main>
        <h3> Usuário: </h3>
        <p>Nome:
            <?php echo $pessoa['nome']; ?>
        </p>
        <p>Email:
            <?php echo $pessoa['email']; ?>
        </p>
        <p>Foto de Perfil:</p>
        <img src="../../uploads/<?php echo $pessoa['image']; ?>" alt="Foto de Perfil" width="150" height="150">
        <p>Localização:</p>
        <p id="location"></p>
        <button id="get-location" class="btn-small">Obter Localização</button>

        <a href="./alterarPerfil.php" class="btn-small">Editar Perfil</a>

        <a href="../Comprador/listarCarros.php" class="btn-small">Voltar</a>
    </main>
    <script>
        document.getElementById('get-location').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert('Geolocalização não é suportada pelo seu navegador.');
            }
        });

        function showPosition(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            document.getElementById('location').textContent = `Latitude: ${latitude}, Longitude: ${longitude}`;
        }
    </script>
</body>

</html>
<?php
include_once("../../includes/componentes/cabecalho.php");
include_once("../../includes/conecta.php");
include_once("../../includes/Funcoes/funcoes_cliente.php");

if (!isset($_SESSION['pessoa'])) {
    header('Location: ../../includes/logica/controller.php?mostrarPessoa&codcliente=' . $_SESSION['cod_pessoa']);
    exit();
}

$pessoa = $_SESSION['pessoa'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>

    <main>
        <h1 class="center-align">Perfil do Cliente</h1>
        <div class="container-perfil">
            <p>Nome:
                <?php echo $pessoa['nome']; ?>
            </p>
            <p>Email:
                <?php echo $pessoa['email']; ?>
            </p>
            <div class="center-align">
                <p>Foto de Perfil:</p>
                <img src="../../uploads/<?php echo $pessoa['image']; ?>" alt="Foto de Perfil" class="circle" width="150"
                    height="150">
            </div>

            <div class="button-wrapper">
                <button id="find-me" class="btn-small indigo lighten-1 profile-buttons">Mostrar minha
                    localização</button>
                <p id="status"></p>
                <a id="map-link" target="_blank" style="color:#039be5;font-size:1.5rem;"></a>

                <a href="./alterarPerfil.php" class="btn-small indigo lighten-1 profile-buttons">Alterar Dados Do
                    perfil</a>
                <a href="../Comprador/listarCarros.php" class="btn-small indigo lighten-1 profile-buttons">Voltar</a>
            </div>
        </div>
    </main>

    <script>
        function geoFindMe() {
            const status = document.querySelector('#status')
            const mapLink = document.querySelector('#map-link')

            mapLink.href = ''
            mapLink.textContent = ''

            function success(position) {
                const latitude = position.coords.latitude
                const longitude = position.coords.longitude

                status.textContent = ''
                mapLink.href = `https://www.openstreetmap.org/#map=18/${latitude}/${longitude}`
                mapLink.textContent = `Clique aqui para ver sua localização`
            }

            function error() {
                status.textContent = 'Não foi possível recuperar sua localização'
            }

            if (!navigator.geolocation) {
                status.textContent =
                    'Geolocalização não é suportada pelo seu navegador'
            } else {
                status.textContent = 'Localizando…'
                navigator.geolocation.getCurrentPosition(success, error)
            }
        }

        document.querySelector('#find-me').addEventListener('click', geoFindMe)
    </script>
</body>

</html>
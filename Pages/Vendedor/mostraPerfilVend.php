<?php
include_once("../../includes/conecta.php");
include_once("../../includes/Funcoes/funcoes_vendedor.php");
session_start();
$codvendedor = $_SESSION['cod_pessoa'];
$array = array($codvendedor);
$pessoa = buscarVendedor($conexao, $array);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>Perfil do Vendedor</title>
  <link rel="stylesheet" href="../../Styles/pages.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>

  <main>
    <h3> Vendedor: </h3>
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
    <button id="get-location" class="btn-small">Obter Localização</button><br><br>

    <a href="./altera_perfil_vend.php" class="btn-small">Alterar Dados Do perfil</a>
    <a href="./listarCarros-adm.php" class="btn-small">Voltar</a>
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
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  include_once('../includes/componentes/cabecalho.php');
  ?>
  <title>Cadastro</title>
  <link rel="stylesheet" href="../pages.css">
</head>

<body>
  <header>
    <h1>Anunciar Veículo</h1>
  </header>
  <form id="cadastro" action="..\includes\logica\logica_pessoa.php" method="post" class="form-container">
    <!-- <input
            class="input"
            type="text"
            name="marca"
            placeholder="Digite a marca do Veículo"
            id="marca"
          /> -->
    <select name="marca" id="marca">
      <option value="Volkswagen">Volkswagen</option>
      <option value="Fiat">Fiat</option>
      <option value="Renault">Renault</option>
      <option value="Chevrolet">Chevrolet</option>
      <option value="Bmw">Bmw</option>
      <option value="Ford">Ford</option>
      <option value="Mercedes">Mercedes</option>
      <option value="Hyundai">Hyundai</option>
    </select>
    <input class="input" type="text" id="modelo" name="modelo" placeholder="Digite o Modelo do Veículo" />
    <input class="input" id="preco" type="number" name="preco" placeholder="Digite o preco do Veículo" />
    <button type="submit" id='anunciar' name='anunciar' value="Anunciar"> Anunciar </button>
  </form>
</body>

</html>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php
  include_once("../../includes/componentes/cabecalho.php");
  ?>
  <title>Cadastro de Veículo</title>
  <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>
  <header>
    <h1 class="center-align">Anunciar Veículo</h1>
  </header>
  <div class="container">
    <form id="cadastro" action="../../Includes/logica/logica_veiculo.php" method="post" class="form-container">
      <div class="input-field">
        <select name="marca" id="marca">
          <option value="" disabled selected>Escolha uma Marca</option>
        </select>
        <label for="marca">Marca</label>
      </div>
      <div class="input-field">
        <input type="text" id="novaMarca" placeholder="Adicionar Nova Marca" />
        <button type="button" id="adicionarMarca" class="btn waves-effect waves-light indigo lighten-1">Adicionar
          Marca</button>
      </div>
      <div class="input-field">
        <input type="text" id="modelo" name="modelo" placeholder="Digite o Modelo do Veículo" />
        <label for="modelo">Modelo</label>
      </div>

      <div class="input-field">
        <input type="number" id="preco" name="preco" placeholder="Digite o preço do Veículo" />
        <label for="preco">Preço</label>
      </div>

      <p>Cotação do Dólar:</p>
      <p id="exchange-rate"></p>
      <button type="button" id="get-exchange-rate" class="btn waves-effect waves-light btn-block indigo lighten-1">Obter
        Cotação do Dólar</button>
      <button type="submit" name="anunciar" value="anunciar"
        class="btn waves-effect waves-light btn-block indigo lighten-1">Adicionar Veículo</button>
    </form>
    <a href="../Vendedor/listarCarros-adm.php" class="btn small left indigo lighten-1">Voltar</a>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });

    const marcas = ["Volkswagen", "Fiat", "Renault", "Chevrolet", "Bmw", "Ford", "Mercedes", "Hyundai", "Toyota", "Honda", "Nissan", "Jeep"];

    function atualizarDropdown() {
      const select = document.getElementById('marca');
      select.innerHTML = '<option value="" disabled selected>Escolha uma Marca</option>';
      marcas.forEach(marca => {
        const option = document.createElement('option');
        option.value = marca;
        option.textContent = marca;
        select.appendChild(option);
      });
      M.FormSelect.init(select);
    }

    document.getElementById('adicionarMarca').addEventListener('click', function () {
      const novaMarca = document.getElementById('novaMarca').value.trim();
      if (novaMarca && !marcas.includes(novaMarca)) {
        marcas.push(novaMarca);
        atualizarDropdown();
        document.getElementById('novaMarca').value = '';
        alert('Marca adicionada com sucesso!');
      } else {
        alert('Marca inválida ou já existente.');
      }
    });
    atualizarDropdown();

    document.getElementById('get-exchange-rate').addEventListener('click', function () {
      fetch('https://api.exchangerate-api.com/v4/latest/USD')
        .then(response => response.json())
        .then(data => {
          const rate = data.rates.BRL;
          const preco = document.getElementById('preco').value;
          const precoEmDolares = (preco / rate).toFixed(2);
          document.getElementById('exchange-rate').textContent = `1 USD = ${rate} BRL | Preço em USD: $${precoEmDolares}`;
        })
        .catch(error => console.error('Erro ao obter cotação:', error));
    });
  </script>
</body>

</html>
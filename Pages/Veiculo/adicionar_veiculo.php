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
    <div class="row">
      <div class="col s12 m8 offset-m2 l6 offset-l3">
        <div class="card">
          <div class="card-content">
            <form id="cadastro" action="../../Includes/logica/logica_veiculo.php" method="post" class="form-container">
              <div class="input-field">
                <select name="marca" id="marca">
                  <option value="" disabled selected>Escolha uma Marca</option>
                  <option value="Volkswagen">Volkswagen</option>
                  <option value="Fiat">Fiat</option>
                  <option value="Renault">Renault</option>
                  <option value="Chevrolet">Chevrolet</option>
                  <option value="Bmw">Bmw</option>
                  <option value="Ford">Ford</option>
                  <option value="Mercedes">Mercedes</option>
                  <option value="Hyundai">Hyundai</option>
                </select>
                <label for="marca">Marca</label>
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
              <button type="button" id="get-exchange-rate" class="btn waves-effect waves-light">Obter Cotação do Dólar</button>
              <button type="submit" id='anunciar' name='anunciar' value="Anunciar" class="btn waves-effect waves-light">Anunciar</button>
              <a href="../Vendedor/listarCarros-adm.php" class="btn-flat">Voltar</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var elems = document.querySelectorAll('select');
      var instances = M.FormSelect.init(elems);
    });

    document.getElementById('get-exchange-rate').addEventListener('click', function() {
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
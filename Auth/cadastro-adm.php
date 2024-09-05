<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro</title>
  <script src="./Scripts/cadastro.js"></script>
  <link rel="stylesheet" href="./login.css">
</head>

<body>
  <main>
    <h1>Cadastro Vendedor</h1>
    <div class="login-wrapper">
      <section class="login-container">
        <form id="form" action="../Includes/logica/logica_vendedor.php" method="post" class="form-container">
          <input class="input" type="text" name="nome" placeholder="Digite seu Nome" id="nome" />
          <input class="input" type="email" id="email" name="email" placeholder="Digite seu e-mail" />
          <input class="input" id="cpf" type="text" name="cpf" placeholder="Digite seu CPF" oninput="mascara(this)" />
          <input class="input" type="password" name="senha" id="senha" placeholder="Digite sua senha" />
          <input class="input" type="password" name="confirmação senha" id="sh2" placeholder="Confirme sua senha" />
          <button type="submit" id='cadastrar-adm' name='cadastrar-adm' value="Cadastrar" class="btn-primary"> Cadastrar
          </button>
          <button onclick="location.href='./login-adm.php'" class="btn-secondary">Voltar</button>
        </form>
      </section>
      <p class="msg" id="mensagem" style="color:red;"></p>
      <p class="msg" id="mensagem2" style="color:red;"></p>
    </div>
  </main>
</body>

</html>
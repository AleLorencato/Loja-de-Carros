<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
  <script src="./script/login.js"></script>
</head>

<body>
  <main>
    <h1> Login - Vendedor </h1>
    <section class="login-container">
      <form action="includes/logica/logica_pessoa.php" method="post" id="form">
        <p><label for="email">
            <p style="text-align: start; margin-bottom: 1.5rem;">Endereço de E-mail</p>
          </label><input type="email" name="email" id="email" placeholder="Digite aqui Seu E-mail" class="input"></p>
        <p><label for="senha">
            <p style="text-align: start; margin-bottom: 1.5rem;">Senha</p>
          </label><input type="password" name="senha" id="senha" placeholder="Digite aqui sua Senha" class="input"></p>
        <p><button type="submit" id='entrar-adm' name='entrar-adm' value="Entrar" class="btn-primary"> Entrar </button>
        </p>
      </form>
      <a href="./vendedor/cadastro-adm.php">
        <p><button id='cad' name='cad' class="btn-secondary"> Criar conta de Vendedor </button> </p>
      </a>
      <a href="login.php">
        <p><button id='cad' name='cad' class="btn-secondary"> Voltar </button> </p>
      </a>
    </section>
    <div class="msg" id="text"></div>
  </main>
</body>

</html>
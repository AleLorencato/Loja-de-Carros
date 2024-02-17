<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
</head>

<body>
  <main>
    <div class="wrapper">
      <svg>
        <text x="50%" y="50%" dy=".35em" text-anchor="middle">
          Lorençato Motors
        </text>
      </svg>
    </div>

    <div class="login-wrapper">
      <section class="login-container">
        <form action="includes/logica/logica_pessoa.php" method="post">
          <p><label for="email"></label><input type="text" name="email" id="email" placeholder="E-mail"></p>
          <p><label for="senha"></label><input type="password" name="senha" id="senha" placeholder="Senha"></p>
          <p><button type="submit" id='entrar' name='entrar' value="Entrar" class="btn-primary"> Entrar </button> </p>
        </form>
        <h2>Esta é a sua primeira vez aqui?</h2>
        <p>Para ter acesso completo a este site, você primeiro precisa criar uma conta.</p>
        <a href="cadastro.php">
          <p><button id='cad' name='cad' class="btn-secondary" style="margin-top: 1.5rem;"> Criar Conta </button>
          </p>
        </a>
        <h2>Página do Vendedor</h2>
        <a href="login-adm.php">
          <p><button id='cad' name='cad' class="btn-secondary" style="margin-top: 1.5rem;"> Acessar como Vendedor
            </button> </p>
        </a>
      </section>
    </div>
  </main>
</body>

</html>
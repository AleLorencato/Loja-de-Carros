<!DOCTYPE html>
<html>

<head>
   <?php
   include_once('../includes/componentes/cabecalho.php');
   include_once('../includes/logica/funcoes_pessoa.php');
   include_once('../includes/logica/conecta.php');
   ?>
   <link rel="stylesheet" href="../pages.css">
   <title>Pesquisar Cliente</title>
</head>

<body>

   <body>
      <?php
      ?>
      <main>
         <h2> Usuário Logado:
            <?php echo $_SESSION['nome']; ?>
         </h2>
         <h3> Digite o e-mail da pessoa que deseja pesquisar: </h3>
         <form action="../includes/logica/logica_pessoa.php" method="post">
            <p><label for="email-pesquisa">Email: </label><input type="text" name="email-pesquisa" id="email-pesquisa"
                  value=""></p>
            <button type="submit" id='pesquisa' name='pesquisa' value="Pesquisar">Pesquisar</button>
         </form>
         <a href="../vendedor/listarCarros-adm.php">
            <p>Voltar</p>
         </a>
      </main>
   </body>

</html>
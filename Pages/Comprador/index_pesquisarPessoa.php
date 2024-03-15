<!DOCTYPE html>
<html>

<head>
   <?php
   include_once ("../../Includes/componentes/cabecalho.php");
   include_once ("../../Includes/Funcoes/funcoes_cliente.php");
   include_once ("../../Includes/conecta.php");
   ?>
   <link rel="stylesheet" href="../../Styles/pages.css">
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
         <form action="../../Includes/logica/logica_cliente.php" method="post">
            <p><label for="email-pesquisa">Email: </label><input type="text" name="email-pesquisa" id="email-pesquisa"
                  value=""></p>
            <button type="submit" id='pesquisa' name='pesquisa' value="Pesquisar">Pesquisar</button>
         </form>
         <a href="../Vendedor/listarCarros-adm.php">
            <p>Voltar</p>
         </a>
      </main>
   </body>

</html>
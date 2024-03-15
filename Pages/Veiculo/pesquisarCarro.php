<!DOCTYPE html>
<html>

<head>
   <?php
   include_once("../../Includes/componentes/cabecalho.php");
   include_once('../Includes/logica/funcoes_pessoa.php');
   include_once("../../Includes/conecta.php");
   ?>
   <title>Filtrar Veículo</title>
   <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>
   <?php
   ?>
   <main>
      <h2> Usuário Logado:
         <?php echo $_SESSION['nome']; ?>
      </h2>
      <h3> Digite o preço Máximo e Mínimo que deseja filtrar nos veículos: </h3>
      <form action="../Includes/logica/../../Includes/logica_vendedor.php" method="post">
         <p><label for="preco-max">Preço Máximo: </label><input type="text" name="preco-max" id="preco-max" value="">
         </p>
         <p><label for="preco-min">Preço Mínimo: </label><input type="text" name="preco-min" id="preco-min" value="">
         </p>
         <button type="submit" id='filtrar' name='filtrar' value="Filtrar">Filtrar</button>
      </form>
      <a href="listarCarros.php">
         <p>Voltar</p>
      </a>
   </main>
</body>

</html>
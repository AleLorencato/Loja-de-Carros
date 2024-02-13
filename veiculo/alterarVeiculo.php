<!DOCTYPE html>
<html>
<?php
 include_once('../componentes/cabecalho.php');
?>
    <title>Alterar Veículo</title>
</head>
<body>

<main>
    <section>
    <p>Marca: <?php echo $carro['marca']; ?></p>
                    <p>Modelo: <?php echo $carro['modelo']; ?></p>
                    
    <form action="logica_pessoa.php" method="post">
      <p><label for="preco">Preco: </label><input type="text" name="preco" id="preco" value="<?php echo $carro['preco']; ?>"></p>
      <input type="hidden" id='codveiculo' name='codveiculo' value="<?php echo $carro['codveiculo']; ?>">
      <p> <button type="submit" id='alterar-veiculo' name='alterar-veiculo' value="Alterar">Alterar</button></p>        
        </form>
    </section>
</main>


</body>
</html>
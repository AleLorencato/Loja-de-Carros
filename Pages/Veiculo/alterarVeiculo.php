<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("../../includes/componentes/cabecalho.php");
    include_once('../../includes/Funcoes/funcoes_veiculo.php');
    include_once("../../includes/conecta.php");
    include_once("../../includes/logica/logica_veiculo.php")
    ?>
    <title>Alterar Veículo</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>

    <main>
        <section>
            <p>Marca:
                <?php echo $carro['marca']; ?>
            </p>
            <p>Modelo:
                <?php echo $carro['modelo']; ?>
            </p>

            <form action="../../includes/logica/logica_veiculo.php" method="post">
                <p><label for="preco">Preco: </label><input type="text" name="preco" id="preco"
                        value="<?php echo $carro['preco']; ?>"></p>
                <input type="hidden" id='codveiculo' name='codveiculo' value="<?php echo $carro['codveiculo']; ?>">
                <p> <button type="submit" id='alterar-veiculo' name='alterar-veiculo' value="Alterar">Alterar</button>
                </p>
            </form>
        </section>
    </main>

</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once ("../../Includes/componentes/cabecalho.php");
    include_once ('../../Includes/logica/funcoes_veiculo.php');
    include_once ("../../Includes/conecta.php");
    include_once ('../../Includes/logica/logica_cliente.php');
    ?>
    <title>Listar Veículos</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>

    <main>
        <h2> Usuário Logado:
            <?php echo $_SESSION['nome']; ?>
        </h2>
        <h3> Listagem de Veículos </h3>
        <?php
        // $carros = listarCarro($conexao);
        if (empty ($carros)) {
            ?>
            <section>
                <p>Não há veículos cadastrados.</p>
            </section>
            <?php
        }
        foreach ($carros as $carro) {
            ?>
            <section>
                <p>Marca:
                    <?php echo $carro['marca']; ?>
                </p>
                <p>Modelo:
                    <?php echo $carro['modelo']; ?>
                </p>
                <p>Preco:
                    <?php echo $carro['preco']; ?>
                </p>

                <br><br>
            </section>
            <?php
        }
        ?>
    </main>
    <?php require ('../../Includes/componentes/menu.php'); ?>
    <a href="../Comprador/listarCarros.php">
        <p>Voltar</p>
    </a>
</body>

</html>
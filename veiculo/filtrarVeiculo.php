<!DOCTYPE html>
<html>

<head>
    <?php
    include_once('../includes/componentes/cabecalho.php');
    include_once('../includes/logica/funcoes_pessoa.php');
    include_once('../includes/logica/conecta.php');
    include_once('../includes/logica/logica_pessoa.php');
    ?>
    <title>Listar Veículos</title>
    <link rel="stylesheet" href="../pages.css">
</head>

<body>

    <main>
        <h2> Usuário Logado:
            <?php echo $_SESSION['nome']; ?>
        </h2>
        <h3> Listagem de Veículos </h3>
        <?php
        // $carros = listarCarro($conexao);
        if (empty($carros)) {
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
    <?php require('..\componentes\footer_comp.php'); ?>
    <a href="../../comprador/listarCarros.php">
        <p>Voltar</p>
    </a>
</body>

</html>
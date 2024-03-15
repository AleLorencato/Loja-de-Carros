<!DOCTYPE html>
<html>

<head>
    <?php
    include_once ("../../Includes/componentes/cabecalho.php");
    include_once ('../../Includes/Funcoes/funcoes_veiculo.php');
    include_once ("../../Includes/conecta.php");
    ?>
    <title>Listar Veículos</title>
</head>

<body>

    <main>
        <h2> Usuário Logado:
            <?php echo $_SESSION['nome']; ?>
        </h2>
        <h3> Listagem de Veículos </h3>
        <?php
        $carros = listarCarro($conexao);
        if (empty ($carros)) {
            ?>
            <section>
                <p>Não há veículos cadastrados.</p>
            </section>
            <?php
        }
        foreach ($carros as $carro) {
            ?>
            <section style=" background-color: #e2def7; border-radius: 4px; width:150px; height: 170px; padding: 6px;">
                <p>Marca:
                    <?php echo $carro['marca']; ?>
                </p>
                <p>Modelo:
                    <?php echo $carro['modelo']; ?>
                </p>
                <p>Preco: R$
                    <?php echo $carro['preco']; ?>
                </p>

                <form action="../../Includes/logica_vendedor.php" method="post">
                    <button type="submit" name="editar-carro" value="<?php echo $carro['codveiculo']; ?>"> Editar </button>
                    <button type="submit" name="deletar-carro" value="<?php echo $carro['codveiculo']; ?>"
                        onclick="return confirma_excluir()"> Deletar </button>
                </form>

            </section>
            <br><br>
            <?php
        }
        ?>
    </main>
    <?php require ('../../Includes/componentes/menu_vend.php'); ?>
</body>

</html>
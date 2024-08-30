<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    include_once("../../includes/componentes/cabecalho.php");
    include_once('../../includes/Funcoes/funcoes_veiculo.php');
    include_once("../../includes/conecta.php");
    $carros = listarCarro($conexao);
    ?>
    <title>Listar Veículos</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>
    <?php require('../../Includes/componentes/menu_vend.php'); ?>
    <main id="main">
        <?php
        if (empty($carros)) {
        ?>
            <section>
                <p>Não há veículos cadastrados.</p>
            </section>
            <?php
        } else {
            foreach ($carros as $carro) {
            ?>
                <section class="cd-sec">
                    <div class="card">
                        <div class="card-img"></div>
                        <div class="card-info">
                            <p class="text-title">
                                <?php echo $carro['marca']; ?>
                            </p>
                            <p class="text-body">
                                <?php echo $carro['modelo']; ?>
                            </p>
                        </div>
                        <div class="card-footer" style="justify-content:center;">
                            <span class="text-title">R$
                                <?php echo $carro['preco']; ?>
                            </span>
                        </div>
                    </div>
                </section>
        <?php
            }
        }
        ?>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
<?php
include_once("../../includes/componentes/cabecalho.php");
include_once('../../includes/Funcoes/funcoes_vendedor.php');
include_once("../../includes/conecta.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../Styles/pages.css">
    <title>Listar Vendedores</title>
</head>

<body>
    <?php require('../../includes/componentes/menu_vend.php'); ?>
    <main>
        <h3> Listagem dos Vendedores </h3>
        <?php
        $pessoas = listarVendedor($conexao);
        if (empty($pessoas)) {
        ?>
            <section>
                <p>Não há Vendedores cadastrados.</p>
            </section>
        <?php
        }
        ?>
        <div class="row">
            <?php
            foreach ($pessoas as $pessoa) {
            ?>
                <div class="col s12 m6 l4">
                    <section class="card medium hoverable">
                        <div class="card-image">
                            <img src="../../uploads/<?php echo $pessoa['image']; ?>" alt="Foto Vendedor">
                            <span class="card-title" style="color:black;"><?php echo $pessoa['nome']; ?></span>
                        </div>
                        <div class="card-content">
                            <p>Email:
                                <?php echo $pessoa['email']; ?>
                            </p>
                            <p>CPF:
                                <?php echo $pessoa['cpf']; ?>
                            </p>
                        </div>
                    </section>
                </div>
            <?php
            }
            ?>
        </div>
    </main>

    <a href="./listarCarros-adm.php">
        <p>Voltar</p>
    </a>
</body>

</html>
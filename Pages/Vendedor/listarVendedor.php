<?php
include_once("../../includes/componentes/cabecalho.php");
include_once('../../includes/Funcoes/funcoes_vendedor.php');
include_once("../../includes/conecta.php");

if (!isset($_SESSION['pessoas'])) {
    header('location: ../../includes/logica/controller.php?listarVend');
    exit();
}
$pessoas = $_SESSION['pessoas'];

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
        <a href="./listarCarros-vend.php" class="btn-flat">
            <p>Voltar</p>
        </a>
        <?php
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
                <div class="col s12 m6 l3">
                    <div class="card medium hoverable" style="width:auto;">
                        <div class="card-image">
                            <img src="../../uploads/<?php echo $pessoa['image']; ?>" alt="Foto Vendedor">
                        </div>
                        <div class="card-content">
                            <span class="card-title" style="color:black;"><?php echo $pessoa['nome']; ?></span>
                            <p>Email:
                                <?php echo $pessoa['email']; ?>
                            </p>
                            <p>CPF:
                                <?php echo $pessoa['cpf']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </main>


</body>

</html>
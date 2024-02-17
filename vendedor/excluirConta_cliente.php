<!DOCTYPE html>
<html>

<head>
    <?php
    include_once('../includes/componentes/cabecalho.php');
    include_once('../includes/logica/funcoes_pessoa.php');
    include_once('../includes/logica/conecta.php');
    ?>
    <title>Listar Usuários</title>
</head>

<body>

    <main>
        <h2> Usuário Logado:
            <?php echo $_SESSION['nome']; ?>
        </h2>
        <h3> Listagem de Usuários </h3>
        <?php
        $pessoas = listarCliente($conexao);
        if (empty($pessoas)) {
            ?>
            <section>
                <p>Não há usuários cadastrados.</p>
            </section>
            <?php
        }
        foreach ($pessoas as $pessoa) {
            ?>
            <section style=" background-color: #e2def7; border-radius: 4px; width:160px; height: 150px; padding: 6px;">
                <p>Nome:
                    <?php echo $pessoa['nome']; ?>
                </p>
                <p>Email
                    <?php echo $pessoa['email']; ?>
                </p>

                <form action="../includes/logica/logica_pessoa.php" method="post">
                    <button type="submit" name="deletar" value="<?php echo $pessoa['codcliente']; ?>"
                        onclick="return confirma_excluir()"> Deletar </button>
                </form>

            </section>
            <br><br>
            <?php
        }
        ?>
    </main>
    <?php require('../includes/componentes/footer_vend.php'); ?>
    <a href="../vendedor/listarCarros-adm.php">
        <p>Voltar</p>
    </a>
</body>
<script type="text/javascript">
    function confirma_excluir() {
        resp = confirm("Confirma Exclusão?")

        if (resp == true) {

            return true;
        }
        else {
            return false;

        }

    }

</script>

</html>
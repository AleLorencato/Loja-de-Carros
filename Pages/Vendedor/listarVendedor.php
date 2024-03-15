<!DOCTYPE html>
<html>

<head>
    <?php
    include_once ("../../Includes/componentes/cabecalho.php");
    include_once ('../../Includes/Funcoes/funcoes_vendedor.php');
    include_once ("../../Includes/conecta.php");
    ?>
    <title>Listar Vendedores</title>
</head>

<body>

    <main>
        <h2> Usuário Logado:
            <?php echo $_SESSION['nome']; ?>
        </h2>
        <h3> Listagem dos Vendedores </h3>
        <?php
        $pessoas = listarVendedor($conexao);
        if (empty ($pessoas)) {
            ?>
            <section>
                <p>Não há Vendedores cadastrados.</p>
            </section>
            <?php
        }
        foreach ($pessoas as $pessoa) {
            ?>
            <section style=" background-color: #e2def7; border-radius: 4px; width:150px; height: 170px; padding: 6px;">
                <p>Nome:
                    <?php echo $pessoa['nome']; ?>
                </p>
                <p>Email:
                    <?php echo $pessoa['email']; ?>
                </p>
                <p>CPF:
                    <?php echo $pessoa['cpf']; ?>
                </p>

            </section>
            <br><br>
            <?php
        }
        ?>
    </main>
    <?php require ('../../Includes/componentes/menu_vend.php'); ?>
    <a href="./listarCarros-adm.php">
        <p>Voltar</p>
    </a>
</body>

</html>
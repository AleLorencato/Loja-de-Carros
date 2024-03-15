<!DOCTYPE html>
<html>

<head>
    <?php
    include_once("../../Includes/componentes/cabecalho.php");
    include_once("../../Includes/Funcoes/funcoes_cliente.php");
    include_once("../../Includes/conecta.php");
    ?>
    <title>Listar Usuário</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>
    <!-- Página não está sendo utilizada no momento -->
    <!-- Página não está sendo utilizada no momento -->
    <!-- Página não está sendo utilizada no momento -->
    <!-- Página não está sendo utilizada no momento -->
    <!-- Página não está sendo utilizada no momento -->
    <!-- Página não está sendo utilizada no momento -->
    <!-- Página não está sendo utilizada no momento -->
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
            <section>
                <p>Nome:
                    <?php echo $pessoa['nome']; ?>
                </p>
                <p>Email
                    <?php echo $pessoa['email']; ?>
                </p>
                <p>CPF:
                    <?php echo $pessoa['cpf']; ?>
                </p>
                <p>Imagem: <img src="imagens/<?php echo $pessoa['imagem']; ?>" width='100px' height='100px' /></p>

                <form action="../../Includes/logica/logica_cliente.php" method="post">
                    <button type="submit" name="editar" value="<?php echo $pessoa['codpessoa']; ?>"> Editar </button>
                    <button type="submit" name="deletar" value="<?php echo $pessoa['codpessoa']; ?>"
                        onclick="return confirma_excluir()"> Deletar </button>
                </form>
                <br><br>
            </section>
            <?php
        }
        ?>
    </main>
    <?php require('../Includes/componentes/footer_comp'); ?>
</body>


</html>
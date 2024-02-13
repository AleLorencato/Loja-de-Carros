<!DOCTYPE html>
<html>

<?php
include_once('../componentes/cabecalho.php');
include_once('./funcoes_pessoa.php');
include_once('./conecta.php');
?>
   <title>Listar Usuário</title>
</head>
<body>  
<body>

<main>
         <h3> Usuário: </h3>
                    <p>Nome: <?php echo $pessoa['nome']; ?></p>
                    <p>Email: <?php echo $pessoa['email']; ?></p>
                    <form action="logica_pessoa.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $pessoa['codcliente']; ?>"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $pessoa['codcliente']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                    </form>
                   <a href="../../vendedor/listarCarros-adm.php">Voltar</a>
</main>
</html>
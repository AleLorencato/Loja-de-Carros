<!DOCTYPE html>
<html>

<?php
include_once('../includes/componentes/cabecalho.php');
include_once('../includes/logica/funcoes_pessoa.php');
include_once('../includes/logica/conecta.php');
?>
   <title>Listar Usuário</title>
</head>
<body>  
<body>

<main>
         <h2> Usuário Logado:  <?php echo $_SESSION['nome']; ?>  </h2>
         <h3> Listagem de Usuários </h3>
    <?php
        $pessoas = listarCliente($conexao);
        if(empty($pessoas)){
            ?>
                <section>
                    <p>Não há usuários cadastrados.</p>
                </section>
            <?php
        }
        foreach($pessoas as $pessoa){
            ?>
                <section>
                    <p>Nome: <?php echo $pessoa['nome']; ?></p>
                    <p>Email <?php echo $pessoa['email']; ?></p>
                    <p>CPF: <?php echo $pessoa['cpf']; ?></p>
                    <p>Imagem: <img src="imagens/<?php echo $pessoa['imagem'];?>" width='100px' height='100px'/></p>
                    
                    <form action="../includes/logica/logica_pessoa.php" method="post">
                        <button type="submit" name="editar" value="<?php echo $pessoa['codpessoa']; ?>"> Editar </button>
                        <button type="submit" name="deletar" value="<?php echo $pessoa['codpessoa']; ?>" onclick = "return confirma_excluir()"> Deletar </button> 
                    </form>
                    <br><br>                                                          
                </section>
            <?php
        }
    ?>
</main>
<?php require('../includes/componentes/footer_comp');?>
</body>
<script type="text/javascript">
    function confirma_excluir()
    {
        resp=confirm("Confirma Exclusão?")

        if (resp==true)
        {

            return true;
        }
        else
        {
            return false;

        }

    }

</script>
</html>
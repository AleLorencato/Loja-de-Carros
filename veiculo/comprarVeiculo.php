<!DOCTYPE html>
<html>

<?php
include_once('../includes/componentes/cabecalho.php');
include_once('../includes/logica/funcoes_pessoa.php');
include_once('../includes/logica/conecta.php');
?>
   <title>Comprar Veículo</title>
</head>
<body>  

<main>
         <h2> Usuário Logado:  <?php echo $_SESSION['nome']; ?>  </h2>
    <?php
        $carros = listarCarro($conexao);
        if(empty($carros)){
            ?>
                <section>
                    <p>Não há veículos cadastrados.</p>
                </section>
            <?php
        }
        foreach($carros as $carro){
            ?>
                <section style=" background-color: #e2def7; border-radius: 4px; width:150px; height: 170px; padding: 6px;">
                    <p>Marca: <?php echo $carro['marca']; ?></p>
                    <p>Modelo: <?php echo $carro['modelo']; ?></p>
                    <p>Preco: R$<?php echo $carro['preco']; ?></p>
                    
                    <form action="../includes/logica/logica_pessoa.php" method="post">
                        <button type="submit" name="comprar" value="<?php echo $carro['codveiculo']; ?>"> Comprar </button>
                    </form>
                                                                           
                </section>
                <br><br>   
            <?php
        }
    ?>
</main>
<?php require('../includes/componentes/footer_comp.php');?>
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
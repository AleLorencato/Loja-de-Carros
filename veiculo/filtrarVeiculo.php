<!DOCTYPE html>
<html>

<?php
include_once('../componentes/cabecalho.php');
include_once('funcoes_pessoa.php');
include_once('conecta.php');
include_once('logica_pessoa.php');
?>
   <title>Listar Veículos</title>
</head>
<body>  

<main>
         <h2> Usuário Logado:  <?php echo $_SESSION['nome']; ?>  </h2>
         <h3> Listagem de Veículos </h3>
    <?php
    // $carros = listarCarro($conexao);
        if(empty($carros)){
            ?>
                <section>
                    <p>Não há veículos cadastrados.</p>
                </section>
            <?php
        }
        foreach($carros as $carro){
            ?>
                <section>
                    <p>Marca: <?php echo $carro['marca']; ?></p>
                    <p>Modelo: <?php echo $carro['modelo']; ?></p>
                    <p>Preco: <?php echo $carro['preco']; ?></p>
                    
                    <br><br>                                                          
                </section>
            <?php
        }
    ?>
</main>
<?php require('..\componentes\footer_comp.php');?>
<a href="../../comprador/listarCarros.php"><p>Voltar</p></a>
</body>

</html>
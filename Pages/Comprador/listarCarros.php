<?php
include_once("../../includes/componentes/cabecalho.php");
include_once("../../includes/conecta.php");
include_once("../../includes/Funcoes/funcoes_cliente.php");
include_once("../../includes/Funcoes/funcoes_veiculo.php");

if (!isset($_SESSION['pessoa']) || !isset($_SESSION['carros'])) {
    header('Location: ../../includes/logica/controller.php?listarCarros');
    exit();
}

$pessoa = $_SESSION['pessoa'];
$carros = $_SESSION['carros'];
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Listar Veículos</title>
    <link rel="stylesheet" href="../../Styles/pages.css">
</head>

<body>

    <ul id="slide-out" class="sidenav" aria-label="Menu de navegação">
        <li>
            <div class="user-view">
                <div class="background">
                    <img src="../../uploads/Fundo-filtro.jpg" alt="Imagem de fundo">
                </div>
                <a href="#user"><img class="circle" src="../../uploads/<?php echo $pessoa['image']; ?>"
                        alt="Foto de perfil do usuário"></a>
            </div>
        </li>
        <li><a href="#!" aria-label="Filtros"><i class="material-icons" aria-hidden="true">filter_list</i>Filtros</a>
        </li>
        <li>
            <div class="divider" role="separator"></div>
        </li>
        <li>
            <form action="../../includes/logica/controller.php?listarCarros" method="post"
                aria-label="Formulário de filtro de preço">
                <div class="input-field">
                    <input type="number" name="preco-min" id="preco-min" aria-labelledby="label-preco-min">
                    <label for="preco-min" id="label-preco-min">Preço Mínimo</label>
                </div>
                <div class="input-field">
                    <input type="number" name="preco-max" id="preco-max" aria-labelledby="label-preco-max">
                    <label for="preco-max" id="label-preco-max">Preço Máximo</label>
                </div>
                <button type="submit" class="btn indigo lighten-1 valign-wrapper" name="filtrar"
                    aria-label="Filtrar veículos por preço">Filtrar</button>
            </form>
        </li>
    </ul>

    <?php require("../../Includes/componentes/menu.php"); ?>
    <main id="main" tabindex="-1">
        <?php
        if (empty($carros)) {
            ?>
            <section>
                <p class="valign-wrapper">Não há veículos cadastrados.</p>
            </section>
            <?php
        } else {
            foreach ($carros as $carro) {
                ?>
                <section class="cd-sec">
                    <div class="card" role="region" aria-labelledby="carro-<?php echo $carro['codveiculo']; ?>">
                        <div class="card-img grey" aria-hidden="true"></div>
                        <div class="card-info">
                            <p class="text-title" id="carro-<?php echo $carro['codveiculo']; ?>">
                                <?php echo $carro['marca']; ?>
                            </p>
                            <p class="text-body">
                                <?php echo $carro['modelo']; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <span class="text-title">R$
                                <?php echo $carro['preco']; ?>
                            </span>
                            <span>
                                <form action="../../Includes/logica/logica_veiculo.php" method="post">
                                    <button type="submit" class="card-button" name="comprar"
                                        value="<?php echo $carro['codveiculo']; ?>"
                                        aria-label="Comprar <?php echo $carro['marca'] . ' ' . $carro['modelo']; ?>">
                                        <svg class="svg-icon" viewBox="0 0 20 20" aria-hidden="true">
                                            <path
                                                d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z">
                                            </path>
                                            <path
                                                d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z">
                                            </path>
                                            <path
                                                d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </span>
                        </div>
                    </div>
                </section>
                <?php
            }
        }
        ?>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
<header id='header'>
    <nav id='menu'>
        <ul id='listaMenu'>

            <li class="right"><a href="../../Pages/Vendedor/mostraPerfilVend.php" class="icon-link">
                    <i class="material-icons">account_circle</i>
                </a>
            </li>

            <li><a href="../../Pages/Veiculo/adicionar_veiculo.php">Adicionar Veículo</a></li>
            <li><a href="../../Pages/Vendedor/listarVendedor.php">Ver Vendedores da Loja</a></li>

            <li>
                <form action="../../includes/logica/logica_vendedor.php" method="post">
                    <button type="submit" name="sair" style="background:none;border:none;padding:0;margin:0;color:inherit;cursor:pointer;height:100%;align-items:center;">
                        <a style="height:100%;" class="valign-wrapper">Sair</a>
                    </button>
                </form>
            </li>

            <li class="right" style="margin-right:1rem;">
                <h3>Olá, <?php echo $_SESSION['nome']; ?> </h3>
            </li>

        </ul>
    </nav>
</header>
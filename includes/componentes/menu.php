<header id='header'>
    <nav id='menu' class="nav-wrapper indigo">
        <ul id='listaMenu'>
            <li> <a href="#" data-target="slide-out" class="sidenav-trigger">Filtros</a></li>
            <li class="right"><a href="../../Pages/Comprador/mostraPessoa.php" class="icon-link">
                    <i class="material-icons">account_circle</i>
                </a>
            </li>
            <li>
                <form action=" ../../includes/logica/logica_cliente.php" method="post">
                    <button type="submit" name="sair"
                        style="background:none;border:none;padding:0;margin:0;color:inherit;cursor:pointer;height:100%;align-items:center;">
                        <a style="height:100%;" class="valign-wrapper">Sair</a>
                    </button>
                </form>
            </li>
            <li class="right hide-on-small-only" style="margin-right:1rem; ">
                <h3 style="color:white;">Olá, <?php echo $_SESSION['nome']; ?> </h3>
            </li>


        </ul>
    </nav>
</header>
<link rel="stylesheet" href="../../style.css">
<?php
require_once('conecta.php');
require_once('funcoes_pessoa.php');
#CADASTRO PESSOA
if (isset($_POST['cadastrar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $senha);
    inserirCliente($conexao, $array);
    $array = array($email, $senha);
    $pessoa = acessarCliente($conexao, $array);
    session_start();
    $_SESSION['logado'] = true;
    $_SESSION['cod_pessoa'] = $pessoa['codcliente'];
    $_SESSION['nome'] = $pessoa['nome'];
    header('location:../../comprador/listarCarros.php');
}

#ENTRAR
if (isset($_POST['entrar'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email, $senha);
    $pessoa = acessarCliente($conexao, $array);

    if ($pessoa) {
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['cod_pessoa'] = $pessoa['codcliente'];
        $_SESSION['nome'] = $pessoa['nome'];
        header('location:../../comprador/listarCarros.php');
    } else {
        header('location:../../login.php');
    }
}

#SAIR
if (isset($_POST['sair'])) {
    session_start();
    session_destroy();
    header('location:../../login.php');
}

#EDITAR PESSOA
if (isset($_POST['editar'])) {

    $codpessoa = $_POST['editar'];
    $array = array($codpessoa);
    $pessoa = buscarCliente($conexao, $array);
    require_once('../../comprador/alterarPessoa.php');
}
if (isset($_POST['editar2'])) {
    $codpessoa = $_POST['editar2'];
    $array = array($codpessoa);
    $pessoa = buscarCliente($conexao, $array);
    require_once('../../comprador/alterarPerfil.php');
}


#Pesquisa
if (isset($_POST['pesquisa'])) {
    $email = $_POST['email-pesquisa'];
    $array = array('%' . $email . '%');
    $pessoa = buscarClienteEmail($conexao, $array);
    if ($pessoa != false) {
        require_once('../../comprador/mostraPessoa.php');
    }
}

#ALTERAR PERFIL
if (isset($_POST['alterar'])) {

    $codpessoa = $_POST['codcliente'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $senha, $codpessoa);
    alterarCliente($conexao, $array);
    $_SESSION['nome'] = $array['nome'];
    $_SESSION['email'] = $email;
    if ($adm == 1) {
        header('Location:../../vendedor/listarCarros-adm.php');
    } else {
        header('Location:../../comprador/listarCarros.php');
    }

}

#DELETAR PESSOA
if (isset($_POST['deletar'])) {
    $codpessoa = $_POST['deletar'];
    $array = array($codpessoa);
    deletarCliente($conexao, $array);
    session_start();
    if ($_SESSION['adm'] == true) {
        header('Location:../../vendedor/listarCarros-adm.php');
    } else {
        header('Location:../../comprador/listarCarros.php');
    }

}
if (isset($_POST['deletar-conta'])) {
    $codpessoa = $_POST['deletar-conta'];
    $array = array($codpessoa);
    deletarCliente($conexao, $array);
    session_start();
    session_destroy();
    header('location:../../login.php');
}

#-------------------ADMINISTRADOR------------------------------
if (isset($_POST['cadastrar-adm'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $cpf, $senha);
    inserirVendedor($conexao, $array);
    $array = array($email, $senha);
    $pessoa = acessarVendedor($conexao, $array);
    session_start();
    $_SESSION['adm'] = true;
    $_SESSION['logado'] = true;
    $_SESSION['cod_pessoa'] = $pessoa['codvendedor'];
    $_SESSION['nome'] = $pessoa['nome'];
    header('location:../../vendedor/listarCarros-adm.php');
}

if (isset($_POST['entrar-adm'])) {

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $array = array($email, $senha);
    $pessoa = acessarVendedor($conexao, $array);

    if ($pessoa) {
        session_start();
        $_SESSION['adm'] = true;
        $_SESSION['logado'] = true;
        $_SESSION['cod_pessoa'] = $pessoa['codvendedor'];
        $_SESSION['nome'] = $pessoa['nome'];
        header('location:../../vendedor/listarCarros-adm.php');
    } else {
        header('location:../../login-adm.php');
    }
}

if (isset($_POST['alterar-vendedor'])) {
    $codpessoa = $_POST['codvendedor'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $array = array($nome, $email, $cpf, $senha, $codpessoa);
    alterarVendedor($conexao, $array);
    header('Location:../../vendedor/listarCarros-adm.php');
}

#-------------------Veículo----------------------#

if (isset($_POST['editar-carro'])) {

    $codveiculo = $_POST['editar-carro'];
    $array = array($codveiculo);
    $carro = buscarVeiculo($conexao, $array);
    require_once('../../veiculo/alterarVeiculo.php');
}

if (isset($_POST['alterar-veiculo'])) {

    $codveiculo = $_POST['codveiculo'];
    $preco = $_POST['preco'];
    $array = array($preco, $codveiculo);
    alterarVeiculo($conexao, $array);
    header('location:../../vendedor/listarCarros-adm.php');
}

if (isset($_POST['comprar'])) {
    $codveiculo = $_POST['comprar'];
    $array = array($codveiculo);
    deletarVeiculo($conexao, $array);

    header('location:../../comprador/listarCarros.php');
}

if (isset($_POST['anunciar'])) {
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $preco = $_POST['preco'];
    $array = array($marca, $modelo, $preco);
    anunciarVeiculo($conexao, $array);
    header('location:../../vendedor/listarCarros-adm.php');
}

if (isset($_POST['filtrar'])) {
    $preco_max = $_POST['preco-max'];
    $preco_min = $_POST['preco-min'];
    $array = array($preco_min, $preco_max);
    $carros = filtrarVeiculo($conexao, $array);
    if ($carros != false) {
        require_once('../../veiculo/filtrarVeiculo.php');
    }
}
if (isset($_POST['deletar-carro'])) {
    $codveiculo = $_POST['deletar-carro'];
    $array = array($codveiculo);
    deletarVeiculo($conexao, $array);
    header('Location:../../vendedor/listarCarros-adm.php');
}



?>
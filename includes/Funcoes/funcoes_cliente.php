<?php
require_once 'query.php';
function inserirCliente($conexao, $array)
{
  $query = "insert into cliente (nome, email, senha, image) values (?, ?, ?, ?)";
  return queryexecute($conexao, $query, $array);
}

function alterarCliente($conexao, $array)
{
  $query = "update cliente set nome= ?, email = ?, senha= ?, image = ? where codcliente = ?";
  return queryexecute($conexao, $query, $array);
}

function deletarCliente($conexao, $array)
{
  $query = "delete from cliente where codcliente = ?";
  return queryexecute($conexao, $query, $array);
}

function buscarClienteEmail($conexao, $array)
{
  $query = "select * from cliente where email like ?";
  return queryFetch($conexao, $query, $array);
}

function buscarCliente($conexao, $array)
{
  $query = "select * from cliente where codcliente=?";
  return queryFetch($conexao, $query, $array);
}

function acessarCliente($conexao, $array)
{
  $query = "select * from cliente where email=? and senha=?";
  return queryFetch($conexao, $query, $array);
}


function listarCliente($conexao)
{
  $query = "select * from cliente";
  return queryAll($conexao, $query);
}

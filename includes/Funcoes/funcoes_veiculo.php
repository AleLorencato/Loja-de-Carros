<?php
require_once 'query.php';
function listarCarro($conexao)
{
  $query = "select * from veiculo";
  return queryAll($conexao, $query);
}

function buscarVeiculo($conexao, $array)
{
  $query = "select * from veiculo where codveiculo=?";
  return queryexecute($conexao, $query, $array);
}

function alterarVeiculo($conexao, $array)
{
  $query = "update veiculo set preco= ? where codveiculo = ?";
  return queryexecute($conexao, $query, $array);
}

function deletarVeiculo($conexao, $array)
{
  $query = "delete from veiculo where codveiculo = ?";
  return queryexecute($conexao, $query, $array);
}

function anunciarVeiculo($conexao, $array)
{
  $query = "insert into veiculo (marca, modelo, preco) values (?, ?, ?)";
  return queryexecute($conexao, $query, $array);
}

function filtrarVeiculo($conexao, $array)
{
  $query = "select * from veiculo where preco between ? and ?";
  return queryAll($conexao, $query, $array);
}
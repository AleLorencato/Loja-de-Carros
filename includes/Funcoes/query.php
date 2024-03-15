<?php
function queryExecute($conexao, $query, $array)
{
  try {
    $stmt = $conexao->prepare($query);
    $resultado = $stmt->execute($array);
    return $resultado;
  } catch (PDOException $e) {
    error_log($e->getMessage());
    throw $e;
  }
}

function queryFetch($conexao, $query, $array)
{
  try {
    $stmt = $conexao->prepare($query);
    if ($stmt->execute($array)) {
      $resultado = $stmt->fetch();
      return $resultado;
    } else {
      return false;
    }
  } catch (PDOException $e) {

    error_log($e->getMessage());
    throw $e;
  }
}

function queryAll($conexao, $query, $array = null)
{
  try {
    $stmt = $conexao->prepare($query);
    if ($stmt->execute($array)) {
      $resultado = $stmt->fetchAll();
      return $resultado;
    } else {
      return false;
    }
  } catch (PDOException $e) {
    error_log($e->getMessage());
    throw $e;
  }
}
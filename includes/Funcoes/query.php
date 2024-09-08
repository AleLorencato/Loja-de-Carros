<?php

require_once '../../includes/conecta.php';

class Query
{
  public static function execute($conn, $query, $params)
  {
    try {
      $stmt = $conn->prepare($query);
      return $stmt->execute($params);
    } catch (PDOException $e) {
      error_log($e->getMessage());
      throw $e;
    }
  }

  public static function fetch($conn, $query, $params)
  {
    try {
      $stmt = $conn->prepare($query);
      if ($stmt->execute($params)) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log($e->getMessage());
      throw $e;
    }
  }

  public static function fetchAll($conn, $query, $params = null)
  {
    try {
      $stmt = $conn->prepare($query);
      if ($stmt->execute($params)) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
      } else {
        return false;
      }
    } catch (PDOException $e) {
      error_log($e->getMessage());
      throw $e;
    }
  }
}
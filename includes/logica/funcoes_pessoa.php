<?php
    function inserirCliente($conexao,$array){ 
       try {
            $query = $conexao->prepare("insert into cliente (nome, email, senha) values (?, ?, ?)");
            $resultado = $query->execute($array);
            
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }


    function alterarCliente($conexao, $array){
        try {
            $query = $conexao->prepare("update cliente set nome= ?, email = ?, senha= ? where codcliente = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function alterarPerfil($conexao, $array){
        try {
            $query = $conexao->prepare("update cliente set nome= ?, senha= ? where codcliente = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    function deletarCliente($conexao, $array){
        try {
            $query = $conexao->prepare("delete from cliente where codcliente = ?");
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
 
    function listarCliente($conexao){
      try {
        $query = $conexao->prepare("SELECT * FROM cliente");      
        $query->execute();
        $pessoas = $query->fetchAll();
        return $pessoas;
      }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  

    }
    

     function buscarCliente($conexao,$array){
        try {
        $query = $conexao->prepare("select * from cliente where codcliente=?");
        if($query->execute($array)){
            $pessoa = $query->fetch(); //coloca os dados num array $usuario
            return $pessoa;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }
    
   
    function buscarClienteEmail($conexao,$array){
        
        try {
        $query = $conexao->prepare("select * from cliente where email like ?");
        if($query->execute($array)){
            $pessoa = $query->fetch();
            return $pessoa;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function acessarCliente($conexao,$array){
        try {
        $query = $conexao->prepare("select * from cliente where email=? and senha=?");
        if($query->execute($array)){
            $pessoa = $query->fetch(); 
          if ($pessoa)
            {  
                return $pessoa;
            }
        else
            {
                return false;
            }
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    #------------------------FUNCOES VEICULO-----------------------------#

    function listarCarro($conexao){
        try {
          $query = $conexao->prepare("SELECT * FROM veiculo");      
          $query->execute();
          $carros = $query->fetchAll();
          return $carros;
        }catch(PDOException $e) {
              echo 'Error: ' . $e->getMessage();
        }  
  
      }
      function buscarVeiculo($conexao,$array){
        try {
        $query = $conexao->prepare("select * from veiculo where codveiculo=?");
        if($query->execute($array)){
            $carro = $query->fetch();
            return $carro;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

    function alterarVeiculo($conexao, $array){
        try {
            $query = $conexao->prepare("update veiculo set preco= ? where codveiculo = ?");
            $resultado = $query->execute($array);   
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deletarVeiculo($conexao, $array){
        try {
            $query = $conexao->prepare("delete from veiculo where codveiculo = ?");
            $resultado = $query->execute($array);   
             return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function anunciarVeiculo($conexao, $array){
        try {
            $query = $conexao->prepare("insert into veiculo (marca, modelo, preco) values (?, ?, ?)");
            $resultado = $query->execute($array);
            return $resultado;
        }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function filtrarVeiculo($conexao, $array){
        try {
        $query = $conexao->prepare("select * from veiculo where preco between ? and ? ");
        if($query->execute($array)){
            $carros = $query->fetchAll();
            return $carros;
        }
        else{
            return false;
        }
         }catch(PDOException $e) {
            echo 'Error: ' . $e->getMessage();
      }  
    }

#-----------------------------Administrador---------------------------------------#

function inserirVendedor($conexao,$array){
    try {
         $query = $conexao->prepare("insert into vendedor (nome, email, cpf, senha) values (?, ?, ?, ?)");
         $resultado = $query->execute($array);
         return $resultado;
     }catch(PDOException $e) {
         echo 'Error: ' . $e->getMessage();
     }

 }


function buscarVend($conexao,$array){
    try {
    $query = $conexao->prepare("select * from vendedor where codvendedor=?");
    if($query->execute($array)){
        $pessoa = $query->fetch(); 
        return $pessoa;
    }
    else{
        return false;
    }
     }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
  }  
}

function acessarVendedor($conexao,$array){
    try {
    $query = $conexao->prepare("select * from vendedor where email=? and senha=?");
    if($query->execute($array)){
        $pessoa = $query->fetch(); 
      if ($pessoa)
        {  
            return $pessoa;
        }
    else
        {
            return false;
        }
    }
    else{
        return false;
    }
     }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
  }  
}

function listarVendedor($conexao){
    try {
      $query = $conexao->prepare("SELECT * FROM vendedor");      
      $query->execute();
      $pessoas = $query->fetchAll();
      return $pessoas;
    }catch(PDOException $e) {
          echo 'Error: ' . $e->getMessage();
    }  

  }

  function alterarVendedor($conexao, $array){
    try {
        $query = $conexao->prepare("update vendedor set nome= ?, email = ?, cpf = ?, senha= ? where codvendedor = ?");
        $resultado = $query->execute($array);   
        return $resultado;
    }catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
   ?>
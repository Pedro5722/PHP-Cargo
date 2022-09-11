<?php
  require 'config.php';

    $nome = filter_input(INPUT_POST, 'nome');
    $nome = strtoupper($nome);
    $tipo = filter_input(INPUT_POST, 'tipo');
    $tipo = strtoupper($tipo);
    
    if($nome && $tipo){

      $sql = $pdo->prepare("SELECT * FROM cargo WHERE NOME_CARGO = :nome AND FK_TIPO_CARGO = :tipo");
      $sql->bindValue(":nome", $nome);
      $sql->bindValue(":tipo", $tipo);
      $sql->execute();
  
      if($sql->rowCount() === 0){
        
        $sql = $pdo->prepare("INSERT INTO cargo (NOME_CARGO, FK_TIPO_CARGO ) VALUES (:nome, :tipo)");
        $sql->bindValue(":nome", $nome);
        $sql->bindValue(":tipo", $tipo);
        $sql->execute();
        header("location: blank.php");
        exit;
      }else{
        header("location: blank.php");
      } 
    }else{
      header("location: blank.php");
      exit;
    }


?>
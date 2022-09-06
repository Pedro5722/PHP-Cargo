<?php
  require 'config.php';

  $id = filter_input(INPUT_POST, 'id');
  $nome = filter_input(INPUT_POST, 'nome');
  $tipo = filter_input(INPUT_POST, 'tipo');

  if($nome && $tipo){
    $sql = $pdo->prepare("UPDATE cargo SET NOME_CARGO = :nome, TIPO_CARGO = :tipo WHERE ID_CARGO = :id");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':tipo', $tipo);
    $sql->bindValue(':id', $id);
    $sql->execute();
    header('location: blank.php');
    exit;
  }
?>
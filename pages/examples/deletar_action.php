<?php

  require 'config.php';

  $id = filter_input(INPUT_POST, 'id');

  $sql = $pdo->prepare('DELETE FROM cargo WHERE ID_CARGO = :id');
  $sql->bindValue(':id', $id);
  $sql->execute();
  header('location: blank.php');
  exit;

?>

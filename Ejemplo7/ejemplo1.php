<?php
  try {
    $pdo= new PDO('mysql:host=localhost;dbname=biblioteca','root','');
  } catch(PDOException $e) {
    echo 'Error al conectarse con la base de datos:' . $e->getMessage();
    exit;
  }

 ?>

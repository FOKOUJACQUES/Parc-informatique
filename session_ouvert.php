<?php
    require_once "connection.php";
    $host = "localhost";
    $dbname = "projet";
    $username = "root";
    $password = "";
    
    $database = new Connectionbd($host, $dbname, $username, $password);
    $database->connect();
    $bdd = $database->getConnection();

  // Vérifie si l'utilisateur est connecté sinon on le renvoie vers la page de connection
  if(!isset($_SESSION['user']['id_clt'])){
    header("Location: index.php");
    exit();
  }
?> 
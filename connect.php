<?php 
try{
    $bdd = New PDO ("mysql:host=localhost; dbname=projet; charset=utf8", "root", "");
    //echo "bien";
} catch(PDOException $e){
    die("Vous n'êtes pas connecté à la base de données " . $e->getMessage());
}
?>
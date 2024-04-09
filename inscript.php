<?php
    session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();
    
    $nom = htmlspecialchars(filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $prenom  = htmlspecialchars(filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $naissance = htmlspecialchars(filter_var($_POST['date'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $sexe = htmlspecialchars(filter_var($_POST['sexe'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $telephone = htmlspecialchars($_POST['Tel']);
    $Email = htmlspecialchars(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
    $statut = htmlspecialchars(filter_var($_POST['statut'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
   // $statut = htmlspecialchars(filter_var($_POST['configpdw'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $pwd= htmlspecialchars(password_hash($_POST['configpdw'], PASSWORD_DEFAULT));

    if (isset($_POST['Envoi'])) {
    
    echo $nom . " " . $prenom . " " . $naissance. " " . $sexe . " " . $telephone . " " . $Email ." "  . $statut . " " . $pwd;
    $query = $bdd->prepare("INSERT INTO utilisateur (Nom, Prenom, Naissance, Sexe, Telephone, Email, Statut, mot_de_passe) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $query->execute(array($nom, $prenom, $naissance, $sexe, $telephone, $Email, $statut, $pwd));
    
	header('Location: contact.php');
    
}
?>
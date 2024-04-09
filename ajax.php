<?php
require_once "connection.php";
$bdd = $database->getConnection();

$id_etabli = filter_input(INPUT_POST, 'id_etabli', FILTER_SANITIZE_NUMBER_INT);

// Préparez et exécutez la requête pour obtenir les id_service de la table machines
$stmt = $bdd->prepare('SELECT id_service FROM services WHERE id_etabli = ?');
$stmt->execute([$id_etabli]);

$services = array();
while ($row = $stmt->fetch()) {
    // Pour chaque id_service, récupérez le nom du service correspondant dans la table services
    $stmt2 = $bdd->prepare('SELECT nom FROM services WHERE id_service = ?');
    $stmt2->execute([$row["id_service"]]);
    $nom = $stmt2->fetchColumn();

    $services[] = array("id" => $row["id_service"], "name" => $nom);
}
echo json_encode($services);
?>



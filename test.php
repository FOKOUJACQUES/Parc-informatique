<?php 
$id_etabli = $_POST['ecole'];
$id_service = $_POST['service'];
$code_interne = $_POST['code_interne'];
$numero_serie = $_POST['numero_serie'];
$modele = $_POST['modele'];
$type = $_POST['type'];
$marque = $_POST['marque'];
$ram = $_POST['ram'];
$disque_dur = $_POST['disque_dur'];
$date_achat = $_POST['date_achat'];
$cout = $_POST['cout'];
$etat = $_POST['etat'];
$date_de_modification = date('Y-m-d H:i:s'); // Date et heure actuelles
$date_acquisition = $_POST['date_acquisition'];
$processeur = $_POST['processeur'];
$taille_ecran = $_POST['taille_ecran'];

$type_code = $_POST['type_code'];
if ($type_code == 'code_interne') {
    $code_interne = $_POST['code_interne'];
    $numero_serie = "n'existe pas";
} else {
    $code_interne = "n'existe pas";
    $numero_serie = $_POST['numero_serie'];
}

// Gestion des contraintes sur le type de machine
$type = $_POST['type'];
if ($type == 'Ecran') {
    $taille_ecran = $_POST['taille_ecran'];
    $modele = "n'existe pas";
    $disque_dur = "n'existe pas";
    $ram = "n'existe pas";
    $processeur = "n'existe pas";
} else if ($type == 'Unite centrale') {
    $modele = $_POST['modele'];
    $disque_dur = $_POST['disque_dur'];
    $ram = $_POST['ram'];
    $processeur = $_POST['processeur'];
    $taille_ecran = "n'existe pas";
} else {
    $modele = "n'existe pas";
    $disque_dur = "n'existe pas";
    $ram = "n'existe pas";
    $processeur = "n'existe pas";
    $taille_ecran = "n'existe pas";
}

echo "École: $id_etabli<br>";
echo "Service: $id_service<br>";
echo "Code interne: $code_interne<br>";
echo "Numéro de série: $numero_serie<br>";
echo "Modèle: $modele<br>";
echo "Type: $type<br>";
echo "Marque: $marque<br>";
echo "RAM: $ram<br>";
echo "Disque dur: $disque_dur<br>";
echo "Date d'achat: $date_achat<br>";
echo "Coût: $cout<br>";
echo "État: $etat<br>";
echo "Date de modification: $date_de_modification<br>";
echo "Date d'acquisition: $date_acquisition<br>";
echo "Processeur: $processeur<br>";
echo "Taille de l'écran: $taille_ecran<br>";
?>
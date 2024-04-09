<?php
// Connexion à la base de données
session_start();
require_once "connection.php";
$bdd = $database->getConnection();

class Reparation {
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function envoyerMessage($nature_du_probleme, $date_de_signalement, $id_clt){
        $query = $this->pdo->prepare("INSERT INTO reparation (nature_du_probleme, date_de_signalement, id_clt) VALUES (?, ?, ?)");

        $nature_du_probleme = htmlspecialchars($_POST['message']);
        $date_de_signalement = date('Y-m-d H:i:s');
        $query->execute([$nature_du_probleme, $date_de_signalement, $id_clt]);
    }
}

//$id_machine = $_SERVER['REMOTE_ADDR'];
// Préparation de la requête SQL
$id_clt = $_SESSION['user']['id_clt'];

$reparation = new Reparation($bdd);
$reparation->envoyerMessage($nature_du_probleme, $date_de_signalement, $id_clt);

// Redirection vers besoin.php
header('Location: besoin.php');
exit;
?>


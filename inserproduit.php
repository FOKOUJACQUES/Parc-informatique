<?php
    session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();
if (isset($_POST['Envoi'])) {
class User {
    private $pdo;
    private $name;
    private $prix;
    private $reference;
    private $numero;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function setUserData($name, $prix, $reference, $numero) {
        $this->name = htmlspecialchars(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->prix = htmlspecialchars($prix);
        $this->reference = htmlspecialchars(filter_var($reference, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->numero = htmlspecialchars(filter_var($numero, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    }

    public function insertUser() {
        $stmt = $this->pdo->prepare("INSERT INTO article (Nom_produit, Prix, Reference, Numero_serie) VALUES (:name, :prix, :reference, :Numero)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':prix', $this->prix);
        $stmt->bindParam(':reference', $this->reference);
        $stmt->bindParam(':Numero', $this->numero);
        $stmt->execute();
    }
}


    $user = new User($bdd);
    $user->setUserData($_POST['Name'], $_POST['Prix'], $_POST['Reference'], $_POST['Numero']);
    $user->insertUser();

    header('Location: saveproduit.php');
    exit();
}
?>

<?php
    session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();

if (isset($_POST['Envoi'])) {
class User {
    private $pdo;
    private $name;
    private $lastname;
    private $sexe;
    private $departement;
    private $telephone;
    private $poste;
    private $pdw;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    public function setUserData($name, $lastname, $sexe, $departement, $telephone, $poste, $pdw) {
        $this->name = htmlspecialchars(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->lastname = htmlspecialchars(filter_var($lastname, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->sexe = htmlspecialchars(filter_var($sexe, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->departement = htmlspecialchars(filter_var($departement, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->telephone = htmlspecialchars($telephone);
        $this->poste = htmlspecialchars(filter_var($poste, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->pdw = htmlspecialchars(password_hash($pdw, PASSWORD_DEFAULT));
    }
    public function userExists() {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE nom = :name AND prenom = :lastname");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
    public function insertUser() {
        if ($this->userExists()) {
            $_SESSION['error'] = "Ce nom et prénom existent déjà. Veuillez en choisir un autre.";
            // Redirige vers une page demandant à l'utilisateur de choisir un autre nom et prénom
            header('Location: contact.php');
            exit();
        }
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (nom, prenom, sexe, departement, contact, poste, mot_passe) VALUES (:name, :lastname, :sexe, :departement, :telephone, :poste, :pdw)");
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':sexe', $this->sexe);
        $stmt->bindParam(':departement', $this->departement);
        $stmt->bindParam(':telephone', $this->telephone);
        $stmt->bindParam(':poste', $this->poste);
        $stmt->bindParam(':pdw', $this->pdw);
        $stmt->execute();
        header('Location: contact.php');
        exit();
    }
}
    $user = new User($bdd);
    $user->setUserData($_POST['name'], $_POST['lastname'], $_POST['sexe'], $_POST['departement'], $_POST['Tel'], $_POST['poste'], $_POST['pdw']);
    $user->insertUser();
}
?>


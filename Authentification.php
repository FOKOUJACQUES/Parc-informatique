<?php
    session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();

class User {
    private $pdo;
    private $name;
    private $password;

    public function __construct($pdo, $name, $password) {
        $this->pdo = $pdo;
        $this->name = htmlspecialchars(filter_var($name, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $this->password = $password;
    }

    public function login() {
        $stmt = $this->pdo->prepare('SELECT * FROM utilisateurs WHERE nom = ?');
        $stmt->execute(array($this->name));
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch();
            if (password_verify($this->password, $user['mot_passe'])) {
                $_SESSION['user'] = $user;
                header('Location: home.php');
                exit();
            } else {
                $_SESSION['error'] = "Mot de passe incorrect";
                header('Location: index.php');
                exit();
            }
        } else {
            $_SESSION['error'] = "Nom d'utilisateur incorrect";
            header('Location: index.php');
            exit();
        }
    }
    
}

if (isset($_POST['envoi'])) {
    if (!empty($_POST['Nom']) AND !empty($_POST['pwd'])) {
        $password= htmlspecialchars($_POST['pwd']);
        $user = new User($bdd, $_POST['Nom'], $password);
        $user->login();
    }
}
?>
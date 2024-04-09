<?php 
    session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();  
    
    if(isset($_POST['envoi'])){ 
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

    // Gestion des contraintes sur le code interne et le numéro de série
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

        class Machine {
            private $pdo; 
            private $id_etabli; 
            private $id_service;
            private $code_interne;
            private $numero_serie; 
            private $modele;
            private $type;
            private $marque; 
            private $ram;
            private $disque_dur; 
            private $date_achat; 
            private $cout; 
            private $etat;
            private $date_de_modification;
            private $date_acquisition;
            private $processeur; 
            private $taille_ecran;
    
            public function __construct($pdo) {
                $this->pdo = $pdo; 
            }
    
            public function setMachineData($id_etabli, $id_service, $code_interne, $numero_serie, $modele, $type, $marque, $ram, $disque_dur, $date_achat, $cout, $etat, $date_de_modification, $date_acquisition, $processeur, $taille_ecran) {
                $this->id_etabli = htmlspecialchars(filter_var($_POST['ecole'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->id_service = htmlspecialchars(filter_var($_POST['service'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->code_interne = htmlspecialchars(filter_var($_POST['code_interne'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->numero_serie = htmlspecialchars(filter_var($_POST['numero_serie'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->modele = htmlspecialchars(filter_var($_POST['modele'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->type = htmlspecialchars(filter_var($_POST['type'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->marque = htmlspecialchars(filter_var($_POST['marque'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->ram = htmlspecialchars($_POST['ram']);
                $this->disque_dur = htmlspecialchars($_POST['disque_dur']);
                $this->date_achat = htmlspecialchars($_POST['date_achat']);
                $this->cout = htmlspecialchars($_POST['cout']);
                $this->etat = htmlspecialchars($_POST['etat']);
                $this->date_de_modification = htmlspecialchars(date('Y-m-d H:i:s'));
                $this->date_acquisition = htmlspecialchars($_POST['date_acquisition']);
                $this->processeur = htmlspecialchars($_POST['processeur']);
                $this->taille_ecran = htmlspecialchars($_POST['taille_ecran']);
            }
    
            public function insertMachine() {
                try {
                    // Utilisation d'une requête préparée pour prévenir les injections SQL
                    $stmt = $this->pdo->prepare('INSERT INTO machines (id_etabli, id_service, code_interne, numero_de_serie, modele, type, marque, ram, disque_dur, date_d_achat, cout, etat, date_de_modification, date_acquisition, processeur, taille_ecran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                    $stmt->execute([$this->id_etabli, $this->id_service, $this->code_interne, $this->numero_serie, $this->modele, $this->type, $this->marque, $this->ram, $this->disque_dur, $this->date_achat, $this->cout, $this->etat, $this->date_de_modification, $this->date_acquisition, $this->processeur, $this->taille_ecran]);
                    $_SESSION['success'] = "Les informations ont été insérées avec succès.";
                    header('Location: insertpc.php'); 
                    exit();
                } catch (Exception $e) {
                    $_SESSION['error'] = "Une erreur s'est produite lors de l'insertion des informations.";
                    error_log($e->getMessage()); // Enregistrez l'erreur pour le débogage
                    header('Location: insertpc.php'); 
                }
            }
        }
    
        // Création d'une nouvelle instance de la classe Machine
        $machine = new Machine($bdd);
    
        // Passage des données à la méthode setMachineData
        $machine->setMachineData($id_etabli, $id_service, $code_interne, $numero_serie, $modele, $type, $marque, $ram, $disque_dur, $date_achat, $cout, $etat, $date_de_modification, $date_acquisition, $processeur, $taille_ecran);
    
        // Insertion des données dans la base de données
        $machine->insertMachine();
    }
    
    
/*session_start();
    //require_once "connection.php";
    $bdd = $database->getConnection();
if(isset($_POST['envoi'])){ 
// Préparation de la requête
$stmt = $pdo->prepare('INSERT INTO machines (code_interne, numero_de_serie, modele, type, marque, ram, disque_dur, date_d_achat, cout, etat, date_de_modification, date_acquisition, processeur, taille_ecran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

// Exécution de la requête
$stmt->execute([$_POST['code_interne'], $_POST['numero_serie'], $_POST['modele'], $_POST['type'], $_POST['marque'], $_POST['ram'], $_POST['disque_dur'], $_POST['date_achat'], $_POST['cout'], $_POST['etat'], $_POST['code_modification'], $_POST['date_acquisition'], $_POST['processeur'], $_POST['taille_ecran']]);
header('Location: insertpc.php');
} 
session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();
if(isset($_POST['envoi'])){ 
// Préparation de la requête
$stmt = $pdo->prepare('INSERT INTO machines (code_interne, numero_de_serie, modele, type, marque, ram, disque_dur, date_d_achat, cout, etat, date_de_modification, date_acquisition, processeur, taille_ecran) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

// Exécution de la requête
$stmt->execute([$_POST['code_interne'], $_POST['numero_serie'], $_POST['modele'], $_POST['type'], $_POST['marque'], $_POST['ram'], $_POST['disque_dur'], $_POST['date_achat'], $_POST['cout'], $_POST['etat'], $_POST['code_modification'], $_POST['date_acquisition'], $_POST['processeur'], $_POST['taille_ecran']]);
header('Location: insertpc.php');
}*/
?>
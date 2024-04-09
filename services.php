<?php 
    session_start();
    require_once "connection.php";
    $bdd = $database->getConnection();  
     
    if(isset($_POST['seach'])){
    $service = htmlspecialchars($_POST['service']);
        class Machine {
            private $pdo; 
            private $service;
            private $id_etabli; 
    
            public function __construct($pdo) {
                $this->pdo = $pdo; 
            }
    
            public function setMachineData($service, $id_etabli) {
                $this->service = htmlspecialchars(filter_var($_POST['service'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                $this->id_etabli = htmlspecialchars(filter_var($_POST['ecole'], FILTER_SANITIZE_FULL_SPECIAL_CHARS));
                
            }
    
            public function insertMachine() {
                try {
                    // Utilisation d'une requête préparée pour prévenir les injections SQL
                    $stmt = $this->pdo->prepare('INSERT INTO services (nom, id_etabli) VALUES (?, ?)');
                    $stmt->execute([$this->service, $this->id_etabli]);
                    $_SESSION['success'] = "Les informations ont été insérées avec succès.";
                    header('Location: insertservices.php');
                    exit();
                } catch (Exception $e) {
                    $_SESSION['error'] = "Une erreur s'est produite lors de l'insertion des informations.";
                    error_log($e->getMessage()); // Enregistrez l'erreur pour le débogage
                    header('Location: insertservices.php'); 
                }
            }
        }
    
        // Création d'une nouvelle instance de la classe Machine
        $machine = new Machine($bdd);
    
        // Passage des données à la méthode setMachineData
        $machine->setMachineData($service, $id_etabli,);
    
        // Insertion des données dans la base de données
        $machine->insertMachine();
    }
?>
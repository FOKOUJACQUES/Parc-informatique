<?php
class Connectionbd {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            //echo "Vous êtes connecté avec succès.";
        } catch (PDOException $e) {
            die("Vous n'êtes pas connecté à la base de données : " . $e->getMessage());
        }
    }
    public function getConnection() {
        return $this->connection;
    }
    
}
    $host = "localhost";
    $dbname = "projet";
    $username = "root";
    $password = "";

    $database = new Connectionbd($host, $dbname, $username, $password);
     $database->connect();

?>

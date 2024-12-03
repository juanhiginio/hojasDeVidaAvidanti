<?php

class DBconfig {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "dbhojasdevidaav";

    public function getConnection() {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}

// Crear una instancia de conexión y retornarla
$dbconfig = new DBconfig();
return $dbconfig->getConnection();

?>
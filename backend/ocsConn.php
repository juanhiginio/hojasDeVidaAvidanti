<?php
class ocsConnection {
    private $host = '172.26.19.126';
    private $username = 'tecnologiacam';
    private $password = "d4t4.CAM28%";
    private $dbname = 'ocs';

    public function connectionOCS() {
        try {
            $ocsConn = new PDO( 
                "mysql:host=$this->host;dbname=$this->dbname",
                $this->username,
                $this->password
            );
            $ocsConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $ocsConn;
        } catch (PDOException $e) {
            die("Error de conexión a la base de datos: " . $e->getMessage());
        }

        
    } 
    
}
?>
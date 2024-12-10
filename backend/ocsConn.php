<?

class ocsConnection {
    private $host = '172.26.19.126';
    private $username = 'Admin';
    private $password = "TI0cs17";
    private $dbname = 'ocs';

    public function connectionOCS() {
        $ocsConn = new PDO("mysql:host=$this->host;
        dbname=$this->dbname", $this->username, $this->password);
        $ocsConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $ocsConn;
    }

}

$ocsConnection = new ocsConnection();
return $ocsConnection->connectionOCS();

?>
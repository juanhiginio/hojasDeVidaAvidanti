<?

session_start();
$ocsConn = include('ocsConn.php');

try {

    $stm = $ocsConn->prepare(" SELECT h.IPADDR as ip, 
    h.DEVICEID as equipo,
    h.USERID as usuario, 
    b.SMANUFACTURER as fabricante, 
    b.SMODEL as modelo, 
    b.SSN as serie, 
    a.TAG as activo, 
    h.PROCESSORT as procesador, 
    h.PROCESSORS as velocidad_mghz,
    h.MEMORY as RAM, 
    h.OSNAME as sistema_operativo, 
    h.WINPRODKEY as licencia_SO 
    from hardware h 
    inner join softwares s on h.ID = s.HARDWARE_ID
    inner JOIN bios b on s.HARDWARE_ID = h.ID
    INNER JOIN accountinfo a on s.HARDWARE_ID = h.ID");

    $stmt->execute();

    if($stmt->rowCount() > 0) {
        
    }
    

} catch (PDOException $e ) {
    echo "Error en la conexión: " . $e->getMessage();
}

?>
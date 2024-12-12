<?php
include('ocsConn.php');

try {
    $ocs = new ocsConnection();
    $ocsConnection = $ocs->connectionOCS();

    $stmt = $ocsConnection->prepare("
        SELECT 
            h.IPADDR AS ip, 
            h.NAME AS equipo, 
            h.USERID AS usuario, 
            b.SMANUFACTURER AS fabricante, 
            b.SMODEL AS modelo, 
            b.SSN AS serie, 
            a.TAG AS activo, 
            h.PROCESSORT AS procesador, 
            h.PROCESSORS AS velocidad_mghz, 
            h.MEMORY AS RAM, 
            h.OSNAME AS sistema_operativo, 
            h.WINPRODKEY AS licencia_SO 
        FROM hardware h
        LEFT JOIN bios b ON b.HARDWARE_ID = h.ID
        LEFT JOIN accountinfo a ON a.HARDWARE_ID = h.ID
        LEFT JOIN softwares s ON s.HARDWARE_ID = h.ID
        GROUP BY ip,equipo,usuario,fabricante,modelo,serie,activo,procesador,velocidad_mghz,RAM,sistema_operativo,licencia_SO
        ORDER BY h.DEVICEID ASC
    ");
    $stmt->execute();
    $ocs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($ocs);


    } catch (PDOException $e) {
        die("Error al consultar la base de datos: " . $e->getMessage());
    }
?>

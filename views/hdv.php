<?php
include('../backend/ocs.php'); 
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : null;

$dispositivoSeleccionado = null;
foreach ($ocs as $dispositivo) {
    if ($dispositivo['activo'] == $nombre) {  // Cambié 'id' por 'activo' (nombre del dispositivo)
        $dispositivoSeleccionado = $dispositivo;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formato HDV</title>
    <link rel="stylesheet" href="../css/hdv.css">

</head>
<body id="head">

    <table class="tabla-encabezado">
        <thead id="encabezado">
            <tr class="linea-encabezado grid-container">
                <td class="avidanti">
                    <img src='https://www.avidanti.com/wp-content/uploads/2020/07/LOGO-AVIDANTI-_portal_helpdesk.png' alt="logoempresa"  id="logo">
                </td>
                <th class=" avidanti separado" id="grid" ><strong class="strong">HOJA DE VIDA ELEMENTOS TECNOLÓGICOS</strong></th>
                <td class="avidanti separado"><strong>Versión: 1</strong></td>
                <td class="avidanti separado"><strong>R-CGTI-12</strong></td>
                <td colspan="2"><strong>PROCESO: TECNOLOGÍA INFORMÁTICA</strong></td>
                <td colspan="2" class="avidanti"><strong>Página 1 de 1</strong></td>
            </tr>
            

        </thead>
    </table>
    
    <table class="cb-table" class="avidanti">

        <tbody>

            <br>
            <tr>
                <td class="titulo-hdv">HOJA DE VIDA  - EQUIPO DE COMPUTO</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="titulo-hdv">DATOS DE USUARIO</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Responsable</td>
                <td>GTI</td>
                <td></td>
                <td class="negrilla-titulo">Proceso :</td>
                <td>MANTENIMIENTO PREVENTIVO</td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Dirección IP:</td>
                <td><?php echo htmlspecialchars($dispositivo['ip']); ?></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Nombre PC:</td>
                <td>ACAM-DP274</td>
                <td class="negrilla-titulo">User Admin:  </td>
                <td>Administrador</td>
                <td></td>
                <td class="negrilla-titulo">Clave:</td>
                <td>%ClinicaDiacorsas3000!</td>
                <td class="negrilla-titulo">Usuario Dominio:</td>
                <td><?php echo htmlspecialchars($dispositivo['usuario']); ?></td>
                <td class="negrilla-titulo">Contraseña:</td>
                <td>Mavidanti2021</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Fecha de Compra:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Factura:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Proveedor:</td>
                <td>N/A</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="titulo-hdv">CONFIGURACION ACTUAL DE HARDWARE</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Marca PC:</td>
                <td><?php echo htmlspecialchars($dispositivo['fabricante']); ?></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Activo Fijo:</td>
                <td>SIN PLACA</td>
                <td></td>
                <td class="negrilla-titulo">Marca Monitor:</td>
                <td><?php echo htmlspecialchars($dispositivo['fabricante']); ?></td>
                <td class="negrilla-titulo">Activo Fijo:</td>
                <td>CAM-2467</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Modelo PC:</td>
                <td><?php echo htmlspecialchars($dispositivo['modelo']); ?></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Serial PC:</td>
                <td><?php echo htmlspecialchars($dispositivo['serie']); ?></td>
                <td></td>
                <td class="negrilla-titulo">Modelo Monitor:</td>
                <td><?php echo htmlspecialchars($dispositivo['modelo']); ?></td>
                <td class="negrilla-titulo">Serial Monitor:</td>
                <td><?php echo htmlspecialchars($dispositivo['serie']); ?></td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Procesador</td>
                <td><?php echo htmlspecialchars($dispositivo['procesador']); ?></td>
                <td class="negrilla-titulo">Velocidad Ghz:</td>
                <td><?php echo htmlspecialchars($dispositivo['velocidad_mghz']); ?> </td>
                <td class="negrilla-titulo">Serial Proc</td>
                <td>N/A</td>
                <td></td>
                <td class="negrilla-titulo">Teclado</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Serial Teclado:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Memoria RAM (Fisica)</td>
                <td><?php echo htmlspecialchars($dispositivo['RAM']); ?></td>
                <td class="negrilla-titulo">Velocidad Mb:</td>
                <td>2400</td>
                <td class="negrilla-titulo">Serial Mem.</td>
                <td>N/A</td>
                <td></td>
                <td class="negrilla-titulo">Mouse</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Serial Mouse:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Disco Duro -Marca</td>
                <td>Barracuda</td>
                <td class="negrilla-titulo">Capacidad Gb:</td>
                <td>953867</td>
                <td class="negrilla-titulo">Serial HD</td>
                <td>N/A</td>
                <td></td>
                <td class="negrilla-titulo">CD-ROM</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Serial CDROM:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>953868</td>
                <td class="negrilla-titulo">TIPO:</td>
                <td>       ID   ___</td>
                <td>SATA X</td>
                <td class="negrilla-titulo">Unidad DVD</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Serial DVD:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Tarjeta de Red:</td>
                <td>Ethernet- wifi </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="titulo-hdv">SOFTWARE</td>

            </tr>
            <tr>
                <td class="negrilla-titulo">Sistema Operativo:</td>
                <td><?php echo htmlspecialchars($dispositivo['sistema_operativo']); ?></td>
                <td class="negrilla-titulo">Tipo de sistema:</td>
                <td>Windows </td>
                <td class="negrilla-titulo">Service Pack:</td>
                <td></td>
                <td class="negrilla-titulo">Licencia:</td>
                <td><?php echo htmlspecialchars($dispositivo['licencia_SO']); ?></td>
                <td></td>
                <td class="negrilla-titulo">Plugins</td>
                <td></td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Directorio de Windows:</td>
                <td>N/A</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Acrobat reader:</td>
                <td></td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Paquete Ofimático:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Service Pack:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Licencia:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Otros:</td>
                <td>N/A</td>
                <td></td>
                <td class="negrilla-titulo">Java:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Paquete Ofimático:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Service Pack:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Licencia:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Otros:</td>
                <td>N/A</td>
                <td></td>
                <td class="negrilla-titulo">Show Player:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Navegador:</td>
                <td>Chrome </td>
                <td class="negrilla-titulo">Remoto:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Clave:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Otros:</td>
                <td>N/A</td>
                <td></td>
                <td class="negrilla-titulo">Flash Player:</td>
                <td>N/A</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Antivirus:</td>
                <td>sophos</td>
                <td class="negrilla-titulo">Otros:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Licencia:</td>
                <td>N/A</td>
                <td class="negrilla-titulo">Otros:</td>
                <td>N/A</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="titulo-hdv">OBSERVACIONES</td>
            </tr>
            <tr>
                <td class="negrilla-titulo">Nro</td>
                <td class="negrilla-titulo">Descripción</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Mantenimiento</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td class="negrilla-titulo">Tipo mantenimiento</td>
                <td>Preventivo X</td>
                <td>Correctivo  ____</td>
                <td class="negrilla-titulo">Realizado por:   </td>
                <td>Juanita moreno </td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Día:</td>
                <td class="negrilla-titulo">Mes</td>
                <td class="negrilla-titulo">Año</td>
            </tr>
            <tr>
                <td></td>
                <td class="negrilla-titulo">Problema:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>1</td>
                <td>2</td>
                <td>2023</td>
            </tr>
            <tr>
                <td></td>
                <td class="negrilla-titulo">Diagnóstico:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Hora Ingreso GTI: </td>
                <td>04:00:00</td>
                <td>AM __ PM _X</td>
            </tr>
            <tr>
                <td></td>
                <td class="negrilla-titulo">Solución:</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>2</td>
                <td>2</td>
                <td>2023</td>
            </tr>
            <tr>
                <td></td>
                <td class="negrilla-titulo">Observaciones:</td>
                <td>Se realizo mantenimiento preventivo de software y  hardware.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Hora Entrega: </td>
                <td>10:20:00</td>
                <td>AM X PM ___</td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="negrilla-titulo">Usuario recibe:</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table id="pie-pagina">
        <tr>
            <td class="td-pie">
                Elaborado por: Director Tecnología Informática – Jefe Tecnología Informática
            </td>
            <td  class="td-pie">
                Copia Controlada
            </td>
            <td  class="td-pie">
                Aprobado por: Director Tecnología Informática – Jefe Tecnología Informática
            </td>
        </tr>
        <tr>
            <td class="td-pie"   >
                Revisado por: Ingeniería de procesos
            </td>
            <td  class="td-pie">
                Fecha de última revisión: 25/09/2019
            </td>
            <td  class="td-pie">
                Fecha aprobación: 25/09/2019
            </td>
        </tr>
    </table>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/home.css">

    <style type="text/css">     	table.cb-tableizer {     		font-size: 12px;     		border: 1px solid #CCC;      		font-family:Arial, Helvetica, sans-serif;   	}      	.cb-tableizer td {     		padding: 4px;     		margin: 3px;     		border: 1px solid #CCC;     	}     	.cb-tableizer th {     		background-color:#C1CCAF;      		color: #FFF;     		font-weight: bold;     	}    </style>
    <title>Buscar por serial</title>
</head>

<body>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-gray">
            <div class="container-fluid" id="fluid">
                <a class="navbar-brand" href="dashboard.php"><img src="https://www.avidanti.com/wp-content/uploads/2020/07/LOGO-AVIDANTI-_portal_helpdesk.png" alt="" id="avidanti"></a>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <div class="contenedor-informacion">
                            <div class="contenedor-informacion-usuario">
                                <li class="nav-item">
                                    <div class="image-container">
                                        <img src="../assets/iconUser.svg" alt="" id="img-person">
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="personal-data">
                                        <label for="" id="name">
                                            <?php
                                                $nombreUsuario = $_SESSION['name'];
                                                echo $nombreUsuario
                                            ?>
                                        </label>
                                        <label for="" id="rol"> 
                                            <?php
                                                $rolUsuario = $_SESSION['rol'];
                                                echo $rolUsuario
                                            ?>
                                        </label>
                                    </div>
                                </li>
                            </div>
                            <li class="nav-item">
                                <a href="../backend/logout.php" class="nav-link text-hover" aria-current="page" id="logout"><img src="../assets/logOut.svg" alt=""></a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <hr>

        <div class="container-data">

            <div class="contenedor-input">
                <div class="input-group mb-3" id="search">
                    <input type="text" class="form-control" placeholder="Ingresa el Serial..." aria-label="Ingresa el Serial..." aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Info - TAG</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Activo Fijo</th>
                        <th scope="col">Serial</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <th scope="row">5468</th>
                            <td>Urgencias</td>
                            <td>DELL</td>
                            <td>CAM-234</td>
                            <td>SERIAL123</td>
                            <td><a class="btn btn-info boton-editar" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><img src="../assets/pencilIcon.svg" alt=""></a></td>
                            <td><button type="button" class="btn btn-info boton-imprimir" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="../assets/imprimir.svg" alt=""></button></td>
                        </tr>
                </tbody>
            </table>
            <!-- Modal que mostrará los datos del OCS y el boton de Mantenimiento --> 
            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Show a second modal and hide this one with the button below.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Hoja De Vida</button>
                    </div>
                    </div>
                </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2">Formato Hoja De Vida (PLACA DEL EQUIPO)</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <table class="cb-tableizer">
				<thead>
					<tr>
						<td  class="titulo-hdv">HOJA DE VIDA  - EQUIPO DE COMPUTO</td>
					</tr>
				</thead>
				<tbody>
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
						<td>Responsable</td>
						<td>GTI</td>
						<td></td>
						<td>Proceso :</td>
						<td>MANTENIMIENTO PREVENTIVO</td>
						<td></td>
						<td></td>
						<td>Dirección IP:</td>
						<td>172.26.</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td>Nombre PC:</td>
						<td>ACAM-DP274</td>
						<td>User Admin:  </td>
						<td>Administrador</td>
						<td></td>
						<td>Clave:</td>
						<td>%ClinicaDiacorsas3000!</td>
						<td>Usuario Dominio:</td>
						<td>Murgencias05</td>
						<td>Contraseña:</td>
						<td>Mavidanti2021</td>
					</tr>
					<tr>
						<td>Fecha de Compra:</td>
						<td>N/A</td>
						<td>Factura:</td>
						<td>N/A</td>
						<td>Proveedor:</td>
						<td>N/A</td>
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
						<td class="titulo-hdv">CONFIGURACION ACTUAL DE HARDWARE</td>
					</tr>
					<tr>
						<td>Marca PC:</td>
						<td>HP</td>
						<td></td>
						<td></td>
						<td>Activo Fijo:</td>
						<td>SIN PLACA</td>
						<td></td>
						<td>Marca Monitor:</td>
						<td>LG</td>
						<td>Activo Fijo:</td>
						<td>CAM-2467</td>
					</tr>
					<tr>
						<td>Modelo PC:</td>
						<td>ELITEDESQ</td>
						<td></td>
						<td></td>
						<td>Serial PC:</td>
						<td>MXL4451TWL</td>
						<td></td>
						<td>Modelo Monitor:</td>
						<td>19EN33SA</td>
						<td>Serial Monitor:</td>
						<td>301NDDMGT2098</td>
					</tr>
					<tr>
						<td>Procesador</td>
						<td>Intel(R) Core(TM) i5 </td>
						<td>Velocidad Ghz:</td>
						<td>2.10GHz </td>
						<td>Serial Proc</td>
						<td>N/A</td>
						<td></td>
						<td>Teclado</td>
						<td>N/A</td>
						<td>Serial Teclado:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td>Memoria RAM (Fisica)</td>
						<td>6GB</td>
						<td>Velocidad Mb:</td>
						<td>2400</td>
						<td>Serial Mem.</td>
						<td>N/A</td>
						<td></td>
						<td>Mouse</td>
						<td>N/A</td>
						<td>Serial Mouse:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td>Disco Duro -Marca</td>
						<td>Barracuda</td>
						<td>Capacidad Gb:</td>
						<td>953867</td>
						<td>Serial HD</td>
						<td>N/A</td>
						<td></td>
						<td>CD-ROM</td>
						<td>N/A</td>
						<td>Serial CDROM:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td>953868</td>
						<td>TIPO:</td>
						<td>       ID   ___</td>
						<td>SATA _X_</td>
						<td>Unidad DVD</td>
						<td>N/A</td>
						<td>Serial DVD:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td>Tarjeta de Red:</td>
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
						<td>Sistema Operativo:</td>
						<td> Windows 10 pro </td>
						<td>Tipo de sistema:</td>
						<td>Windows </td>
						<td>Service Pack:</td>
						<td></td>
						<td>Licencia:</td>
						<td></td>
						<td></td>
						<td>Plugins</td>
						<td></td>
					</tr>
					<tr>
						<td>Directorio de Windows:</td>
						<td>N/A</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Acrobat reader:</td>
						<td></td>
					</tr>
					<tr>
						<td>Paquete Ofimático:</td>
						<td>N/A</td>
						<td>Service Pack:</td>
						<td>N/A</td>
						<td>Licencia:</td>
						<td>N/A</td>
						<td>Otros:</td>
						<td>N/A</td>
						<td></td>
						<td>Java:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td>Paquete Ofimático:</td>
						<td>N/A</td>
						<td>Service Pack:</td>
						<td>N/A</td>
						<td>Licencia:</td>
						<td>N/A</td>
						<td>Otros:</td>
						<td>N/A</td>
						<td></td>
						<td>Show Player:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td>Navegador:</td>
						<td>Chrome </td>
						<td>Remoto:</td>
						<td>N/A</td>
						<td>Clave:</td>
						<td>N/A</td>
						<td>Otros:</td>
						<td>N/A</td>
						<td></td>
						<td>Flash Player:</td>
						<td>N/A</td>
					</tr>
					<tr>
						<td>Antivirus:</td>
						<td>sophos</td>
						<td>Otros:</td>
						<td>N/A</td>
						<td>Licencia:</td>
						<td>N/A</td>
						<td>Otros:</td>
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
						<td>Nro</td>
						<td>Descripción</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Mantenimiento</td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td>Tipo mantenimiento</td>
						<td>Preventivo _X_</td>
						<td>Correctivo  ____</td>
						<td>Realizado por:   </td>
						<td>Juanita moreno </td>
						<td></td>
						<td></td>
						<td>Día:</td>
						<td>Mes</td>
						<td>Año</td>
					</tr>
					<tr>
						<td></td>
						<td>Problema:</td>
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
						<td>Diagnóstico:</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Hora Ingreso GTI: </td>
						<td>04:00:00</td>
						<td>AM __ PM __X_</td>
					</tr>
					<tr>
						<td></td>
						<td>Solución:</td>
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
						<td>Observaciones:</td>
						<td>Se realizo mantenimiento preventivo de software y  hardware.</td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td>Hora Entrega: </td>
						<td>10:20:00</td>
						<td>AM _X_ PM ___</td>
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
						<td>Usuario recibe:</td>
						<td></td>
						<td></td>
					</tr>
	
				</tbody>
			</table>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Regresar</button>
                    </div>
                    </div>
                </div>
            </div>

            <!-- Modal Impresión De Hoja De Vida -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div>
        </div> 


    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
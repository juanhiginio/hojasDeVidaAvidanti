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
	<link rel="stylesheet" href="../css/hdv.css">
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
										<img src="../assets/iconUser.svg" alt="" style="
											margin-right: 20px;
										">
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
										<?php
										$rolUsuario = $_SESSION['rol'];
										if ($rolUsuario==='Administrador' ) {
											echo '<div >
												<a href="register.php" id="solicitar" style="
													color: black;
    												font-size: smaller;
												">Crear Cuenta</a>
											</div>'	;		
										}
								?>
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
					<button class="btn btn-outline-secondary" type="button" id="button-addon2">
						<i class="fa-solid fa-magnifying-glass"></i>
					</button>
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
						<th scope="col">Editar</th>
						<th scope="col">Imprimir</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($dispositivos as $dispositivo): ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($dispositivo['id_registro']); ?></th>
                            <td><?php echo 'DEBE VENIR DE LA DB DEL OCS'; ?></td>
                            <td><?php echo htmlspecialchars($dispositivo['marca']); ?></td>
                            <td><?php echo htmlspecialchars($dispositivo['activoFijo']); ?></td>
                            <td><?php echo htmlspecialchars($dispositivo['serial']); ?></td>
                            <td><a class="btn btn-info boton-editar" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><img src="../assets/pencilIcon.svg" alt=""></a></td>
                            <td><button type="button" class="btn btn-info boton-imprimir" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="../assets/imprimir.svg" alt=""></button></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
			</table>								
		
			<!-- Modal 1 -->
			<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
				<div class="modal-dialog modal-xl modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalToggleLabel">Observaciones</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="container mt-4">
								<!-- Contenido del primer modal -->
								<div class="mantenimiento">
									<h6>Tipo De Mantenimiento</h6>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="tipoMantenimiento" id="preventivo" value="preventivo">
										<label class="form-check-label" for="preventivo">Preventivo</label>
									</div>
									<div class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="tipoMantenimiento" id="correctivo" value="correctivo">
										<label class="form-check-label" for="correctivo">Correctivo</label>
									</div>
								</div>
								<div id="camposGenerales">
									<h6>Ejecutor</h6>
									<input type="text" placeholder="Responsable Mantenimiento" class="form-control" name="ejecutor">
									<h6>Fecha Mantenimiento</h6>
									<input type="date" id="fecha" name="fecha" class="form-control">
									<h6>Observaciones</h6>
									<textarea name="observaciones" id="observaciones" class="form-control"></textarea>
								</div>
								<br>
								<div id="camposCorrectivo" class="hidden">
									<div class="problema">
										<h6>Problema</h6>
										<textarea name="problema" id="problema" class="form-control"></textarea>
									</div>
									<br>
									<div class="diagnostico">
										<h6>Diagnóstico</h6>
										<textarea name="diagnostico" id="diagnostico" class="form-control"></textarea>
									</div>
									<br>
									<div class="solucion">
										<h6>Solución</h6>
										<textarea name="solucion" id="solucion" class="form-control"></textarea>
									</div>
								</div>
								<br>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary">Enviar</button>
							<!--<button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Hoja De Vida</button>-->
						</div>
					</div>
				</div>
			</div>
			<!--<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
						<div class="modal-dialog modal-xl modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalToggleLabel2">Formato Hoja De Vida (PLACA DEL EQUIPO)</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">-->
									<!-- Contenido del segundo modal -->
									<!--<table class="cb-tableizer">
										<thead>
											<tr>
												<td class="titulo-hdv">HOJA DE VIDA - EQUIPO DE COMPUTO</td>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>GTI</td>
												<td>MANTENIMIENTO PREVENTIVO</td>
												<td>172.26.40.146</td>
											</tr>
											
											<tr>
												<td class="negrilla-titulo">Nombre PC:</td>
												<td>ACAM-DP274</td>
												<td class="negrilla-titulo">User Admin: </td>
												<td>Administrador</td>
												<td></td>
												<td class="negrilla-titulo">Clave:</td>
												<td>%ClinicaDiacorsas3000!</td>
												<td class="negrilla-titulo">Usuario Dominio:</td>
												<td>Murgencias05</td>
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
												<td class="negrilla-titulo">Marca PC:</td>
												<td>HP</td>
												<td></td>
												<td></td>
												<td class="negrilla-titulo">Activo Fijo:</td>
												<td>SIN PLACA</td>
												<td></td>
												<td class="negrilla-titulo">Marca Monitor:</td>
												<td>LG</td>
												<td class="negrilla-titulo">Activo Fijo:</td>
												<td>CAM-2467</td>
											</tr>
											<tr>
												<td class="negrilla-titulo">Modelo PC:</td>
												<td>ELITEDESQ</td>
												<td></td>
												<td></td>
												<td class="negrilla-titulo">Serial PC:</td>
												<td>MXL4451TWL</td>
												<td></td>
												<td class="negrilla-titulo">Modelo Monitor:</td>
												<td>19EN33SA</td>
												<td class="negrilla-titulo">Serial Monitor:</td>
												<td>301NDDMGT2098</td>
											</tr>
											<tr>
												<td class="negrilla-titulo">Procesador</td>
												<td>Intel(R) Core(TM) i5 </td>
												<td class="negrilla-titulo">Velocidad Ghz:</td>
												<td>2.10GHz </td>
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
												<td>6GB</td>
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
												<td> ID ___</td>
												<td>SATA _X_</td>
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
												<td> Windows 10 pro </td>
												<td class="negrilla-titulo">Tipo de sistema:</td>
												<td>Windows </td>
												<td class="negrilla-titulo">Service Pack:</td>
												<td></td>
												<td class="negrilla-titulo">Licencia:</td>
												<td></td>
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
												<td>Preventivo _X_</td>
												<td>Correctivo ____</td>
												<td class="negrilla-titulo">Realizado por: </td>
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
												<td>AM __ PM __X_</td>
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
												<td>Se realizo mantenimiento preventivo de software y hardware.</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td class="negrilla-titulo">Hora Entrega: </td>
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
												<td class="negrilla-titulo">Usuario recibe:</td>
												<td></td>
												<td></td>
											</tr>

										</tbody>
									</table>-->
								</div>
								<!--<div class="modal-footer">
									<button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Regresar</button>
								</div>-->
							</div>
						</div>
					</div>

				</div>

	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="../js/script.js"></script>
</body>

</html>
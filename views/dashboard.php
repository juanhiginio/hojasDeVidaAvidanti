<?php
include('../backend/ocs.php');

session_start();

if (!isset($_SESSION['username'])) {
	header("Location: ../index.php");
	exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
	<link rel="stylesheet" href="../css/home.css">
	<link rel="stylesheet" href="../css/hdv.css">
	<title>Avidanti Hojas De Vida</title>
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
										if ($rolUsuario === 'Administrador') {
											echo '<div >
												<a href="register.php" id="solicitar" style="
													color: black;
    												font-size: smaller;
												">Crear Cuenta</a>
											</div>';
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

		<div class="contenedor-input">
			<input type="text" class="form-control" placeholder="¿Qué equipo buscas?" aria-describedby="button-addon2" id="buscar">
		</div>
		<br>
		<br>
		<div id="listado">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Info - TAG</th>
						<th scope="col">Marca</th>
						<th scope="col">Serial</th>
						<th scope="col">Editar</th>
						<th scope="col">Imprimir</th>
					</tr>
				</thead>
				<tbody id="equipos-tbody">
					<?php foreach ($ocs as $key => $dispositivo): ?>
						<tr id="lista">
							<th scope="row"><?php echo htmlspecialchars($key + 1); ?></th>
							<td><?php echo htmlspecialchars($dispositivo['activo']); ?></td>
							<td><?php echo htmlspecialchars($dispositivo['modelo']); ?></td>
							<td><?php echo htmlspecialchars($dispositivo['serie']); ?></td>
							<td>
								<a class="btn btn-info boton-editar" data-bs-toggle="modal" href="#exampleModalToggle" role="button" >
									<img src="../assets/pencilIcon.svg" alt="">
								</a>
							</td>
							<td>
								<button type="button" class="btn btn-info boton-imprimir" id="print" >
									<img src="../assets/imprimir.svg" alt="">
								</button>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>		
							
		</div>

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
								<form id="mantenimientoForm" method="POST">
									<!-- Contenido del primer modal -->
									<div class="mantenimiento">
										<h6 class="titulos-input">Tipo De Mantenimiento</h6>
										<div class="form-check form-check-inline separacion">
											<input class="form-check-input" type="radio" name="tipoMantenimiento" id="preventivo" value="preventivo">
											<label class="form-check-label" for="preventivo">Preventivo</label>
										</div>
										<div class="form-check form-check-inline separacion">
											<input class="form-check-input" type="radio" name="tipoMantenimiento" id="correctivo" value="correctivo">
											<label class="form-check-label" for="correctivo">Correctivo</label>
										</div>
									</div>
									<div id="camposGenerales">
										<h6 class="titulos-input">Ejecutor</h6>
										<input type="text" placeholder="Responsable Mantenimiento" class="form-control separacion" name="ejecutor">
										<h6 class="titulos-input">Fecha Mantenimiento</h6>
										<input type="date" id="fecha" name="fecha" class="form-control separacion">
										<h6 class="titulos-input">Observaciones</h6>
										<textarea name="observaciones" id="observaciones" class="form-control separacion"></textarea>
									</div>
									<br>
									<div id="camposCorrectivo" class="hidden">
										<div class="problema separacion">
											<h6 class="titulos-input">Problema</h6>
											<textarea name="problema" id="problema" class="form-control"></textarea>
										</div>
										<br>
										<div class="diagnostico separacion">
											<h6 class="titulos-input">Diagnóstico</h6>
											<textarea name="diagnostico" id="diagnostico" class="form-control"></textarea>
										</div>
										<br>
										<div class="solucion separacion">
											<h6 class="titulos-input">Solución</h6>
											<textarea name="solucion" id="solucion" class="form-control"></textarea>
										</div>
										</div>
										<br>
									</div>
									</div>
						<div class="modal-footer">
							<button class="btn btn-primary" type="submit">Enviar</button>
							<a href="../views/hdv.php" target="_blank">Hoja de Vida</a>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
		</div>
		</div>

	</main>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/insertarMantenimientos.js"></script>
	<script src="../js/script.js"></script>
</body>

</html>
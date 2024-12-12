<?php
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
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Inventario</title>
</head>

<body>
    <main>
        <div class="container">
            <form id="registerForm" method="POST">
                <div class="login-box">
                    <a href="dashboard.php" id="left"><i class="fa-solid fa-left-long"></i></a>
                    <img src="https://www.avidanti.com/wp-content/uploads/2020/07/LOGO-AVIDANTI-_portal_helpdesk.png" id="avidanti">
                    <br>
                    <br>
                    <br>
                    <h1 class="text-principal" id="bienvenido">Bienvenido Administrador </h1>
                    <h4 id="sub" class="text-principal">Ingresa los datos solicitados</h4>
                    <br>
                    <div class="contenedor-inputs">
                        <div class="contenedor-inputs-1">
                            <h4 id="user" class="credentials">Usuario</h4>
                            <div class="input-container">
                                <i class="fa-solid fa-user"></i>
                                <input type="text" placeholder="Usuario" id="input_user" name="user">
                            </div>
                            <h4 id="password" class="credentials">Contraseña</h4>
                            <div class="input-container">
                                <i class="fa-solid fa-lock"></i>
                                <input type="password" placeholder="Contraseña" id="input_pass" name="password">
                            </div>
                        </div>
                        <div class="contenedor-inputs-2">
                            <h4 id="password" class="credentials">Nombre Usuario</h4>
                            <div class="input-container">
                                <i class="fa-solid fa-address-book"></i>
                                <input type="text" placeholder="Nombre" id="input_name" name="name_user">
                            </div>
                            <h4 id="rol" class="credentials">Rol</h4>
                            <div class="input-container">
                                <i class="fa-solid fa-compass"></i>
                                <select name="select-rol" id="select-rol" class="select-rol">
                                    <option value="" disabled selected>Elige Un Rol ..</option>
                                    <option value="Editor">Editor</option>
                                    <option value="Administrador">Administrador</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <button id="envioRegister" type="submit">Registrar Usuario</button>
                    <br>
                    <br>
                </div>
            </form>
        </div>
    </main>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/register.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
$(document).ready(function () {

    $("#registerForm").submit(function (event) {
        event.preventDefault(); 

        const rol = document.getElementById('select-rol');
        
        var user = $('input[name="user"]').val();
        var name = $('input[name="name_user"]').val();
        var password = $('input[name="password"]').val();
        var rolSeleccionado = rol.value;

        if (!user || !name || !password || !rol) {
            Swal.fire({
                icon: 'warning',
                title: 'Datos Incompletos',
                text: 'Por favor completa todos los campos antes de enviar.',
            });
            return;
        }

        registerUser(user, name, password, rolSeleccionado);

    });

    function limpiarFormulario(formulario) {
        formulario.reset();

        formulario.querySelectorAll('input, select, textarea').forEach(campo => {
            if (campo.type === 'checkbox' || campo.type === 'radio') {
                campo.checked = false;
            } else {
                campo.value = ''; 
            }
        });

        console.log('Formulario limpiado exitosamente.');
    }

    function registerUser(user, name, password, rolSeleccionado) {
        const idFormulario = document.getElementById('registerForm');

        $.ajax({
            url: "../backend/registerUser.php",
            method: "POST",
            data: {
                user: user,
                name: name,
                password: password,
                rolSeleccionado: rolSeleccionado
            },
            dataType: "json",
            success: function (response) {

                if (response.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Usuario Creado',
                        text: 'El usuario ha sido creado exitosamente',
                    });

                    limpiarFormulario(idFormulario);

                } else if (response.status === "duplicado") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error Al Crear El Usuario',
                        text: 'El usuario ya existe en los registros, no fue posible crearlo nuevamente',
                    });

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Al Crear El Usuario',
                        text: 'Verifica los datos ingresados',
                    });
                    console.log("Error en la respuesta success");
                    console.log(response);
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error al realizar la petición',
                    text: 'Hubo un problema con la conexión. Intenta de nuevo.',
                });
                console.log("Error en la solicitud AJAX");
                console.log(error);
            }
        });
    }
});

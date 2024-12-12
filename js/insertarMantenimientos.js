$(document).ready(function () {

    $('#mantenimientoForm').submit(function(event) {
        event.preventDefault();

        var tipoMantenimiento = $('input[name="tipoMantenimiento"]:checked').val();

        var ejecutorMantenimiento = $('input[name="ejecutor"]').val();
        var fechaMantenimiento = $('input[name="fecha"]').val();

        var problemaPresentado = $('textarea[name="problema"]').val();
        var diagnostico = $('textarea[name="diagnostico"]').val();
        var solucion = $('textarea[name="solucion"]').val();

        var observaciones = $('textarea[name="observaciones"]').val();
        var serialEquipo;

        if (tipoMantenimiento === 'preventivo') {
            insertarMantenimientoPreventivo(ejecutorMantenimiento, fechaMantenimiento, observaciones);
        } else if (tipoMantenimiento === 'correctivo') {
            if (!ejecutorMantenimiento || !fechaMantenimiento || !observaciones || !problemaPresentado || !diagnostico || !solucion) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Datos Incompletos',
                    text: 'Por favor completa todos los campos antes de enviar el registro del mantenimiento.',
                });
                return;
            }
            insertarMantenimientoCorrectivo(ejecutorMantenimiento, fechaMantenimiento, problemaPresentado, diagnostico, solucion, observaciones, serialEquipo);
        }

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

    function insertarMantenimientoPreventivo(ejecutorMantenimiento, fechaMantenimiento, observaciones) {

        const idFormulario = document.getElementById('mantenimientoForm');

        $.ajax({
            url: "../backend/insertarMantenimientoPreventivo.php",
            method: "POST",
            data: {
                ejecutorMantenimiento: ejecutorMantenimiento,
                fechaMantenimiento: fechaMantenimiento,
                observaciones: observaciones,
            },
            dataType: "json",
            success: function (response) {

                if (response.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro Cargado',
                        text: 'Registro de Mantenimiento Preventivo Cargado Correctamente',
                    });

                    limpiarFormulario(idFormulario);

                } else if (response.status === "datosFaltantes") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error al cargar el mantenimiento',
                        text: 'Por favor rellena todos los campos para realizar el cargue del mantenimiento',
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al Crear el Registro de Mantenimiento ',
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
                console.log("Respuesta del servidor:", xhr.responseText);
            }
        });

    }

    function insertarMantenimientoCorrectivo(ejecutorMantenimiento, fechaMantenimiento, problemaPresentado, diagnostico, solucion, observaciones, serialEquipo) {
        const idFormulario = document.getElementById('mantenimientoForm');

        $.ajax({
            url: "../backend/insertarMantenimientoCorrectivo.php",
            method: "POST",
            data: {
                ejecutorMantenimiento: ejecutorMantenimiento,
                fechaMantenimiento: fechaMantenimiento,
                problemaPresentado: problemaPresentado,
                diagnostico: diagnostico,
                solucion: solucion,
                observaciones: observaciones,
                serialEquipo: serialEquipo
            },
            dataType: "json",
            success: function (response) {
                if (response.status === "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Registro Cargado',
                        text: 'Registro de Mantenimiento Correctivo Cargado Correctamente',
                    });

                    limpiarFormulario(idFormulario);

                } else if (response.status === "datosFaltantes") {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Error al cargar el mantenimiento',
                        text: 'Por favor rellena todos los campos para realizar el cargue del mantenimiento',
                    });
                }  else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al Crear el Registro de Mantenimiento ',
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
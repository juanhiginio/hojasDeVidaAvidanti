$(document).ready(function () {
    // Manejo Login primera vez
    $("#loginForm").submit(function(event){
        event.preventDefault(); // Prevenir el envío del formulario de forma eventual

        // Obtenemos los datos ingresados en el login
        var username = $("#input_user").val();
        var password = $("#input_pass").val();
        
        $.post("./backend/login.php", { user: username, password: password }, function(data) {

            if(data == "success"){
                window.location = "./views/dashboard.php";
                console.log("Correctamente redireccionado");
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Verifica los datos ingresados', 
                }); 
                console.log("Error en la respuesta success");
                console.log(data);
            }
            
        }).fail(function(xhr, status, error) {
            // Si hay un error en la petición AJAX
            console.log("Error en la petición AJAX: " + error); 
        });
    });
})
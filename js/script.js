document.querySelectorAll('.boton-imprimir').forEach(button => {
    button.addEventListener('click', event => {
        // Obtener la fila correspondiente al botón
        const row = event.target.closest('tr');
        const nombre = row.cells[1].textContent;  // Usar la columna del nombre 

        fetch(`../views/hdv.php?nombre=${encodeURIComponent(nombre)}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al cargar el archivo HTML');
                }
                return response.text();
            })
            .then(htmlContent => {
                const printWindow = window.open('', '_blank');

                printWindow.document.open();
                printWindow.document.write(htmlContent);
                printWindow.document.close();

                printWindow.onload = () => {
                    printWindow.print();
                    printWindow.close();
                };
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});

//Calendario dashboard

const today = new Date();

const yyyy = today.getFullYear();
let mm = today.getMonth() + 1; 
let dd = today.getDate();

if (mm < 10) mm = '0' + mm;
if (dd < 10) dd = '0' + dd;

const todayDate = yyyy + '-' + mm + '-' + dd;

document.getElementById('fecha').setAttribute('max', todayDate);

// Mostrar dinamicamente los campos del formulario
 // Seleccionar los elementos necesarios
 const preventivoRadio = document.getElementById('preventivo');
 const correctivoRadio = document.getElementById('correctivo');
 const camposGenerales = document.getElementById('camposGenerales');
 const camposCorrectivo = document.getElementById('camposCorrectivo');

 // Función para mostrar/ocultar campos
 function actualizarFormulario() {
     if (preventivoRadio.checked) {
         // Mostrar solo los campos generales
         camposGenerales.classList.remove('hidden');
         camposCorrectivo.classList.add('hidden');
     } else if (correctivoRadio.checked) {
         // Mostrar todos los campos
         camposGenerales.classList.remove('hidden');
         camposCorrectivo.classList.remove('hidden');
     }
 }

 // Agregar eventos para los radio buttons
 preventivoRadio.addEventListener('change', actualizarFormulario);
 correctivoRadio.addEventListener('change', actualizarFormulario);

 //BUSCAR
const filterinput = document.getElementById('buscar');
const rows = document.querySelectorAll('tbody tr');

filterinput.addEventListener('keyup',() =>{
const filterText = filterinput.value.toLowerCase();

rows.forEach(row =>{
    const rowText = row.textContent.toLowerCase();
    row.style.display = rowText.includes(filterText) ? '' : 'none';
})

})
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Cotizaciones </h4>
                </div>
                <div class="card-body--">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Estado</th> <!-- New column for Estado -->
                                    <th>Acciones</th> <!-- New column for Action buttons -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- ... (existing rows) ... -->
                                <tr id="01">
                                    <td class="serial">01.</td>
                                    <td><span class="name">Manicure</span></td>
                                    <td><span class="product">Limpieza de uñas y cutículas, masajes de exfoliación e hidratación, aceites humectantes en las cutículas y aplicación de 1 color</span></td>
                                    <td><span class="estado" id="estado_001">Pendiente</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarCotizacion('001')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarCotizacion('001')">Eliminar</button>
                                        <button class="btn btn-warning btn-sm" onclick="cambiarEstado('001')">Cambiar Estado</button>
                                    </td>
                                </tr>
                                <!-- ... (existing rows) ... -->
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                    <button class="btn btn-success" onclick="agregarCotizacion()">Agregar Nuevo</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Agrega este botón para exportar a Excel -->
    <button class="btn btn-primary btn-sm" onclick="exportarExcel()">Exportar a Excel</button>

    <script>
        function editarCotizacion(id) {
            // Existing code for editing
            console.log("Editar cotización con ID: " + id);
        }

        function eliminarCotizacion(id) {
            // Existing code for deleting
            console.log("Eliminar cotización con ID: " + id);
            // Implement logic to delete the cotización from the system or update UI as needed
            var row = document.getElementById(id);
            row.parentNode.removeChild(row);
        }

        function agregarCotizacion() {
            // Collect input from the user (you can use prompt or other UI elements)
            var nuevoId = prompt("Ingrese el nuevo Id:");
            var nuevoNombre = prompt("Ingrese el nuevo Nombre:");
            var nuevaDescripcion = prompt("Ingrese la nueva Descripción:");
            var nuevoEstado = prompt("Ingrese el nuevo Estado:");

            // Create a new row
            var newRow = document.createElement('tr');
            newRow.id = nuevoId;

            // Add cells to the row
            newRow.innerHTML = `
                <td class="serial">${nuevoId}.</td>
                <td><span class="name">${nuevoNombre}</span></td>
                <td><span class="product">${nuevaDescripcion}</span></td>
                <td><span class="estado" id="estado_${nuevoId}">${nuevoEstado}</span></td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="editarCotizacion('${nuevoId}')">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarCotizacion('${nuevoId}')">Eliminar</button>
                    <button class="btn btn-warning btn-sm" onclick="cambiarEstado('${nuevoId}')">Cambiar Estado</button>
                </td>
            `;

            // Append the new row to the table body
            var tableBody = document.querySelector('.table tbody');
            tableBody.appendChild(newRow);

            // Optionally, you can perform additional logic like saving to a database.
            console.log("Cotización agregada al sistema");
        }

        function cambiarEstado(id) {
            // Existing code for changing estado
            var estadoSpan = document.getElementById("estado_" + id);
            var estadoActual = estadoSpan.textContent;
            var nuevoEstado = prompt("Nuevo estado:", estadoActual);
            estadoSpan.textContent = nuevoEstado;
        }

        function exportarExcel() {
            var table = document.querySelector('.table');
            var ws = XLSX.utils.table_to_sheet(table);
            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'Data');
            XLSX.writeFile(wb, 'datacotizacion.xlsx');
        }
    </script>
</div>

<!-- ... (resto del código) ... -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
</script>

<!-- ... (existing code) ... -->

<script>
    // Load cotizaciones from local storage on page load
    window.onload = function () {
        cargarCotizaciones();
    };

    function cargarCotizaciones() {
        // Get cotizaciones data from local storage
        var cotizaciones = JSON.parse(localStorage.getItem('cotizaciones')) || [];

        // Populate the table with cotizaciones data
        var tableBody = document.querySelector('.table tbody');
        tableBody.innerHTML = ''; // Clear existing rows

        cotizaciones.forEach(function (cotizacion) {
            var newRow = document.createElement('tr');
            newRow.id = cotizacion.id;

            newRow.innerHTML = `
                <td class="serial">${cotizacion.id}.</td>
                <td><span class="name">${cotizacion.nombre}</span></td>
                <td><span class="product">${cotizacion.descripcion}</span></td>
                <td><span class="estado" id="estado_${cotizacion.id}">${cotizacion.estado}</span></td>
                <td>
                    <button class="btn btn-info btn-sm" onclick="editarCotizacion('${cotizacion.id}')">Editar</button>
                    <button class="btn btn-danger btn-sm" onclick="eliminarCotizacion('${cotizacion.id}')">Eliminar</button>
                    <button class="btn btn-warning btn-sm" onclick="cambiarEstado('${cotizacion.id}')">Cambiar Estado</button>
                </td>
            `;

            tableBody.appendChild(newRow);
        });
    }

    function guardarCotizacionEnLocalStorage(cotizacion) {
        // Get existing cotizaciones from local storage
        var cotizaciones = JSON.parse(localStorage.getItem('cotizaciones')) || [];

        // Add the new cotizacion
        cotizaciones.push(cotizacion);

        // Save cotizaciones back to local storage
        localStorage.setItem('cotizaciones', JSON.stringify(cotizaciones));
    }

    function agregarCotizacion() {
        // Collect input from the user
        var nuevoId = prompt("Ingrese el nuevo Id:");
        var nuevoNombre = prompt("Ingrese el nuevo Nombre:");
        var nuevaDescripcion = prompt("Ingrese la nueva Descripción:");
        var nuevoEstado = prompt("Ingrese el nuevo Estado:");

        // Create a new cotizacion object
        var nuevaCotizacion = {
            id: nuevoId,
            nombre: nuevoNombre,
            descripcion: nuevaDescripcion,
            estado: nuevoEstado,
        };

        // Save the new cotizacion to local storage
        guardarCotizacionEnLocalStorage(nuevaCotizacion);

        // Reload cotizaciones to update the table
        cargarCotizaciones();

        console.log("Cotización agregada al sistema");
    }

    // ... (existing functions) ...
</script>

<!-- ... (resto del código) ... -->

<!-- Manos -->
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Manicure </h4>
                </div>
                <div class="card-body--">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th class="avatar"> Imagen </th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Valor</th>
                                    <th>Acciones</th> <!-- New column for Action buttons -->
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="row_001">
                                    <td class="serial">001.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/manos/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Manicure</span> </td>
                                    <td> <span class="product">Limpieza de uñas y cutículas, masajes de exfoliación e hidratación, aceites humectantes en las cutículas y aplicación de 1 color </span> </td>
                                    <td><span class="name">18.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarManos('001')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarManos('001')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_002">
                                    <td class="serial">002.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/manos/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Manicure Permanente </span> </td>
                                    <td> <span class="product">Limpieza de uñas y cutículas, masajes de exfoliación e hidratación, aceites humectantes en las cutículas y aplicación de esmalte permanente</span> </td>
                                    <td><span class="name">22.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarManos('002')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarManos('002')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_003">
                                    <td class="serial">003.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/manos/2.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Uñas Acrílicas</span> </td>
                                    <td> <span class="product">Esculpidas en acrílico que permite lucir manos impecables por 3 a 4 semanas con un efecto muy natural y un brillo vitrificado que resalta</span> </td>
                                    <td><span class="name">45.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarManos('003')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarManos('003')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_004">
                                    <td class="serial">004.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/manos/3.jpeg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Uñas Gel</span> </td>
                                    <td> <span class="product">El Gel es un material flexible y adherente que permite lucir uñas lindas por 3 a 4 semanas.</span> </td>
                                    <td><span class="name">40.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarManos('004')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarManos('004')">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- /.table-stats -->
                    <button class="btn btn-success" onclick="agregarManos()">Agregar Nuevo</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function editarManos(id) {
        // Get the row data for the given ID (you can fetch data from your database or other source)
        var nombre = document.querySelector("#row_" + id + " .name").textContent;
        var descripcion = document.querySelector("#row_" + id + " .product").textContent;
        var valor = document.querySelector("#row_" + id + " .name").textContent;

        // Prompt the user to input new data (you can use a modal or another UI element)
        var nuevoNombre = prompt("Nuevo nombre:", nombre);
        var nuevaDescripcion = prompt("Nueva descripción:", descripcion);
        var nuevoValor = prompt("Nuevo valor:", valor);

        // Update the row with the new data
        document.querySelector("#row_" + id + " .name").textContent = nuevoNombre;
        document.querySelector("#row_" + id + " .product").textContent = nuevaDescripcion;
        document.querySelector("#row_" + id + " .name").textContent = nuevoValor;

        // You can also send the updated data to the server/database using AJAX or other methods
    }

    function eliminarManos(id) {
        // Replace this with your actual logic for deleting
        console.log("Delete Manos with ID: " + id);

        // Assuming you want to remove the row from the table after deletion
        var row = document.getElementById("row_" + id);
        row.parentNode.removeChild(row);
    }

    function agregarManos() {
        // Replace this with your logic for adding a new row
        console.log("Agregar Nuevo Manos");

        // You can use a modal or another UI element to get input for the new row
        var nuevoNombre = prompt("Nombre:");
        var nuevaDescripcion = prompt("Descripción:");
        var nuevoValor = prompt("Valor:");

        // Add the new row to the table
        var table = document.querySelector(".table tbody");
        var newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td class="serial">#</td>
            <td class="avatar">
                <div class="round-img">
                    <a href="#"><img class="rounded-circle" src="vistas/img/manos/default.jpg" alt=""></a>
                </div>
            </td>
            <td><span class="name">${nuevoNombre}</span></td>
            <td><span class="product">${nuevaDescripcion}</span></td>
            <td><span class="name">${nuevoValor}</span></td>
            <td>
                <button class="btn btn-info btn-sm" onclick="editarManos('NEW')">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarManos('NEW')">Eliminar</button>
            </td>
        `;

        // Append the new row to the table
        table.appendChild(newRow);
    }
</script>

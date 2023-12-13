<!-- Pies -->
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Pedicure </h4>
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
                                <tr id="row_0001">
                                    <td class="serial">0001.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/pies/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Pedicure Spa </span> </td>
                                    <td> <span class="product">Limpieza de uñas y cutículas, limado plantal con masajes de exfoliación e hidratación, aceites humectantes en las cutículas y aplicación de 1 color o estilo francés con esmaltes tradicionales. </span> </td>
                                    <td><span class="name">19.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarPedicure('0001')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarPedicure('0001')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_0002">
                                    <td class="serial">0002.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/pies/2.jpg"  alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Pedicure Permanente </span> </td>
                                    <td> <span class="product">Limpieza de uñas y cutículas, limado plantal, masajes de exfoliación e hidratación, aceites humectantes en las cutículas y aplicación de esmalte permanente</span> </td>
                                    <td><span class="name">25.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarPedicure('0002')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarPedicure('0002')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_0003">
                                    <td class="serial">0003.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/pies/3.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Parafinoteraria</span> </td>
                                    <td> <span class="product">Shock hidratante de serum que permite que los nutrientes se absorban y humecten la piel reseca dejándola suave y tersa.</span> </td>
                                    <td><span class="name">25.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarPedicure('0003')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarPedicure('0003')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_0004">
                                    <td class="serial">0004.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/pies/4.jpg"  alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">Pedicure Profunda</span> </td>
                                    <td> <span class="product">Servicio recomendado para personas con piel seca o exceso de durezas donde aplicamos un serum ablandador y cremas extra hidratantes para dejar tus pies suaves y frescos</span> </td>
                                    <td><span class="name">35.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarPedicure('0004')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarPedicure('0004')">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-success" onclick="agregarPedicure()">Agregar Nuevo</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function editarPedicure(id) {
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

    function eliminarPedicure(id) {
        // Replace this with your actual logic for deleting
        console.log("Delete Pedicure with ID: " + id);

        // Assuming you want to remove the row from the table after deletion
        var row = document.getElementById("row_" + id);
        row.parentNode.removeChild(row);
    }

    function agregarPedicure() {
        // Replace this with your logic for adding a new row
        console.log("Agregar Nuevo Pedicure");

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
                    <a href="#"><img class="rounded-circle" src="vistas/img/pies/default.jpg" alt=""></a>
                </div>
            </td>
            <td><span class="name">${nuevoNombre}</span></td>
            <td><span class="product">${nuevaDescripcion}</span></td>
            <td><span class="name">${nuevoValor}</span></td>
            <td>
                <button class="btn btn-info btn-sm" onclick="editarPedicure('NEW')">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarPedicure('NEW')">Eliminar</button>
            </td>
        `;

        // Append the new row to the table
        table.appendChild(newRow);
    }
</script>

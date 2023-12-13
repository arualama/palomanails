<!-- Packs -->
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Packs</h4>
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
                                <tr id="row_pack_001">
                                    <td class="serial">1.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/packs/1.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td> <span class="name">Manicure profunda + Parafinoterapia </span> </td>
                                    <td> <span class="product">Higienizado, limado de uñas, humectación de cutículas + exfoliación hidratación para manos, masaje y parafina</span> </td>
                                    <td><span class="name">21.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarPack('1')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarPack('1')">Eliminar</button>
                                    </td>
                                </tr>
                                <tr id="row_pack_002">
                                    <td class="serial">2.</td>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="vistas/img/packs/2.jpg" alt=""></a>
                                        </div>
                                    </td>
                                    <td> <span class="name">Manicure Rusa, builder + Esmaltado Permanente </span> </td>
                                    <td> <span class="product">Indicado para uñas débiles y quebradizas, consiste en la aplicación de Gel Builder en la uña natural para nivelar y dar firmeza a la uña.</span> </td>
                                    <td><span class="name">30.000</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" onclick="editarPack('2')">Editar</button>
                                        <button class="btn btn-danger btn-sm" onclick="eliminarPack('2')">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-success" onclick="agregarPack()">Agregar Nuevo</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function editarPack(id) {
        // Get the row data for the given ID (you can fetch data from your database or other source)
        var nombre = document.querySelector("#row_pack_" + id + " .name").textContent;
        var descripcion = document.querySelector("#row_pack_" + id + " .product").textContent;
        var valor = document.querySelector("#row_pack_" + id + " .name").textContent;

        // Prompt the user to input new data (you can use a modal or another UI element)
        var nuevoNombre = prompt("Nuevo nombre:", nombre);
        var nuevaDescripcion = prompt("Nueva descripción:", descripcion);
        var nuevoValor = prompt("Nuevo valor:", valor);

        // Update the row with the new data
        document.querySelector("#row_pack_" + id + " .name").textContent = nuevoNombre;
        document.querySelector("#row_pack_" + id + " .product").textContent = nuevaDescripcion;
        document.querySelector("#row_pack_" + id + " .name").textContent = nuevoValor;

        // You can also send the updated data to the server/database using AJAX or other methods
    }

    function eliminarPack(id) {
        // Replace this with your actual logic for deleting
        console.log("Delete Pack with ID: " + id);

        // Assuming you want to remove the row from the table after deletion
        var row = document.getElementById("row_pack_" + id);
        row.parentNode.removeChild(row);
    }

    function agregarPack() {
        // You can dynamically generate a new row and add it to the table
        var newRowId = "row_pack_" + (document.querySelectorAll('[id^="row_pack_"]').length + 1);
        var newRow = document.createElement("tr");
        newRow.setAttribute("id", newRowId);
        newRow.innerHTML = `
            <td class="serial">${newRowId.replace("row_pack_", "")}.</td>
            <td class="avatar">
                <div class="round-img">
                    <a href="#"><img class="rounded-circle" src="vistas/img/packs/placeholder.jpg" alt=""></a>
                </div>
            </td>
            <td> <span class="name">Nuevo Pack</span> </td>
            <td> <span class="product">Descripción del nuevo pack</span> </td>
            <td><span class="name">0.00</span></td>
            <td>
                <button class="btn btn-info btn-sm" onclick="editarPack('${newRowId.replace("row_pack_", "")}')">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarPack('${newRowId.replace("row_pack_", "")}')">Eliminar</button>
            </td>`;
        document.querySelector(".table tbody").appendChild(newRow);
    }
</script>

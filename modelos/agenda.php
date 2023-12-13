<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calendario</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    button {
      margin-top: 10px;
    }

    #calendar-container {
      margin-top: 20px;
    }

    #calendar-header {
      text-align: center;
    }

    #calendar-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }

    #calendar-table th, #calendar-table td {
      width: 14.28%;
      padding: 8px;
      text-align: center;
    }

    #calendar-table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>

<h2>Calendario</h2>

<div>
  <label for="eventDate">Fecha del evento:</label>
  <input type="date" id="eventDate">
  <label for="eventDescription">Descripción:</label>
  <input type="text" id="eventDescription">
  <button onclick="agregarEvento()">Agregar Evento</button>
</div>

<div id="calendar-container">
  <div id="calendar-header">
    <button onclick="cambiarMes(-1)">Anterior</button>
    <h3 id="current-month-year"></h3>
    <button onclick="cambiarMes(1)">Siguiente</button>
  </div>

  <table id="calendar-table">
    <thead>
      <tr>
        <th>Domingo</th>
        <th>Lunes</th>
        <th>Martes</th>
        <th>Miércoles</th>
        <th>Jueves</th>
        <th>Viernes</th>
        <th>Sábado</th>
      </tr>
    </thead>
    <tbody id="calendar-body"></tbody>
  </table>
</div>

<table id="calendario">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Descripción</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <!-- Aquí se mostrarán los eventos -->
  </tbody>
</table>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    mostrarCalendario(new Date());
  });

  function mostrarCalendario(date) {
    const calendarBody = document.getElementById("calendar-body");
    const currentMonthYear = document.getElementById("current-month-year");

    calendarBody.innerHTML = "";
    currentMonthYear.innerHTML = obtenerNombreMes(date) + " " + date.getFullYear();

    const firstDayOfMonth = new Date(date.getFullYear(), date.getMonth(), 1);
    const lastDayOfMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    const startDay = firstDayOfMonth.getDay();
    const lastDate = lastDayOfMonth.getDate();

    let dayCount = 1;

    for (let i = 0; i < 6; i++) {
      const row = calendarBody.insertRow(i);

      for (let j = 0; j < 7; j++) {
        const cell = row.insertCell(j);

        if ((i === 0 && j < startDay) || dayCount > lastDate) {
          // Celdas vacías antes del primer día y después del último día
          cell.innerHTML = "";
        } else {
          // Celdas con números de día
          const currentDate = new Date(date.getFullYear(), date.getMonth(), dayCount);
          cell.innerHTML = `<span>${dayCount}</span>`;
          cell.setAttribute("data-date", currentDate.toISOString().split('T')[0]);
          cell.addEventListener("click", function() {
            document.getElementById("eventDate").value = this.getAttribute("data-date");
          });

          dayCount++;
        }
      }
    }
  }

  function obtenerNombreMes(date) {
    const options = { month: 'long' };
    return new Intl.DateTimeFormat('es-ES', options).format(date);
  }

  function cambiarMes(delta) {
    const currentDate = new Date(document.getElementById("current-month-year").innerHTML);
    const newDate = new Date(currentDate.getFullYear(), currentDate.getMonth() + delta, 1);
    mostrarCalendario(newDate);
  }

  function agregarEvento() {
    const eventDate = document.getElementById("eventDate").value;
    const eventDescription = document.getElementById("eventDescription").value;

    if (!eventDate || !eventDescription) {
      alert("Por favor, completa la fecha y la descripción del evento.");
      return;
    }

    const currentDate = new Date();
    const selectedDate = new Date(eventDate);

    if (selectedDate < currentDate) {
      alert("No puedes agregar eventos en fechas pasadas.");
      return;
    }

    const table = document.getElementById("calendario").getElementsByTagName('tbody')[0];
    const newRow = table.insertRow(table.rows.length);
    const cell1 = newRow.insertCell(0);
    const cell2 = newRow.insertCell(1);
    const cell3 = newRow.insertCell(2);

    cell1.innerHTML = eventDate;
    cell2.innerHTML = eventDescription;
    cell3.innerHTML = '<button onclick="eliminarEvento(this)">Eliminar</button>';
  }

  function eliminarEvento(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
</script>

</body>
</html>

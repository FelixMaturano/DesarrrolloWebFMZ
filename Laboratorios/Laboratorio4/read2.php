<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Bandeja de Correo</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      display: flex;
    }
    .sidebar {
      display: flex;
      flex-direction: column;
      margin-right: 20px;
    }
    .sidebar button {
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ccc;
      background-color: white;
      cursor: pointer;
    }
    .sidebar button.selected {
      border: 2px solid orange;
      color: orange;
    }
    .content {
      flex-grow: 1;
    }
    .compose {
      background-color: #5ba6d8;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-bottom: 10px;
      cursor: pointer;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th {
      background-color: #5ba6d8;
      color: white;
      padding: 10px;
    }
    td {
      padding: 10px;
      border: 1px solid #ccc;
    }
    .btn-ver {
      background-color: #5ba6d8;
      color: white;
      padding: 5px 10px;
      border: none;
      cursor: pointer;
    }
    .bold {
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="sidebar">
      <button>Bandeja de Entrada</button>
      <button class="selected">Bandeja de Salida</button>
    </div>

    <div class="content">
      <button class="compose">Redactar</button>

      <table>
        <tr>
          <th>Correo</th>
          <th>Asunto</th>
          <th>Estado</th>
          <th>Operación</th>
        </tr>
        <tr>
          <td class="bold">maria.gonzalez@gmail.com</td>
          <td>Bienvenido</td>
          <td>pendiente</td>
          <td><button class="btn-ver">Ver</button></td>
        </tr>
        <tr>
          <td class="bold">carlos.ramirez@yahoo.com</td>
          <td>Actualización de cuenta</td>
          <td>Enviado</td>
          <td><button class="btn-ver">Ver</button></td>
        </tr>
      </table>
    </div>
  </div>

</body>
</html>
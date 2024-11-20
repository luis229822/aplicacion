<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Catálogo de Clientes</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Catálogo de Clientes</h1>
      <p class="lead">Aplicación de muestra del catálogo de clientes</p>
      <hr class="my-4">
      <p>Conectado a una base de datos MySQL para listar los datos de clientes</p>
    </div>
    <table class="table table-striped table-responsive">
      <thead>
        <tr>
          <th>DNI</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Teléfono</th>
          <th>Tipo Cliente</th>
          <th>Dirección</th>
          <th>Localidad</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Conexión a la base de datos
        $conexion = mysqli_connect(getenv('MYSQL_HOST'), getenv('MYSQL_USER'), getenv('MYSQL_PASSWORD'), "PRUEBA");

        // Verificar conexión
        if (!$conexion) {
          die("<tr><td colspan='8'>Error de conexión: " . mysqli_connect_error() . "</td></tr>");
        }

        // Consulta a la tabla Cliente
        $cadenaSQL = "SELECT * FROM Cliente";
        $resultado = mysqli_query($conexion, $cadenaSQL);

        // Verificar si hay resultados
        if (mysqli_num_rows($resultado) > 0) {
          // Mostrar los datos en la tabla
          while ($fila = mysqli_fetch_object($resultado)) {
            echo "<tr>
              <td>{$fila->DNI}</td>
              <td>{$fila->Nombre_cliente}</td>
              <td>{$fila->Apellido}</td>
              <td>{$fila->Telefono}</td>
              <td>{$fila->Tipo_cliente}</td>
              <td>{$fila->Direccion_cl}</td>
              <td>{$fila->Localidad}</td>
              <td>{$fila->Email}</td>
            </tr>";
          }
        } else {
          echo "<tr><td colspan='8'>No se encontraron resultados</td></tr>";
        }

        // Cerrar conexión
        mysqli_close($conexion);
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>

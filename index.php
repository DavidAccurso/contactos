<?php
    //para el script de conexion a la BD
    try {
      require_once('Functions\BD_Conexion.php');
      $sql = 'SELECT * FROM contactos';
      $resultado = $conn->query($sql);
    } catch (Exception $e) {
      $error = $e->getMessage();
    }
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agenda en PHP</title>
    <link rel="stylesheet" href="css/estilos.css" media="screen">
  </head>
  <body>
    <div class="contenedor">
      <h1>Agenda de Contactos</h1>

      <div class="contenido">
        <h2>Nuevo Contactos</h2>
        <form action="crear.php" method="post">

            <div class="campo">
              <label for="nombre">Nombre</label>
              <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            </div>
            <div class="campo">
              <label for="numero">Numero</label>
              <input type="text" name="numero" id="numero" placeholder="Numero">  
            </div>
            <input type="submit" value="agregar">
        </form>
      </div> <!-- .contenido -->
      
      <div class="contenido existentes">
        <h2>Contactos Existentes</h2>
        <p>Numero de Contactos: <?php echo $resultado->num_rows ?> </p>

        <table>
          <thead>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Editar</th>
            <th>Borrar</th>
          </thead>
          <tbody>
            <?php while($registros = $resultado->fetch_assoc() ){ ?>
              <tr>
                <td><?php echo $registros['nombre']; ?></td>
                <td><?php echo $registros['telefono']; ?></td>
                <td><a href="editar.php?id=<?php echo $registros['id']; ?>">Editar</a></td>
                <td class="borrar"><a href="borrar.php?id=<?php echo $registros['id']; ?>">Borrar</a></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

    </div>
    <?php $conn->close; ?>
  </body>
</html>

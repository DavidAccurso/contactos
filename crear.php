<?php
    //si nombre esta dentro del post
    if (isset($_POST['nombre'])) {
      //asigna a la variable el nombre
      $nombre = $_POST['nombre'];
    }
    if (isset($_POST['numero'])) {
      $numero = $_POST['numero'];
    }
    //para el script de conexion a la BD
    try {
      require_once('Functions\BD_Conexion.php');
      $sql = "INSERT INTO `contactos` (`id`,`nombre`,`telefono`) ";
      $sql .= "VALUES (NULL,'$nombre','$numero'); ";
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
      <h1>Agenda - crear</h1>
      <div class="contenido">
              <?php
                if ($resultado) {
                  echo "Contacto creado";
                }
                else {
                  echo "Error" . $conn->error;
                }
              ?>
              <a href="index.php" class="volver">Volver a inicio</a>
      </div>
    </div>
    <?php
    //cierra la conexion
      $conn->close();
    ?>
  </body>
</html>

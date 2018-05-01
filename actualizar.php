<?php
    if(isset($_GET['id'])){
      $id = $_GET['id'];
  }
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }
    if(isset($_GET['telefono'])){
        $telefono = $_GET['telefono'];
    }
    try {
      require_once('Functions\BD_Conexion.php'); //Abre conexion con la BD desde el archivo conexion dentro de Functions
    $sql = "UPDATE contactos SET ";
    $sql .= " `nombre` = '{$nombre}',";
    $sql .= " `telefono` = '{$telefono}'";
    $sql .= " WHERE `id` = '{$id}'";

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
        <h2>Contacto actualizado!</h2>
        <h4>
            <?php 
              if ($resultado) {
                echo "Contacto Actualizado";
                } else {
                  echo "Error: " . $conn->error;
                }
            ?>
        </h4>
            <br>
            <a class="volver" href="index.php">Volver al inicio</a>  
      </div> <!-- .contenido -->

    </div> <!-- .contenedor -->
    <?php $conn->close; ?> <!-- CIERRE DE CONEXION -->
  </body>
</html>

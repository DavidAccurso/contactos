<?php
    if(isset($_GET['id'])){  // Si existe el id, lo guarda en $id //
        $id = $_GET['id'];
    }
    try {
      require_once('Functions\BD_Conexion.php'); //Abre conexion con la BD desde el archivo conexion dentro de Functions
      $sql = "DELETE FROM contactos WHERE id = '{$id}' ";
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
        <h2>Eliminar Contacto</h2>
            <?php 
                if($resultado){
                    echo "Contacto eliminado";
                } else {
                    echo "Error: " . $conn->error;
                }
            ?>
            <br>
            <a class="volver" href="index.php">Volver a inicio</a>
      </div> <!-- .contenido -->
    </div> <!-- .contenedor -->
    <?php $conn->close; ?> <!-- CIERRE DE CONEXION -->
  </body>
</html>

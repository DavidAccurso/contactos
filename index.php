<?php
    //para el script de conexion a la BD
    try {
      require_once('Functions\BD_Conexion.php');
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

      <div class="contenido clearfix">
        <h2>Nuevo Contactos</h2>
        <form action="crear.php" method="post" class="clearfix">
            <div class="campo clearfix">
              <label for="nombre">Nombre
                <input type="text" name="nombre" id="nombre" placeholder="Nombre">
              </label>
            </div>
            <div class="campo clearfix">
              <label for="numero">Numero
                <input type="text" name="numero" id="numero" placeholder="Numero">
              </label>
            </div>
            <input type="submit" value="agregar">
        </form>
      </div>


    </div>
  </body>
</html>

<?php
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
    }
    if(isset($_GET['telefono'])){
        $telefono = $_GET['telefono'];
    }
    try {
      require_once('Functions\BD_Conexion.php'); //Abre conexion con la BD desde el archivo conexion dentro de Functions
      $sql = "SELECT * FROM contactos WHERE id={$id}";
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

        <form action="index.php" method="post">
            <?php while($registro = $resultado->fetch_assoc() )  { ?>

                <div class="campo">
                    <label for="nombre">Nombre </label>
                    <input type="text" value="<?php echo $registro['nombre'];?>" name="nombre" id="nombre" placeholder="Nombre">   
                </div>
                <div class="campo">
                    <label for="numero">Numero</label>
                    <input type="text" value="<?php echo $registro['telefono'];?>" name="numero" id="numero" placeholder="Numero"> 
                </div>
                <input type="submit" id="agregar" value="Editar">

            <?php }; ?>
        </form>
      </div> <!-- .contenido -->



    </div> <!-- .contenedor -->
    <?php $conn->close; ?> <!-- CIERRE DE CONEXION -->
  </body>
</html>

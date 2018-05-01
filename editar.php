<?php
    if(isset($_GET['id'])){  // Si existe el id, lo guarda en $id //
        $id = $_GET['id'];
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
        <h2>Editar Contactos</h2>

        <form action="actualizar.php" method="get">
            <?php while($registro = $resultado->fetch_assoc() )  { ?>

                <div class="campo">
                    <label for="nombre">Nombre </label>
                    <input type="text" value="<?php echo $registro['nombre'];?>" name="nombre" id="nombre" placeholder="Nombre">   
                </div>
                <div class="campo">
                    <label for="numero">Numero</label>
                    <input type="text" value="<?php echo $registro['telefono'];?>" name="telefono" id="telefono" placeholder="Numero"> 
                </div>
                <input type="hidden" name="id" value="<?php echo $registro['id']; ?>"> <!-- envia id pero sin mostrarlo-->
                <input type="submit" id="agregar" value="Modificar">
            <?php }; ?>
        </form>
      </div> <!-- .contenido -->



    </div> <!-- .contenedor -->
    <?php $conn->close; ?> <!-- CIERRE DE CONEXION -->
  </body>
</html>

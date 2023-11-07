<?php

$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"zl");

$id = $_GET['id'];

$consulta = "SELECT * FROM zapas WHERE id=$id";

$repuesta=mysqli_query ($conexion, $consulta);

$datos=mysqli_fetch_array($repuesta);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cambiar imagen</title>
    <link rel="stylesheet" href="../public/css/cambiar-img.css" />
  </head>
  <body>
    <?php
    $imagen=$datos['imagen'];
    $imagen2=$datos['imagen2'];
    $imagen3=$datos['imagen3'];
     ?>
     <h2>Modificar imagenes</h2>
     <p>Seleccione archivo, guarde los cambios y luego ponga refrescar para ver el resultado.</p>

     <a href="cambiar-img.php?id=<?php echo $datos['id']; ?>">REFRESCAR</a>
<br><br>
     <form action="" method="post" enctype="multipart/form-data">
     <label>Imagen 1</label>
     <img
       src="data:image/jpg;base64,<?php echo base64_encode($imagen)?>"
       alt=""
     />
     <br><br>
     <input type="file" name="imagen" placeholder="imagen">
     <br><br>
     <input type="submit" name="guardar-img1" value="Guardar Cambios">
     <button type="submit" name="Cancelar" formaction="lista.php">Cancelar</button>
     </form>
     <?php
     if(array_key_exists('guardar-img1',$_POST)){

     $imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

     $consulta = "UPDATE zapas SET imagen='$imagen' WHERE id=$id";

     mysqli_query($conexion,$consulta);
     }
     ?>
     <form action="" method="post" enctype="multipart/form-data">
 <label>Imagen 2</label>
 <img
   src="data:image/jpg;base64, <?php echo base64_encode($imagen2)?>"
   alt=""
 />
 <br><br>
 <input type="file" name="imagen2" placeholder="imagen">
 <br><br>
 <input type="submit" name="guardar-img2" value="Guardar Cambios">
 <button type="submit" name="Cancelar" formaction="lista.php">Cancelar</button>
</form>
<?php
if(array_key_exists('guardar-img2',$_POST)){

$imagen2=addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));

$consulta = "UPDATE zapas SET imagen2='$imagen2' WHERE id=$id";

mysqli_query($conexion,$consulta);
}
?>
<form action="" method="post" enctype="multipart/form-data">
<label>Imagen 3</label>
<img
  src="data:image/jpg;base64, <?php echo base64_encode($imagen3)?>"
  alt=""
/>
<br><br>
<input type="file" name="imagen3" placeholder="imagen">
<br><br>
<input type="submit" name="guardar-img3" value="Guardar Cambios">
<button type="submit" name="Cancelar" formaction="lista.php">Cancelar</button>


</form>
<?php
if(array_key_exists('guardar-img3',$_POST)){

$imagen3=addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));

$consulta = "UPDATE zapas SET imagen3='$imagen3' WHERE id=$id";

mysqli_query($conexion,$consulta);
}
?>
</body>
</html>

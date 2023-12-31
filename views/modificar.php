﻿<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion=mysqli_connect("127.0.0.1","root","");
 mysqli_select_db($conexion,"zl");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM zapas WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta=mysqli_query ($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos=mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modificar producto</title>
    </head>
    <body>
        <?php
        // 6) asignamos a diferentes variables los respectivos valores del array $datos.
        $marca=$datos["marca"];
        $nombre=$datos["nombre"];
        $talle=$datos["talle"];
        $cantidad=$datos["cantidad"];
        $precio=$datos['precio'];
        $leyenda=$datos['leyenda'];
        ?>
        <h2>Modificar</h2>
        <p>Ingrese los nuevos datos del producto.</p>
        <form action="" method="post" enctype="multipart/form-data">
            <label>Marca</label>
            <input type="text" name="marca" placeholder="Marca" value="<?php echo "$marca"; ?>">
<br><br>
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo "$nombre"; ?>">
<br><br>
            <label>Talle</label>
            <input type="text" name="talle" placeholder="Talle" value="<?php echo "$talle"; ?>">
<br><br>
            <label>Cantidad</label>
            <input type="text" name="cantidad" placeholder="Cantidad" value="<?php echo "$cantidad"; ?>">
<br><br>
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>">
<br><br>
            <textarea name="leyenda" placeholder="Leyenda" rows="8" cols="80"><?php echo "$leyenda"; ?></textarea>
<br><br>
            <input type="submit" name="guardar_cambios" value="Guardar" onclick="return confirm('¿Guardar cambios?')">
            <button type="submit" name="Cancelar" formaction="lista.php">Cancelar</button>
        </form>
        <?php
        // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
        if(array_key_exists('guardar_cambios',$_POST)){
            // 2') Almacenamos los datos actualizados del envío POST
            // a) generar variables para cada dato a almacenar en la bbdd
            // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
            // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
            $marca=$_POST['marca'];
            $nombre=$_POST['nombre'];
            $talle=$_POST['talle'];
            $cantidad=$_POST['cantidad'];
            $precio=$_POST['precio'];
            $leyenda=$_POST['leyenda'];

            // 3') Preparar la orden SQL
            // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
            // a) generar la consulta a realizar
             $consulta = "UPDATE zapas SET marca='$marca', nombre='$nombre', talle='$talle', cantidad='$cantidad', precio='$precio', leyenda='$leyenda' WHERE id=$id";
            // 4') Ejecutar la orden y actualizamos los datos
            // a) ejecutar la consulta
            mysqli_query($conexion,$consulta);
            // a) rederigir a index
            header('location: lista.php');
          } ?>

    </body>
</html>

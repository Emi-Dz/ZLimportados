<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar producto</title>
</head>
<body>

    <h2>Lista de zapatillas.</h2>

    <a href="../index.php"><button type="button">Cerrar sesion</button></a>
    <a href="agregar.html"><button type="button">Agregar producto</button></a>
    <br><br>
    <form class="" action="buscar.php" method="post">
        <input type="text" name="buscar" value="" placeholder="Escriba el nombre de la zapatilla" style="width:210px;">
        <input type="submit" name="boton-buscar" value="Buscar">
    </form>
    <br>

    <table border="1">
    <tr>
        <th>ID</th>
        <th>MARCA</th>
        <th>NOMBRE</th>
        <th>TALLE</th>
        <th>CANTIDAD</th>
        <th>PRECIO</th>
        <th>LEYENDA</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php
    // 1) Conexion
    $conexion=mysqli_connect("127.0.0.1","root","");
    mysqli_select_db($conexion,"zl");

    $busqueda= $_POST['buscar'];
    // 2) Preparar la orden SQL
    // Sintaxis SQL SELECT
    // SELECT * FROM nombre_tabla
    // => Selecciona todos los campos de la siguiente tabla
    // SELECT campos_tabla FROM nombre_tabla
    // => Selecciona los siguientes campos de la siguiente tabla
    $consulta= "SELECT*FROM zapas WHERE nombre LIKE'%$busqueda%'";


    // 3) Ejecutar la orden y obtenemos los registros
    $datos= mysqli_query ($conexion, $consulta);

    // 4) Mostrar los datos del registro
    while ( $reg =mysqli_fetch_array($datos) ) { ?>
        <tr>
        <td><?php echo $reg['id']; ?></td>
        <td><?php echo $reg['marca']; ?></td>
        <td><?php echo $reg['nombre']; ?></td>
        <td><?php echo $reg['talle']; ?></td>
        <td><?php echo $reg['cantidad']; ?></td>
        <td><?php echo $reg['precio']; ?></td>
        <td><?php echo $reg['leyenda']; ?></td>
        <td><a href="cambiar-img.php?id=<?php echo $reg['id']; ?>"><button type="button">IMAGENES</button></a></td>
        <td><a href="modificar.php?id=<?php echo $reg['id']; ?>"><button type="button">EDITAR</button></a></td>
        <td><a href="../public/php/borrar.php?id=<?php echo $reg['id']; ?>" onclick="return confirm('¿Está seguro que desea eliminar?');"><button type="button">ELIMINAR</button></a></td>

        </tr>
    <?php } ?>
    </table>
</body>
</html>

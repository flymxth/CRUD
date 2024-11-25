<?php
    include_once 'conexion.php';

    $sentencia_select = $con->prepare('SELECT * FROM aportaciones ORDER BY nombre DESC');
    $sentencia_select ->execute();
    $resultado = $sentencia_select->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="contenedor">
        <h2>CRUD EN PHP CON MYSQL</h2>
        <div class="barra__buscador">
            <form action="" class="formulario" method="post">
                <input type="text" placeholder="Buscar nombre o apellidos" class="input__text">
                <input type="submit" class="btn" name="btn_buscar" value="Buscar">
                <a href="insert.php" class="btn btn__nuevo">Nuevo</a>
            </form>
        </div>
        <table>
            <tr class="head">
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Telefono</td>
                <td>Aportacion</td>
                <td>Fecha</td>
                <td colspan="2">Accion</td>
            </tr>
            <?php foreach($resultado as $fila):?>
                <tr>
                    <td><?php echo $fila['nombre'] ; ?></td>
                    <td><?php echo $fila['apellidos'] ; ?></td>
                    <td><?php echo $fila['telefono'] ; ?></td>
                    <td><?php echo $fila['aportacion'] ; ?></td>
                    <td><?php echo $fila['fecha'] ; ?></td>
                    <td><a href="update.php?nombre=<?php echo $fila['nombre']; ?>" class="btn__update">Modificar</a></td>
                    <td><a href="delete.php?nombre=<?php echo $fila['nombre']; ?>" class="btn__delete">Eliminar</a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</body>
</html>
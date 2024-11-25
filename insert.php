<?php
include_once 'conexion.php';

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $aportacion = $_POST['aportacion'];
    $fecha = $_POST['fecha'];

    if (!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($aportacion) && !empty($fecha)) {
        // Validar el nombre: solo letras y espacios
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre)) {
            echo "<script> alert('Nombre no válido. Solo se permiten letras y espacios.');</script>";
        } else {
            $consulta_insert = $con->prepare('INSERT INTO aportaciones (nombre, apellidos, telefono, aportacion, fecha) VALUES (:nombre, :apellidos, :telefono, :aportacion, :fecha)');
            $consulta_insert->execute(array(
                ':nombre' => $nombre,
                ':apellidos' => $apellidos,
                ':telefono' => $telefono,
                ':aportacion' => $aportacion,
                ':fecha' => $fecha,
            ));
            header('Location: index.php');
        }
    } else {
        echo "<script> alert('Los campos están vacíos');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="contenedor">
        <h2>CRUD EN PHP CON MYSQL</h2>
        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" class="input__text">
                <input type="text" name="apellidos" placeholder="Apellidos" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="telefono" placeholder="Telefono" class="input__text">
                <input type="text" name="aportacion" placeholder="Aportacion" class="input__text">
            </div>
            <div class="form-group">
                <input type="date" name="fecha" placeholder="Fecha" class="input__text">
            </div>
            <div class="form__group">
                <a href="index.php" class="btn btn-danger">Cancelar</a>
                <input type="submit" name="guardar" placeholder="Guardar" class="btn btn-primary">
            </div>
        </form>

    </div>
</body>
</html>
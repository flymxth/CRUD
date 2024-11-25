<?php

    include_once 'conexion.php';

    if(isset($_GET['nombre'])) {
        $nombre() = $_GET['nombre'];

        $buscar_nombre = $conn->prepare('SELECT * FROM aportaciones WHERE $nombre=:nombre');
        $buscar_nombre->execute(array(
            ':nombre'->$nombre
        ));
        $resultado = $buscar_nombre->fetch();
    } else {
        header('Location: index.php');
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
                <input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre'] ?>" class="input__text">
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
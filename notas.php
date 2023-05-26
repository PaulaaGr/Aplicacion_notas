<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>

<body>
    <h1>Notas</h1>

    <?php
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    echo "CODIGO: <b>" . $codigo . "</b> <br>";
    echo "NOMBRE: <b>" . $nombre . " " . $apellido . "</b>";
    ?>

    <form>
        <p> Actividad: <input type="text" name="actividad"> <BR></BR>
            Nota: <input type="number" name="nota">
            
            <input type="submit" value="Guardar">
            <input type="submit" value="Modificar">
            <input type="submit" value="Eliminar">
        </p>
    </form>
</body>

</html>
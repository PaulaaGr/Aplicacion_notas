<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>estudiante</title>
</head>

<body>

    <h2>Estudiantes</h2>
    <form action="crear.html" method="post">
        <input type="submit" value="CREAR">
    </form>
</body>

<?php
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
echo "CODIGO <b>" . $codigo . "</b> <br>";
echo "NOMBRE <b>" . $nombre . "</b>";
?>

<p>
    <input type="submit" value="Modificar">
    <input type="submit" value="Eliminar">
<form action="notas.php" method="POST">
    <input type="submit" value="Notas">
</form>
</p>
</body>

</html>
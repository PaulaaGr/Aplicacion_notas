<?php
require '../models/usuario.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use estudiante\Estudiante;
use usuarioController\UsuarioController;

$codigo= empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo= 'Registrar Usuario';
$urlAction = "accion_registro_usuario.php";
$estudiante = new Estudiante();
if (!empty($codigo)){
    $titulo ='Modificar Usuario';
    $urlAction = "accion_modificar_usuario.php";
    $usuarioController = new UsuarioController();
    $estudiante = $usuarioController->readRow($codigo);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Codigo:</span>
            <input type="number" name="codigo" min="1" value="<?php echo $estudiante->getCodigo(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombres" value="<?php echo $estudiante->getNombre(); ?>" required>
        </label>
        <br>
        <label>
            <span>Apellido:</span>
            <input type="text" name="apellidos" value="<?php echo $estudiante->getApellido(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>
<?php

require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';


use actividad\Actividad;
use usuarioController\UsuarioController;

$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Usuario';
$urlAction = "accion_registro_actividad.php";
$actividad = new Actividad();
if (!empty($id)){
    $titulo ='Modificar Usuario';
    $urlAction = "accion_modificar_usuario.php";
    $usuarioController = new UsuarioController();
    $actividad = $usuarioController->readRow($id);
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
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $actividad->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripción:</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescr(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="text" name="nota" value="<?php echo $actividad->getNota(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>
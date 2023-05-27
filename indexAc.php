<?php
require 'models/usuario.php';
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();

$actividades = $actividadController->read();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a href="views/form_actividad.php">Registrar actividad</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>DESCRIPCIÓN</th>
                    <th>NOTA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescr() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/accion_modificar_actividad.php?id=' . $actividad->getId() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_actividad.php?id=' . $actividad->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
    <a href="../index.php">Volver al inicio</a>
</body>

</html>
<?php
require 'models/usuario.php';
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$codigo = $_GET['codigo'];

$actividades = $actividadController->read($codigo);
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
        <a href="views/form_actividad.php?codigo=<?php echo $codigo;?>">Registrar actividad</a>
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
                $contar=0;
                $nota=0;
                $promedio=0;
                
                foreach ($actividades as $actividad) {
                    $contar+=1;
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescr() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>' . $actividad->getCodEs().'</td>';
                    echo '  <td>';
                    $nota=$actividad->getNota()+$nota;
                    $promedio = $nota/$contar;
                    echo '      <a href="views/form_actividad.php?id=' . $actividad->getId() . '&codigo=' . $codigo . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_actividad.php?id=' .$actividad->getId() . '&codigo=' . $codigo . '">Borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
            </table>
            <?php
            if ($promedio !=0){
                echo '<p>EL PROMEDIO ES:'.$promedio.'</p>';
            }
            if ($promedio < 3 && $promedio>0){
                echo '<h1 style="color:red">No aprobó</h1>';
            }else if ($promedio == 0){
                echo '<h1 style="color:blue">Registre las notas</h1>';
            }else{
                echo '<h1 style="color:green">Felicidades, aprobó</h1>';
            }
            ?>
    </main>
    <br>
    <a href="index.php">Volver al inicio</a>
</body>

</html>
<?php

namespace actividadController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use actividad\Actividad;

class ActividadController extends BaseController
{

    function create($actividad)
    {

         $sql2 = 'insert into actividades ';
         $sql2 .= '(id,descripcion,nota,codigoEstudiante) values ';
         $sql2 .= '(';
         $sql2 .= $actividad->getId() . ',';
         $sql2 .= '"' . $actividad->getDescr() . '",';
         $sql2 .= '"' . $actividad->getNota() . '"';
         $sql2 .= ')';
         $conexiondb = new ConexionDbController();
         $resultadoSQL2 = $conexiondb->execSQL($sql2);
         $conexiondb->close();

        if ($resultadoSQL2) {
            return true;
        } else {
            return false;
        }
    }



    function read()
    {
        $sql2 = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL2 = $conexiondb->execSQL($sql2);
        $actividades = [];
        while ($registro2 = $resultadoSQL2->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro2['id']);
            $actividad->setDescr($registro2['descripcion']);
            $actividad->setNota($registro2['nota']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }


    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigoEstudiante=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividad();
        while ($registro2 = $resultadoSQL->fetch_assoc()) {
            $actividad->setDescr($registro2['descripcion']);
            $actividad->setNota($registro2['nota']);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($id, $actividad)
    {
        $sql2 = 'update actividades set ';
        $sql2 .= 'id=' . $actividad->getId() . '",';
        $sql2 .= 'descripcion=' . $actividad->getDescr() . '",';
        $sql2 .= 'nota=' . $actividad->getNota() . '",';
        $sql2 .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL2 = $conexiondb->execSQL($sql2);
        $conexiondb->close();
        return $resultadoSQL2;
    }


    function delete($codigo)
    {
        $sql = 'delete from actividades where codigoEstudiante=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
    
}


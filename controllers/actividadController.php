<?php

namespace actividadController;

use conexionDb\ConexionDbController;
use actividad\Actividad;

class ActividadController 
{

    function create($actividad)
    {

         $sql = 'insert into actividades ';
         $sql .= '(descripcion,nota,codigoEstudiante) values ';
         $sql .= '(';
         $sql .= '"' . $actividad->getDescr() . '",';
         $sql .= '"' . $actividad->getNota() . '",';
         $sql .= '"' . $actividad->getCodEs() . '"';
         $sql .= ')';
         $conexiondb = new ConexionDbController();
         $resultadoSQL = $conexiondb->execSQL($sql);
         $conexiondb->close();

            return $resultadoSQL;
        
    }



    function read($codigo)
    {
        $sql = 'select * from actividades where codigoEstudiante = '.$codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();   
            $actividad->setId($registro['id']);
            $actividad->setDescr($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }


    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividad();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad->setId($registro['id']);
            $actividad->setDescr($registro['descripcion']);
            $actividad->setNota($registro['nota']);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($id, $actividad)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion="' . $actividad->getDescr() . '",';
        $sql .= 'nota="' . $actividad->getNota() . '"';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }


    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
    
}


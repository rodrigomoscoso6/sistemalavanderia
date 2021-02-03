<?php

class ControladorServicioSalida
{

    function RegistrarServicioSalida($modeloserviciosalida)
    {
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO servicios_salidas(id_servicio_salida,fecha_salida,hora_salida,id_servicio_entrega,id_sanciones_economicas)
        VALUES ("'.$modeloserviciosalida->getId_servicio_salida().'","'.$modeloserviciosalida->getFecha_salida().'",
        "'.$modeloserviciosalida->getHora_salida().'","'.$modeloserviciosalida->getId_servicio_entrega().'","'.$modeloserviciosalida->getId_sanciones_economicas().'")');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }

    }

    function ModificarServicioSalida($modeloserviciosalida)
    {

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE servicios_salidas SET fecha_salida = "'.$modeloserviciosalida->getFecha_salida().'",
        hora_salida = "'.$modeloserviciosalida->getHora_salida().'",id_servicio_entrega = "'.$modeloserviciosalida->getId_servicio_entrega().'"
        ,id_sanciones_economicas  = "'.$modeloserviciosalida->getId_sanciones_economicas().'" WHERE id_servicio_salida = "'.$modeloserviciosalida->getId_servicio_salida().'"');

    }

    function NuevoIdServicioSalida()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("SELECT MAX(id_servicio_salida) as idserviciosalida FROM servicios_salidas");

        foreach($consulta as $card)
        {
            $idserviciosalida = $card['idserviciosalida'];
        }

        return $idserviciosalida;
    }



}



?>
<?php

class ControladorSancionesEconomicas
{
    function InsertarSanciones($modelosancioneseconomicas)
    {
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO sanciones_economicas(id_sanciones_economicas,fecha_retraso,hora_retraso,costo_retraso)
        VALUES ("'.$modelosancioneseconomicas->getId_sanciones_economicas().'","'.$modelosancioneseconomicas->getFecha_retraso().'",
        "'.$modelosancioneseconomicas->getHora_retraso().'","'.$modelosancioneseconomicas->getCosto_retraso().'")');

    }

    function EditarSanciones($modelosancioneseconomicas)
    {
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE sanciones_economicas SET fecha_retraso = "'.$modelosancioneseconomicas->getFecha_retraso().'",
        hora_retraso = "'.$modelosancioneseconomicas->getHora_retraso().'",costo_retraso = "'.$modelosancioneseconomicas->getCosto_retraso().'" 
        WHERE id_sanciones_economicas = "'.$modelosancioneseconomicas->getId_sanciones_economicas().'"');

    }

    function IdSancionesEconomicas()
    {

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('SELECT MAX(id_sanciones_economicas) as id FROM sanciones_economicas');

        foreach($consulta as $card)
        {
            $idsanciones = $card['id'];
        }

        return $idsanciones;
    }

}

?>
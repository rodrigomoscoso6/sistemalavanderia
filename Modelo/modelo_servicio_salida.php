<?php

class ModeloServicioSalida
{

    private $id_servicio_salida;
    private $fecha_salida;
    private $hora_salida;
    private $id_servicio_entrega;  
    private $id_sanciones_economicas;
    private $costoretraso;
    
    
    public function __construct()
    {
        
    }

    public function getId_servicio_salida() 
    {
        return $this->id_servicio_salida;
    }
 
    public function setId_servicio_salida($id_servicio_salida) 
    {
        $this->id_servicio_salida = $id_servicio_salida;
    }

    public function getFecha_salida() 
    {
        return $this->fecha_salida;
    }
 
    public function setFecha_salida($fecha_salida) 
    {
        $this->fecha_salida = $fecha_salida;
    }

    public function getHora_salida() 
    {
        return $this->hora_salida;
    }
 
    public function setHora_salida($hora_salida) 
    {
        $this->hora_salida = $hora_salida;
    }

    public function getId_servicio_entrega() 
    {
        return $this->id_servicio_entrega;
    }
 
    public function setId_servicio_entrega($id_servicio_entrega) 
    {
        $this->id_servicio_entrega = $id_servicio_entrega;
    }

    public function getId_sanciones_economicas() 
    {
        return $this->id_sanciones_economicas;
    }
 
    public function setId_sanciones_economicas($id_sanciones_economicas) 
    {
        $this->id_sanciones_economicas = $id_sanciones_economicas;
    }

    public function getCostoretraso() 
    {
        return $this->costoretraso;
    }
 
    public function setCostoretraso($costoretraso) 
    {
        $this->costoretraso = $costoretraso;
    }


}




?>
<?php
 class ModeloSancionesEconomicas{

    private $id_sanciones_economicas;
    private $fecha_retraso;
    private $hora_retraso;
    private $costo_retraso;

    public function __construct()
    {
        
    }
    public function getId_sanciones_economicas()
    {
        return $this->id_sanciones_economicas;
    }

    public function setId_sanciones_economicas($id_sanciones_economicas)
    {
        $this->id_sanciones_economicas= $id_sanciones_economicas;
    }

    public function getFecha_retraso()
    {
        return $this->fecha_retraso;
    }

    public function setFecha_retraso($fecha_retraso)
    {
        $this->fecha_retraso = $fecha_retraso;
    }

    public function getHora_retraso()
    {
        return $this->hora_retraso;
    }

    public function setHora_retraso($hora_retraso)
    {
        $this->hora_retraso = $hora_retraso;
    }

    public function getCosto_retraso()
    {
        return $this->costo_retraso;
    }

    public function setCosto_retraso($costo_retraso)
    {
        $this->costo_retraso = $costo_retraso;
    }
    

 }
?>
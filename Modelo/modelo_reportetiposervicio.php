<?php

class ModeloReporteTipoServicio
{

    private $idtiposervicio;
    private $tiposervicio;
    private $medida;
    private $descripcion;
    private $tiposerviciomasusado;

    public function __construct()
    {
        
    }

    public function getIdtiposervicio() 
    {
        return $this->idtiposervicio;
    }
 
    public function setIdtiposervicio($idtiposervicio) 
    {
        $this->idtiposervicio = $idtiposervicio;
    }

    public function getTiposervicio() 
    {
        return $this->tiposervicio;
    }
 
    public function setTiposervicio($tiposervicio) 
    {
        $this->tiposervicio = $tiposervicio;
    }

    public function getMedida() 
    {
        return $this->medida;
    }
 
    public function setMedida($medida) 
    {
        $this->medida = $medida;
    }

    public function getDescripcion() 
    {
        return $this->descripcion;
    }
 
    public function setDescripcion($descripcion) 
    {
        $this->descripcion = $descripcion;
    }

    public function getTiposerviciomasusado() 
    {
        return $this->tiposerviciomasusado;
    }
 
    public function setTiposerviciomasusado($tiposerviciomasusado) 
    {
        $this->tiposerviciomasusado = $tiposerviciomasusado;
    }


}
?>
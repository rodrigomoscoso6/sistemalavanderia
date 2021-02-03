<?php

class ModeloDetalleServicioEntrada
{
    private $id_tipo_servicio;
    private $id_servicio_entrega;
    private $precio;
    private $unidad;
    private $total;

    public function __construct()
    {

    }

    public function getId_tipo_servicio() 
    {
        return $this->id_tipo_servicio;
    }
 
    public function setId_tipo_servicio($id_tipo_servicio) 
    {
        $this->id_tipo_servicio = $id_tipo_servicio;
    }

    public function getId_servicio_entrega() 
    {
        return $this->id_servicio_entrega;
    }
 
    public function setId_servicio_entrega($id_servicio_entrega) 
    {
        $this->id_servicio_entrega = $id_servicio_entrega;
    }

    public function getPrecio() 
    {
        return $this->precio;
    }
 
    public function setPrecio($precio) 
    {
        $this->precio = $precio;
    }

    public function getUnidad() 
    {
        return $this->unidad;
    }
 
    public function setUnidad($unidad) 
    {
        $this->unidad = $unidad;
    }

    public function getTotal() 
    {
        return $this->total;
    }
 
    public function setTotal($total) 
    {
        $this->total = $total;
    }


}



?>
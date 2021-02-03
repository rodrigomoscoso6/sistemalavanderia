<?php
 class ModeloTipoServicio{

    private $id_tipo_servicio;
    private $tipo_de_servicio;
    private $medida;
    private $precio;
    private $descripcion;

    public function __construct()
    {
        
    }
    public function getId_tipo_servicio()
    {
        return $this->id_tipo_servicio;
    }
    public function setId_tipo_servicio($id_tipo_servicio)
    {
        $this->id_tipo_servicio= $id_tipo_servicio;
    }
    public function getTipo_de_servicio()
    {
        return $this->tipo_de_servicio;
    }
    public function setTipo_de_servicio($tipo_de_servicio)
    {
        $this->tipo_de_servicio = $tipo_de_servicio;
    }
    public function getMedida()
    {
        return $this->medida;
    }
    public function setMedida($medida)
    {
        $this->medida = $medida;
    }
    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    

 }
?>
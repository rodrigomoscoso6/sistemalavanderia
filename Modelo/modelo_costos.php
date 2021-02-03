<?php

class ModeloCostos{

    private $id_costos;
    private $costo_maquina_lavadora;
    private $costo_maquina_secadora;
    private $costo_maquina_energia;
    private $costo_maquina_agua;
    private $costo_maquina_gas;
    private $costo_maquina_empaque;
    private $cloro_gramos;
    private $cloro_costo;
    private $detergente_gramos;
    private $detergente_costo;
    private $suavisante_gramos;
    private $suavisante_costo;
    private $total_costo;
    private $insumos;
    private $utilidadxtipo;
    private $id_tipo_servicio;

    //
    private $tiposervicio;
    private $precio;

    public function __construct()
    {

    }

    public function getTiposervicio()
    {
        return $this->tiposervicio;
    }
 
    public function setTiposervicio($tiposervicio) 
    {
        $this->tiposervicio = $tiposervicio;
    }

    public function getPrecio() 
    {
        return $this->precio;
    }
 
    public function setPrecio($precio) 
    {
        $this->precio = $precio;
    }

    //
    public function getId_costos() 
    {
        return $this->id_costos;
    }
 
    public function setId_costos($id_costos) 
    {
        $this->id_costos = $id_costos;
    }

    public function getCosto_maquina_lavadora() 
    {
        return $this->costo_maquina_lavadora;
    }
 
    public function setCosto_maquina_lavadora($costo_maquina_lavadora) 
    {
        $this->costo_maquina_lavadora = $costo_maquina_lavadora;
    }

    public function getCosto_maquina_secadora() 
    {
        return $this->costo_maquina_secadora;
    }
 
    public function setCosto_maquina_secadora($costo_maquina_secadora) 
    {
        $this->costo_maquina_secadora = $costo_maquina_secadora;
    }

    public function getCosto_maquina_energia() 
    {
        return $this->costo_maquina_energia;
    }
 
    public function setCosto_maquina_energia($costo_maquina_energia) 
    {
        $this->costo_maquina_energia = $costo_maquina_energia;
    }

    public function getCosto_maquina_agua() 
    {
        return $this->costo_maquina_agua;
    }
 
    public function setCosto_maquina_agua($costo_maquina_agua) 
    {
        $this->costo_maquina_agua = $costo_maquina_agua;
    }

    public function getCosto_maquina_gas() 
    {
        return $this->costo_maquina_gas;
    }
 
    public function setCosto_maquina_gas($costo_maquina_gas) 
    {
        $this->costo_maquina_gas = $costo_maquina_gas;
    }

    public function getCosto_maquina_empaque() 
    {
        return $this->costo_maquina_empaque;
    }
 
    public function setCosto_maquina_empaque($costo_maquina_empaque) 
    {
        $this->costo_maquina_empaque = $costo_maquina_empaque;
    }

    public function getCloro_gramos() 
    {
        return $this->cloro_gramos;
    }
 
    public function setCloro_gramos($cloro_gramos) 
    {
        $this->cloro_gramos = $cloro_gramos;
    }

    public function getCloro_costo() 
    {
        return $this->cloro_costo;
    }
 
    public function setCloro_costo($cloro_costo) 
    {
        $this->cloro_costo = $cloro_costo;
    }

    public function getDetergente_gramos() 
    {
        return $this->detergente_gramos;
    }
 
    public function setDetergente_gramos($detergente_gramos) 
    {
        $this->detergente_gramos = $detergente_gramos;
    }

    public function getDetergente_costo() 
    {
        return $this->detergente_costo;
    }
 
    public function setDetergente_costo($detergente_costo) 
    {
        $this->detergente_costo = $detergente_costo;
    }

    public function getSuavisante_gramos() 
    {
        return $this->suavisante_gramos;
    }
 
    public function setSuavisante_gramos($suavisante_gramos) 
    {
        $this->suavisante_gramos = $suavisante_gramos;
    }

    public function getSuavisante_costo() 
    {
        return $this->suavisante_costo;
    }
 
    public function setSuavisante_costo($suavisante_costo) 
    {
        $this->suavisante_costo = $suavisante_costo;
    }

    public function getTotal_costo() 
    {
        return $this->total_costo;
    }
 
    public function setTotal_costo($total_costo) 
    {
        $this->total_costo = $total_costo;
    }

    public function getInsumos() 
    {
        return $this->insumos;
    }
 
    public function setInsumos($insumos) 
    {
        $this->insumos = $insumos;
    }

    public function getUtilidadxtipo() 
    {
        return $this->utilidadxtipo;
    }
 
    public function setUtilidadxtipo($utilidadxtipo) 
    {
        $this->utilidadxtipo = $utilidadxtipo;
    }

    public function getId_tipo_servicio() 
    {
        return $this->id_tipo_servicio;
    }
 
    public function setId_tipo_servicio($id_tipo_servicio) 
    {
        $this->id_tipo_servicio = $id_tipo_servicio;
    }

}
?>
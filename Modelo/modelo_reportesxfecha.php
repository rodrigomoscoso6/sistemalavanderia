<?php

class ModeloReportesxFecha{

    private $id_servicio_entrega;
    private $nombrecliente;
    private $apellidocliente;
    private $dni;
    private $celular;
    private $tipodeservicio;
    private $medida;
    private $precio;
    private $unidad;
    private $total;
    private $estado_prenda;
    private $fecha_entrada;
    private $fecha_salida;
   
   
    

    public function __construct()
    {
        
    }

    //los datos que siempre se usan
    public function getId_servicio_entrega() 
    {
        return $this->id_servicio_entrega;
    }
 
    public function setId_servicio_entrega($id_servicio_entrega) 
    {
        $this->id_servicio_entrega = $id_servicio_entrega;
    }


    //para la listado de servicio de entrada
    public function getNombrecliente() 
    {
        return $this->nombrecliente;
    }
 
    public function setNombrecliente($nombrecliente) 
    {
        $this->nombrecliente = $nombrecliente;
    }

    public function getApellidos() 
    {
        return $this->apellidocliente;
    }
 
    public function setApellidos($apellidocliente) 
    {
        $this->apellidocliente = $apellidocliente;
    }

    public function getDni()
    {
        return $this->dni; 
    }
 
    public function setDni($dni)
    {
        $this->dni = $dni;
    }
    
    public function getCelular() 
    {
        return $this->celular;
    }
 
    public function setCelular($celular) 
    {
        $this->celular = $celular;
    }

    public function getTipo_de_servicio() 
    {
        return $this->tipodeservicio;
    }
 
    public function setTipo_de_servicio($tipodeservicio) 
    {
        $this->tipodeservicio = $tipodeservicio;
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

    public function getEstado_prenda() 
    {
        return $this->estado_prenda;
    }
 
    public function setEstado_prenda($estado_prenda) 
    {
        $this->estado_prenda = $estado_prenda;
    }

    public function getFecha_entrada() 
    {
        return $this->fecha_entrada;
    }
 
    public function setFecha_entrada($fecha_entrada) 
    {
        $this->fecha_entrada = $fecha_entrada;
    }

    public function getFecha_salida() 
    {
        return $this->fecha_salida;
    }
 
    public function setFecha_salida($fecha_salida) 
    {
        $this->fecha_salida = $fecha_salida;
    }

   
   

  

    

    

  

    
}



?>
<?php

class ModeloServicioEntrada{

    private $id_servicio_entrega;
    private $estado_prenda;
    private $fecha_entrada;
    private $hora_entrada;
    private $importe_total;
    private $tipo_pago;
    private $comprobante;
    private $id_cliente;
    private $id_usuario;

    //para la listado de servicio de entrada
    private $nombrecliente;
    private $apellidocliente;

    public function __construct()
    {
        
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

    public function getApellidocliente() 
    {
        return $this->apellidocliente;
    }
 
    public function setApellidocliente($apellidocliente) 
    {
        $this->apellidocliente = $apellidocliente;
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

    public function getHora_entrada() 
    {
        return $this->hora_entrada;
    }
 
    public function setHora_entrada($hora_entrada) 
    {
        $this->hora_entrada = $hora_entrada;
    }

    public function getImporte_total() 
    {
        return $this->importe_total;
    }
 
    public function setImporte_total($importe_total) 
    {
        $this->importe_total = $importe_total;
    }

    public function getTipo_pago() 
    {
        return $this->tipo_pago;
    }
 
    public function setTipo_pago($tipo_pago) 
    {
        $this->tipo_pago = $tipo_pago;
    }

    public function getComprobante() 
    {
        return $this->comprobante;
    }
 
    public function setComprobante($comprobante) 
    {
        $this->comprobante = $comprobante;
    }

    public function getId_cliente() 
    {
        return $this->id_cliente;
    }
 
    public function setId_cliente($id_cliente) 
    {
        $this->id_cliente = $id_cliente;
    }

    public function getId_usuario()
    {
        return $this->id_usuario; 
    }
 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }
}



?>
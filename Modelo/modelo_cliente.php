<?php

class ModeloCliente{

    private $id_cliente;
    private $nombre;
    private $apellidos;
    private $dni;
    private $correo;
    private $direccion;
    private $celular;

    private $rol;
    private $cantidadservicio;

    public function __construct()
    {

    }

    //para los reportes se agregan

    public function getRol() 
    {
        return $this->rol;
    }
 
    public function setRol($rol) 
    {
        $this->rol = $rol;
    }

    public function getCantidadservicio() 
    {
        return $this->cantidadservicio;
    }
 
    public function setCantidadservicio($cantidadservicio) 
    {
        $this->cantidadservicio = $cantidadservicio;
    }


    //
    public function getId_cliente() 
    {
        return $this->id_cliente;
    }
 
    public function setId_cliente($id_cliente) 
    {
        $this->id_cliente = $id_cliente;
    }

    public function getNombre() 
    {
        return $this->nombre;
    }
 
    public function setNombre($nombre) 
    {
        $this->nombre = $nombre;
    }

    public function getApellidos() 
    {
        return $this->apellidos;
    }
 
    public function setApellidos($apellidos) 
    {
        $this->apellidos = $apellidos;
    }

    public function getDni() 
    {
        return $this->dni;
    }
 
    public function setDni($dni) 
    {
        $this->dni = $dni;
    }

    public function getCorreo() 
    {
        return $this->correo;
    }
 
    public function setCorreo($correo) 
    {
        $this->correo = $correo;
    }

    public function getDireccion() 
    {
        return $this->direccion;
    }
 
    public function setDireccion($direccion) 
    {
        $this->direccion = $direccion;
    }

    public function getCelular() 
    {
        return $this->celular;
    }
 
    public function setCelular($celular) 
    {
        $this->celular = $celular;
    }
}



?>
<?php
 class ModeloRoles{

    private $id_rol;
    private $rol_nombre;

    public function __construct()
    {
        
    }
    public function getId_rol()
    {
        return $this->id_rol;
    }
    public function setId_rol($id_rol)
    {
        $this->id_rol= $id_rol;
    }
    public function getRol_nombre()
    {
        return $this->rol_nombre;
    }
    public function setRol_nombre($rol_nombre)
    {
        $this->rol_nombre = $rol_nombre;
    }
    

 }
?>
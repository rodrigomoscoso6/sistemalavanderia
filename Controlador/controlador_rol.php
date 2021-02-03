<?php 

class ControladorRol{

    function RegistrarRol($modeloroles)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO roles(id_rol,rol_nombre) 
        VALUES ("'.$modeloroles->getId_rol().'","'.$modeloroles->getRol_nombre().'")');
        
        if($consulta)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function EditarRol($modeloroles)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE roles SET rol_nombre = "'.$modeloroles->getRol_nombre().'" WHERE 
        id_rol = "'.$modeloroles->getId_rol().'"');
        
        if($consulta)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function NuevoIdRol()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();
               
        $consulta = $cn->conexion()->query('SELECT MAX(id_rol) as idrol FROM roles');

        foreach($consulta as $card)
        {
            $idcliente = $card['idrol'];
        }

        return $idcliente;
    }

    function ListadoRoles()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_roles.php');
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query('SELECT * FROM roles');

        while($row = $consulta->fetch_assoc())
        {
            $modeloroles = new ModeloRoles();

            $modeloroles->setId_rol($row['id_rol']);
            $modeloroles->setRol_nombre($row['rol_nombre']);
            
            $array[] = $modeloroles;
        }

        return $array;
    }

    function BuscarId($idroles)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_roles.php');
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT * FROM roles WHERE id_rol = '$idroles' ");

        while($row = $consulta->fetch_assoc())
        {
            $modeloroles = new ModeloRoles();

            $modeloroles->setId_rol($row['id_rol']);
            $modeloroles->setRol_nombre($row['rol_nombre']);
            
            $array[] = $modeloroles;
        }

        return $array;
    }

    function EliminarRol($modelorol)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('DELETE FROM roles WHERE id_rol = "'. $modelorol->getId_rol() .'"');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }

    }

}



?>
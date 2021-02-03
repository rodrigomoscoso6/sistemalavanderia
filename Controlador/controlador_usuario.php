<?php
  
class ControladorUsuario{

    function ExisteusuarioLogueo($modelousuario)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('SELECT * FROM usuarios WHERE usuario = "'. $modelousuario->getUsuario() .'" ');

        if (mysqli_num_rows($consulta) > 0) 
        {
            foreach($consulta as $card)
            {
                $clave = $card['clave'];
                $modelousuario->setEstado($card['estado']);
                $modelousuario->setId_rol($card['id_rol']);
                $modelousuario->setNombre($card['nombre']);
                $modelousuario->setApellidos($card['apellidos']);
                $modelousuario->setId_usuario($card['id_usuario']);
            }

            return $clave;
        }
        else
        {
            $validar = "NoExiste";

            return $validar;
        }
    }

    function ExisteUsuarioRegistrado($modelousuario)
    {
        include('../../Conexion/conexion.php');
        
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('SELECT * FROM usuarios WHERE usuario = "'. $modelousuario->getUsuario() .'" ');

        if (mysqli_num_rows($consulta) > 0) 
        {
            $validar = "YaExiste";
            
            return $validar;
        }
        else
        {
            $validar = "NoExiste";
            return $validar;
        }

    }

    function NuevoId()
    {
        include('../../Conexion/conexion.php');
        
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('SELECT MAX(id_usuario) as id_usuario FROM usuarios');

        foreach($consulta as $card)
        {
            $id_usuario = $card['id_usuario'];
        }

        return $id_usuario;
    }

    function CantidadUsuarios()
    {
        include('../../Conexion/conexion.php');
        
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('SELECT COUNT(id_usuario) as cantidad FROM usuarios');

        foreach($consulta as $card) 
        {
            $cantidad = $card['cantidad'];
        }

        return $cantidad;
    }

    function AnidadoRoles()
    {
        include('../../Conexion/conexion.php');        
        include('../../Modelo/modelo_roles.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query('SELECT id_rol,rol_nombre FROM roles');

        while ($row = $consulta->fetch_assoc()) 
        {
            $modeloroles = new ModeloRoles();

            $modeloroles->setId_rol($row['id_rol']);
            $modeloroles->setRol_nombre($row['rol_nombre']);

            $array[] = $modeloroles;            
        }

        return $array;
    }

    function AnidadoRolesID()
    {               
        include('../../Modelo/modelo_roles.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query('SELECT id_rol,rol_nombre FROM roles');

        while ($row = $consulta->fetch_assoc()) 
        {
            $modeloroles = new ModeloRoles();

            $modeloroles->setId_rol($row['id_rol']);
            $modeloroles->setRol_nombre($row['rol_nombre']);

            $array[] = $modeloroles;            
        }

        return $array;
    }

    function MostrandoRol($idrol)
    {  
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT rol_nombre FROM roles WHERE id_rol = '$idrol' ");

        foreach($consulta as $card)
        {
            $nombrerol = $card["rol_nombre"];
        }

        return $nombrerol;
    }

    function RegistrarUsuario($modelousuario)
    {      
        $cn = new Conexion();
        
        $consulta = $cn->conexion()->query('INSERT INTO usuarios(id_usuario,usuario,clave,nombre,apellidos, sexo, estado, id_rol) 
        VALUES ("'.$modelousuario->getId_usuario(). '", "'.$modelousuario->getUsuario().'", "'.$modelousuario->getClave().'",
        "'.$modelousuario->getNombre().'","'.$modelousuario->getApellidos().'","'.$modelousuario->getSexo().'", "'.$modelousuario->getEstado().'",
        "'.$modelousuario->getId_rol().'")');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "Error";
        }
    }

    function EditarUsuario($modelousuario)
    {
        include('../../Conexion/conexion.php');
        
        $cn = new Conexion();
        
        $consulta = $cn->conexion()->query('UPDATE usuarios SET usuario = "'.$modelousuario->getUsuario().'",nombre ="'.$modelousuario->getNombre().'",
        apellidos = "'.$modelousuario->getApellidos().'",sexo = "'.$modelousuario->getSexo().'",estado = "'.$modelousuario->getEstado().'",id_rol ="'.$modelousuario->getId_rol().'" 
        WHERE id_usuario="'.$modelousuario->getId_usuario().'"');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "Error";
        }
    }

    function ListadoUsuario()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_usuarios.php');
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query('SELECT usu.id_usuario as id_usuario,usu.usuario as usuario,
        usu.nombre as nombre,usu.apellidos as apellidos,usu.sexo as sexo,usu.estado as estado,
        rol.rol_nombre as rol FROM usuarios usu, roles rol WHERE usu.id_rol = rol.id_rol');

        while($row = $consulta->fetch_assoc())
        {
            $modelousuario = new ModeloUsuario();

            $modelousuario->setId_usuario($row['id_usuario']);
            $modelousuario->setUsuario($row['usuario']);
            $modelousuario->setNombre($row['nombre']);
            $modelousuario->setApellidos($row['apellidos']);
            $modelousuario->setSexo($row['sexo']);
            $modelousuario->setEstado($row['estado']);
            $modelousuario->setId_rol($row['rol']);

            $array[] = $modelousuario;
        }

        return $array;
    }

    function BuscarId($idusuarrio)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_usuarios.php');
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT usu.id_usuario as idusuario,usu.usuario as usuario, usu.nombre 
        as nombre,usu.apellidos as apellidos,usu.sexo as sexo,usu.estado as estado, rol.rol_nombre as rol 
        FROM usuarios usu, roles rol WHERE usu.id_rol = rol.id_rol AND usu.id_usuario = '$idusuarrio'");

        while($row = $consulta->fetch_assoc())
        {
            $modelousuario = new ModeloUsuario();

            $modelousuario->setId_usuario($row['idusuario']);
            $modelousuario->setUsuario($row['usuario']);
            $modelousuario->setNombre($row['nombre']);
            $modelousuario->setApellidos($row['apellidos']);
            $modelousuario->setSexo($row['sexo']);
            $modelousuario->setEstado($row['estado']);
            $modelousuario->setId_rol($row['rol']);

            $array[] = $modelousuario;
        }

        return $array;
    }

    function EliminarUsuario($modelousuario)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('DELETE FROM usuarios WHERE id_usuario = "'. $modelousuario->getId_usuario() .'"');

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
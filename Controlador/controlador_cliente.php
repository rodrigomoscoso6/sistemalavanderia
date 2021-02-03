<?php

class ControladorCliente{
  
    function InsertarCliente($modelocliente)
    {
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO clientes(id_cliente,nombre,apellidos,dni,direccion,celular,correo) 
        VALUES ("'. $modelocliente->getId_cliente().'","'. $modelocliente->getNombre().'","'. $modelocliente->getApellidos().'",
        "'. $modelocliente->getDni().'","'. $modelocliente->getDireccion().'","'. $modelocliente->getCelular().'","'. $modelocliente->getCorreo().'")');
        
        if($consulta)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function ModificarCliente($modelocliente)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE clientes SET nombre = "'. $modelocliente->getNombre().'",
        apellidos = "'. $modelocliente->getApellidos().'",dni = "'. $modelocliente->getDni().'",
        direccion = "'. $modelocliente->getDireccion().'",celular = "'. $modelocliente->getCelular().'",correo = "'. $modelocliente->getCorreo().'"
        WHERE id_cliente = "'. $modelocliente->getId_cliente() .'"');
        
        if($consulta)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function EliminarCliente($modelocliente)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('DELETE FROM clientes WHERE id_cliente = "'. $modelocliente->getId_cliente() .'"');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }

    }

    function NuevoIdCliente()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();
               
        $consulta = $cn->conexion()->query('SELECT MAX(id_cliente) as idcliente FROM clientes');

        foreach($consulta as $card)
        {
            $idcliente = $card['idcliente'];
        }

        return $idcliente;
    }

    function CantidadCliente()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();
               
        $consulta = $cn->conexion()->query('SELECT COUNT(id_cliente) as cantidad FROM clientes');

        foreach($consulta as $card)
        {
            $cantidad = $card['cantidad'];
        }

        return $cantidad;
    }

    function ListadoCliente()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_cliente.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("SELECT * FROM clientes");

        $array = array();

        while($row = $consulta->fetch_assoc())
        {
            $modelocliente = new ModeloCliente();

            $modelocliente->setId_cliente($row['id_cliente']);
            $modelocliente->setNombre($row['nombre']);
            $modelocliente->setApellidos($row['apellidos']);
            $modelocliente->setDni($row['dni']);
            $modelocliente->setDireccion($row['direccion']);
            $modelocliente->setCelular($row['celular']);
            $modelocliente->setCorreo($row['correo']);

            $array[] = $modelocliente;
        }

        return $array;
    }

    function BuscarporId($idcliente)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_cliente.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("SELECT * FROM clientes WHERE id_cliente = '$idcliente'");

        $array = array();

        while($row = $consulta->fetch_assoc())
        {
            $modelocliente = new ModeloCliente();

            $modelocliente->setId_cliente($row['id_cliente']);
            $modelocliente->setNombre($row['nombre']);
            $modelocliente->setApellidos($row['apellidos']);
            $modelocliente->setDni($row['dni']);
            $modelocliente->setCorreo($row['correo']);
            $modelocliente->setDireccion($row['direccion']);
            $modelocliente->setCelular($row['celular']);
            $modelocliente->setCorreo($row['correo']);

            $array[] = $modelocliente;
        }

        return $array;
    }

    function FiltroListadoCliente($data)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modeloCliente.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("SELECT * FROM clientes WHERE nombre LIKE '%".$data."%' OR apellidos LIKE '%".$data."%'");

        $array = array();

        while($row = $consulta->fetch_assoc())
        {
            $modelocliente = new ModeloCliente();

            $modelocliente->setId_cliente($row['id_cliente']);
            $modelocliente->setNombre($row['nombre']);
            $modelocliente->setApellidos($row['apellidos']);
            $modelocliente->setDni($row['dni']);
            $modelocliente->setDireccion($row['direccion']);
            $modelocliente->setCelular($row['celular']);
            $modelocliente->setCorreo($row['correo']);

            $array[] = $modelocliente;
        }

        return $array;
    }

    function VerficarDNI($dni)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("SELECT * FROM clientes WHERE dni = '$dni'");

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


}



?>
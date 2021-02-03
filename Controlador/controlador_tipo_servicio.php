<?php 

class ControladorTipoServicio{

    function RegistrarTipoServicio($modelotiposervicio)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO tipo_servicios(id_tipo_servicio,tipo_de_servicio,medida,precio,descripcion) 
        VALUES ("'.$modelotiposervicio->getId_tipo_servicio().'","'.$modelotiposervicio->getTipo_de_servicio().'","'.$modelotiposervicio->getMedida().'",
        "'.$modelotiposervicio->getPrecio().'","'.$modelotiposervicio->getDescripcion().'")');
        
        if($consulta)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function ModificarTipoServicio($modelotiposervicio)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE tipo_servicios SET tipo_de_servicio = "'. $modelotiposervicio->getTipo_de_servicio().'",
        medida = "'. $modelotiposervicio->getMedida().'",precio = "'. $modelotiposervicio->getPrecio().'",descripcion = "'. $modelotiposervicio->getDescripcion().'"
        WHERE id_tipo_servicio = "'. $modelotiposervicio->getId_tipo_servicio() .'"');
        
        if($consulta)
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function EliminarTipoServicio($modelotiposervicio)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('DELETE FROM tipo_servicios WHERE id_tipo_servicio = "'. $modelotiposervicio->getId_tipo_servicio() .'"');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }

    }

    function CantidadTipoServicio()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();
               
        $consulta = $cn->conexion()->query('SELECT COUNT(id_tipo_servicio) as cantidad FROM tipo_servicios');

        foreach($consulta as $card)
        {
            $cantidad = $card['cantidad'];
        }

        return $cantidad;
    }

    function NuevoIdTipoServicio()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();
               
        $consulta = $cn->conexion()->query('SELECT MAX(id_tipo_servicio) as idtiposervicio FROM tipo_servicios');

        foreach($consulta as $card)
        {
            $idcliente = $card['idtiposervicio'];
        }

        return $idcliente;
    }

    function ListadoTipoServicio()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_tipo_servicio.php');
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query('SELECT * FROM tipo_servicios');

        while($row = $consulta->fetch_assoc())
        {
            $modelotiposervicio = new ModeloTipoServicio();

            $modelotiposervicio->setId_tipo_servicio($row['id_tipo_servicio']);
            $modelotiposervicio->setTipo_de_servicio($row['tipo_de_servicio']);
            $modelotiposervicio->setMedida($row['medida']);
            $modelotiposervicio->setPrecio($row['precio']);
            $modelotiposervicio->setDescripcion($row['descripcion']);
            
            $array[] = $modelotiposervicio;
        }

        return $array;
    }

    function BuscarporId($idtiposervicio)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_tipo_servicio.php');
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT * FROM tipo_servicios WHERE id_tipo_servicio = '$idtiposervicio'");

        while($row = $consulta->fetch_assoc())
        {
            $modelotiposervicio = new ModeloTipoServicio();

            $modelotiposervicio->setId_tipo_servicio($row['id_tipo_servicio']);
            $modelotiposervicio->setTipo_de_servicio($row['tipo_de_servicio']);
            $modelotiposervicio->setMedida($row['medida']);
            $modelotiposervicio->setPrecio($row['precio']);
            $modelotiposervicio->setDescripcion($row['descripcion']);
            
            $array[] = $modelotiposervicio;
        }

        return $array;
    }

    function QueTipoServicioSaleMas()
    {
        include('../../Conexion/conexion.php');    
        
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT tipo.tipo_de_servicio as tiposervicio FROM detalle_servicio_entradas deta, tipo_servicios tipo WHERE deta.id_tipo_servicio = tipo.id_tipo_servicio");

       foreach($consulta as $card)
       {
        $array[] = $card['tiposervicio'];
       }

        return $array;
    }

}




?>
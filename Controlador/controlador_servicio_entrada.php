<?php

class ControladorServicioEntrada
{
    function NuevoIdServicioEntrada()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();
               
        $consulta = $cn->conexion()->query('SELECT MAX(id_servicio_entrega) as idservicioentrada FROM servicio_entradas');

        foreach($consulta as $card)
        {
            $idservicioentrada = $card['idservicioentrada'];
        }

        return $idservicioentrada;
    }

    function RegistrarServicioEntrada($modeloservicioentrada)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO servicio_entradas(id_servicio_entrega,estado_prenda,fecha_entrada,
        hora_entrada,importe_total,tipo_pago,comprobante,id_cliente,id_usuario) VALUES ("'.$modeloservicioentrada->getId_servicio_entrega().'",
        "'.$modeloservicioentrada->getEstado_prenda().'","'.$modeloservicioentrada->getFecha_entrada().'","'.$modeloservicioentrada->getHora_entrada().'",
        "'.$modeloservicioentrada->getImporte_total().'","'.$modeloservicioentrada->getTipo_pago().'","'.$modeloservicioentrada->getComprobante().'",
        "'.$modeloservicioentrada->getId_cliente().'","'.$modeloservicioentrada->getId_usuario().'")');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }

    }

    function EliminarServicio($idservicioentrada)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("DELETE FROM servicio_entradas WHERE id_servicio_entrega = $idservicioentrada ");

        if ($consulta) 
        {
           $mensaje = "ok";
        }
        else
        {
            $mensaje = "error";
        }

        return $mensaje;
    }

    function ModificarServicioEntrada($modeloservicioentrada)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE servicio_entradas SET estado_prenda = "'.$modeloservicioentrada->getEstado_prenda().'",fecha_entrada = "'.$modeloservicioentrada->getFecha_entrada().'",
        hora_entrada = "'.$modeloservicioentrada->getHora_entrada().'",importe_total = "'.$modeloservicioentrada->getImporte_total().'",tipo_pago = "'.$modeloservicioentrada->getTipo_pago().'",comprobante = "'.$modeloservicioentrada->getComprobante().'",
        id_cliente = "'.$modeloservicioentrada->getId_cliente().'",id_usuario = "'.$modeloservicioentrada->getId_usuario().'" WHERE id_servicio_entrega  = "'.$modeloservicioentrada->getId_servicio_entrega().'"');
     
    }

    function RegistrarDetalleServicioEntrada($modelodetalleservicioentrada)
    {     
        
        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO detalle_servicio_entradas(id_tipo_servicio,id_servicio_entrega,precio,unidad,total) 
        VALUES ("'.$modelodetalleservicioentrada->getId_tipo_servicio().'","'.$modelodetalleservicioentrada->getId_servicio_entrega().'","'.$modelodetalleservicioentrada->getPrecio().'","'.$modelodetalleservicioentrada->getUnidad().'","'.$modelodetalleservicioentrada->getTotal().'")');

        if ($consulta) 
        {
            echo "ok";
        }
        else
        {
            echo "error";
        }
    }

    function Idcliente($idservicioentrada)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT id_cliente FROM servicio_entradas WHERE id_servicio_entrega = '$idservicioentrada'");

        foreach($consulta as $card)
        {
            $idservicioentrada = $card['id_cliente'];
        }

        return $idservicioentrada;
    }

    function EstadoPrenda2($idservicioentrada)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT estado_prenda FROM servicio_entradas WHERE id_servicio_entrega = '$idservicioentrada'");

        foreach($consulta as $card)
        {
            $estadoprenda = $card['estado_prenda'];
        }

        return $estadoprenda;
    }

    function EstadoPrenda($idservicioentrada)
    {
        //include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT estado_prenda FROM servicio_entradas WHERE id_servicio_entrega = '$idservicioentrada'");

        foreach($consulta as $card)
        {
            $estado_prenda = $card['estado_prenda'];
        }

        return $estado_prenda;
    }

    function CantidadImporteTotal()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT SUM(importe_total) as total FROM servicio_entradas WHERE fecha_entrada = CURDATE()");

        foreach($consulta as $card)
        {
            $total = $card['total'];
        }

        return $total;
    }

    function BuscarIdcliente($idcliente)
    {
        include('../../Modelo/modelo_cliente.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT cli.id_cliente as idcliente,cli.nombre as nombre,cli.apellidos as apellido,cli.dni as dni,cli.celular as telefono FROM 
        servicio_entradas ser,clientes cli WHERE ser.id_cliente = cli.id_cliente AND 
        ser.id_cliente = $idcliente");

        while($row = $consulta->fetch_assoc())
        {
            $modelocliente = new ModeloCliente();

            $modelocliente->setId_cliente($row['idcliente']);
            $modelocliente->setNombre($row['nombre']);
            $modelocliente->setApellidos($row['apellido']);
            $modelocliente->setDni($row['dni']);
            $modelocliente->setCelular($row['telefono']);
            
            $array[] = $modelocliente;
        }

        return $array;
    }


    function ListadoServicioEntrada()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_servicio_entrada.php');

        date_default_timezone_set('America/Lima');

        $hoy = date("Y-m-j");

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT ser.id_servicio_entrega as idservicio,cli.nombre as nombre,cli.apellidos as apellido,
        ser.fecha_entrada as f_entrada,ser.hora_entrada as h_entrada,ser.estado_prenda as estado_prenda,ser.comprobante as comprobante FROM 
        servicio_entradas ser,clientes cli WHERE cli.id_cliente = ser.id_cliente AND ser.fecha_entrada = '$hoy'");

        while($row = $consulta->fetch_assoc()) 
        {
            $modeloservicioentrada = new ModeloServicioEntrada();

            $modeloservicioentrada->setId_servicio_entrega($row['idservicio']);
            $modeloservicioentrada->setNombrecliente($row['nombre']);
            $modeloservicioentrada->setApellidocliente($row['apellido']);
            $modeloservicioentrada->setFecha_entrada($row['f_entrada']);
            $modeloservicioentrada->setHora_entrada($row['h_entrada']);
            $modeloservicioentrada->setEstado_prenda($row['estado_prenda']);
            $modeloservicioentrada->setComprobante($row['comprobante']);

            $array[] = $modeloservicioentrada;
        }

        return $array;
    }

    function ListadoServicioEntradaFecha($fecha)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_servicio_entrada.php');

        date_default_timezone_set('America/Lima');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT ser.id_servicio_entrega as idservicio,cli.nombre as nombre,cli.apellidos as apellido,
        ser.fecha_entrada as f_entrada,ser.hora_entrada as h_entrada,ser.estado_prenda as estado_prenda,ser.comprobante as comprobante FROM 
        servicio_entradas ser,clientes cli WHERE cli.id_cliente = ser.id_cliente AND ser.fecha_entrada = '$fecha'");

        while($row = $consulta->fetch_assoc()) 
        {
            $modeloservicioentrada = new ModeloServicioEntrada();

            $modeloservicioentrada->setId_servicio_entrega($row['idservicio']);
            $modeloservicioentrada->setNombrecliente($row['nombre']);
            $modeloservicioentrada->setApellidocliente($row['apellido']);
            $modeloservicioentrada->setFecha_entrada($row['f_entrada']);
            $modeloservicioentrada->setHora_entrada($row['h_entrada']);
            $modeloservicioentrada->setEstado_prenda($row['estado_prenda']);
            $modeloservicioentrada->setComprobante($row['comprobante']);

            $array[] = $modeloservicioentrada;
        }

        return $array;
    }

    function Idusaurio($idservicioentrada)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT id_usuario FROM servicio_entradas WHERE id_servicio_entrega = '$idservicioentrada'");

        foreach($consulta as $card)
        {
            $idusuario = $card['id_usuario'];
        }

        return $idusuario;
    }

    function NombreUsuario($idusuario)
    {

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT nombre,apellidos FROM usuarios WHERE id_usuario  = '$idusuario'");

        foreach($consulta as $card)
        {
            $usuario = $card['nombre'] ." " .$card['apellidos'];
        }

        return $usuario;
    }

    function DatosServicioEntrada($idservicioentrada)
    {
        include('../../Modelo/modelo_servicio_entrada.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT fecha_entrada,hora_entrada,comprobante,estado_prenda,tipo_pago,importe_total 
        FROM servicio_entradas WHERE id_servicio_entrega = '$idservicioentrada'");

        while($row = $consulta->fetch_assoc())
        {
            $modeloservicioentrada = new ModeloServicioEntrada();

            $modeloservicioentrada->setFecha_entrada($row['fecha_entrada']);
            $modeloservicioentrada->setHora_entrada($row['hora_entrada']);
            $modeloservicioentrada->setComprobante($row['comprobante']);
            $modeloservicioentrada->setEstado_prenda($row['estado_prenda']);
            $modeloservicioentrada->setTipo_pago($row['tipo_pago']);
            $modeloservicioentrada->setImporte_total($row['importe_total']);
            
            $array[] = $modeloservicioentrada;
        }

        return $array;
    }

    function DatosServicioSalida($idservicioentrada)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_servicio_salida.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT ser.id_servicio_salida as idserviciosalida,
        ser.fecha_salida as f_salida,ser.hora_salida as h_salida,san.costo_retraso as costoretraso,ser.id_sanciones_economicas as idsanciones
        FROM servicios_salidas ser, sanciones_economicas san WHERE ser.id_sanciones_economicas = san.id_sanciones_economicas
        AND ser.id_servicio_entrega = '$idservicioentrada'");

        while($row = $consulta->fetch_assoc())
        {
            $modeloserviciosalida = new ModeloServicioSalida();

            $modeloserviciosalida->setId_servicio_salida($row['idserviciosalida']);
            $modeloserviciosalida->setFecha_salida($row['f_salida']);
            $modeloserviciosalida->setHora_salida($row['h_salida']);
            $modeloserviciosalida->setId_sanciones_economicas($row['idsanciones']);
            $modeloserviciosalida->setCostoretraso($row['costoretraso']);

            $array[] = $modeloserviciosalida;
        }

        return $array;
    }

    function TablaDetalleServicio($idservicioentrada)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_detalle_servicio.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT tipo.tipo_de_servicio as tiposervicio,deta.precio as precio,deta.unidad as unidad,deta.total as total 
        FROM detalle_servicio_entradas deta,tipo_servicios tipo WHERE deta.id_tipo_servicio = tipo.id_tipo_servicio AND deta.id_servicio_entrega = '$idservicioentrada'");

        while($row = $consulta->fetch_assoc())
        {
            $modelodetalleservicio = new ModeloDetalleServicioEntrada();

            $modelodetalleservicio->setId_tipo_servicio($row['tiposervicio']);
            $modelodetalleservicio->setPrecio($row['precio']);
            $modelodetalleservicio->setUnidad($row['unidad']);
            $modelodetalleservicio->setTotal($row['total']);

            $array[] = $modelodetalleservicio;
        }

        return $array;
    }

    function ImporteMes()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $array = array();

        for ($i=1; $i <= 12; $i++) 
        { 
            $anio = date("Y");

            if ($i >= 10)
            {
                $fechainicio = $anio . "-". $i ."-01"; 
                $fechasalida = $anio . "-". $i ."-31";
            }
            else
            {
                $fechainicio = $anio . "-0". $i ."-01";
                $fechasalida = $anio . "-0". $i ."-31";
            }
            
            $consulta = $cn->conexion()->query("SELECT SUM(importe_total) as total FROM servicio_entradas Where fecha_entrada BETWEEN '$fechainicio' AND '$fechasalida'");

            foreach($consulta as $card)
            {
               if ($card['total'] == "")
               {
                $array[] = "00.00";
               }
               else
               {
                $array[] = $card['total'];
               }
            }
        }
        return $array;
    }

    

}







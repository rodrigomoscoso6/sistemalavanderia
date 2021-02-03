<?php
class ControladorReportesxfecha
{

    function ListadoReportesxfecha()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_reportesxfecha.php');
        
       
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT sentrada.id_servicio_entrega as id_servicio, cli.nombre as nombre, cli.apellidos as apellidos, cli.dni as dni, cli.celular as celular, tservicio.tipo_de_servicio as tiposervicio,
        tservicio.medida as medida, tservicio.precio as precio, dsentrada.unidad as unidad, dsentrada.total as total, sentrada.estado_prenda as estado_prenda, sentrada.fecha_entrada as fecha_entrada,
        ssalida.fecha_salida as fecha_salida from clientes cli 
        INNER JOIN servicio_entradas sentrada on cli.id_cliente = sentrada.id_cliente 
        INNER JOIN servicios_salidas ssalida on sentrada.id_servicio_entrega = ssalida.id_servicio_entrega 
        INNER JOIN detalle_servicio_entradas dsentrada on sentrada.id_servicio_entrega = dsentrada.id_servicio_entrega 
        INNER JOIN tipo_servicios tservicio on dsentrada.id_tipo_servicio = tservicio.id_tipo_servicio");

        while($row = $consulta->fetch_assoc())
        {
            $modeloreportexfecha = new ModeloReportesxFecha();


            $modeloreportexfecha->setId_servicio_entrega($row['id_servicio']);

            $modeloreportexfecha->setNombrecliente($row['nombre']);
            $modeloreportexfecha->setApellidos($row['apellidos']);
            $modeloreportexfecha->setDni($row['dni']);       
            $modeloreportexfecha->setCelular($row['celular']);

            $modeloreportexfecha->setTipo_de_servicio($row['tiposervicio']);
            $modeloreportexfecha->setMedida($row['medida']);
            $modeloreportexfecha->setPrecio($row['precio']);

            $modeloreportexfecha->setUnidad($row['unidad']);
            $modeloreportexfecha->setTotal($row['total']);

            $modeloreportexfecha->setEstado_prenda($row['estado_prenda']);
            $modeloreportexfecha->setFecha_entrada($row['fecha_entrada']);

            $modeloreportexfecha->setFecha_salida($row['fecha_salida']);


            $array[] = $modeloreportexfecha;
            
        }

        return $array;
    }

    
    function listadoReportesFechaInicioFechaFin($fechainicio, $fechafin){
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_reportesxfecha.php');
        
       
        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT sentrada.id_servicio_entrega as id_servicio, cli.nombre as nombre, cli.apellidos as apellidos,
        cli.dni as dni, cli.celular as celular, tservicio.tipo_de_servicio as tiposervicio, 
        tservicio.medida as medida, tservicio.precio as precio, dsentrada.unidad as unidad, 
        dsentrada.total as total, sentrada.estado_prenda as estado_prenda, sentrada.fecha_entrada as fecha_entrada, ssalida.fecha_salida as fecha_salida from clientes cli 
        INNER JOIN servicio_entradas sentrada on cli.id_cliente = sentrada.id_cliente and sentrada.fecha_entrada BETWEEN '$fechainicio' AND '$fechafin' 
        INNER JOIN servicios_salidas ssalida on sentrada.id_servicio_entrega = ssalida.id_servicio_entrega 
        INNER JOIN detalle_servicio_entradas dsentrada on sentrada.id_servicio_entrega = dsentrada.id_servicio_entrega 
        INNER JOIN tipo_servicios tservicio on dsentrada.id_tipo_servicio = tservicio.id_tipo_servicio");

        while($row = $consulta->fetch_assoc())
        {
            $modeloreportexfecha = new ModeloReportesxFecha();


            $modeloreportexfecha->setId_servicio_entrega($row['id_servicio']);

            $modeloreportexfecha->setNombrecliente($row['nombre']);
            $modeloreportexfecha->setApellidos($row['apellidos']);
            $modeloreportexfecha->setDni($row['dni']);       
            $modeloreportexfecha->setCelular($row['celular']);

            $modeloreportexfecha->setTipo_de_servicio($row['tiposervicio']);
            $modeloreportexfecha->setMedida($row['medida']);
            $modeloreportexfecha->setPrecio($row['precio']);

            $modeloreportexfecha->setUnidad($row['unidad']);
            $modeloreportexfecha->setTotal($row['total']);

            $modeloreportexfecha->setEstado_prenda($row['estado_prenda']);
            $modeloreportexfecha->setFecha_entrada($row['fecha_entrada']);

            $modeloreportexfecha->setFecha_salida($row['fecha_salida']);


            $array[] = $modeloreportexfecha;
            
        }
        return $array;
        
    }

    
    function ReporteTipoServicio()
    {
        include('../../Conexion/conexion.php');

        include('../../Modelo/modelo_reportetiposervicio.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT deta.id_tipo_servicio as idtiposervicio,tipo.tipo_de_servicio as tiposervicio,tipo.medida as medida,
        tipo.descripcion as descripcion,COUNT(1) AS total FROM detalle_servicio_entradas deta,tipo_servicios tipo WHERE deta.id_tipo_servicio = tipo.id_tipo_servicio 
        GROUP BY deta.id_tipo_servicio HAVING COUNT(1) >= 1 ORDER BY total DESC");

        while($row = $consulta->fetch_assoc())
        {
            $modeloreportetiposervicio = new ModeloReporteTipoServicio();
            
            $modeloreportetiposervicio->setIdtiposervicio($row['idtiposervicio']);
            $modeloreportetiposervicio->setTiposervicio($row['tiposervicio']);
            $modeloreportetiposervicio->setMedida($row['medida']);
            $modeloreportetiposervicio->setDescripcion($row['descripcion']);
            $modeloreportetiposervicio->setTiposerviciomasusado($row['total']);

            $array[] = $modeloreportetiposervicio;
        }

        return $array;
    }

    function ReporteTipoServicioFecha($f_inicio,$f_fin)
    {
        include('../../Conexion/conexion.php');

        include('../../Modelo/modelo_reportetiposervicio.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT deta.id_tipo_servicio as idtiposervicio,tipo.tipo_de_servicio as tiposervicio,
        tipo.medida as medida, tipo.descripcion as descripcion,COUNT(1) AS total 
        FROM detalle_servicio_entradas deta,tipo_servicios tipo, servicio_entradas ser 
        WHERE deta.id_tipo_servicio = tipo.id_tipo_servicio AND deta.id_servicio_entrega = ser.id_servicio_entrega 
        AND ser.fecha_entrada BETWEEN '$f_inicio' AND '$f_fin' GROUP BY deta.id_tipo_servicio 
        HAVING COUNT(1) >= 1 ORDER BY total DESC");

        while($row = $consulta->fetch_assoc())
        {
            $modeloreportetiposervicio = new ModeloReporteTipoServicio();
            
            $modeloreportetiposervicio->setIdtiposervicio($row['idtiposervicio']);
            $modeloreportetiposervicio->setTiposervicio($row['tiposervicio']);
            $modeloreportetiposervicio->setMedida($row['medida']);
            $modeloreportetiposervicio->setDescripcion($row['descripcion']);
            $modeloreportetiposervicio->setTiposerviciomasusado($row['total']);

            $array[] = $modeloreportetiposervicio;
        }

        return $array;
    }


    function ReporteUsuarios()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_cliente.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT usu.id_usuario as idusuario,usu.nombre as nombre,usu.apellidos as apellido,rol.rol_nombre as rol,COUNT(1) AS cantidadservicio 
        FROM usuarios usu, servicio_entradas ser, detalle_servicio_entradas deta,roles rol,tipo_servicios tipo 
        WHERE usu.id_rol = rol.id_rol AND ser.id_usuario = usu.id_usuario AND tipo.id_tipo_servicio = deta.id_tipo_servicio 
        AND ser.id_servicio_entrega = deta.id_servicio_entrega GROUP BY usu.id_usuario HAVING COUNT(1) >= 1 ORDER BY cantidadservicio DESC");

        while($row = $consulta->fetch_assoc())
        {
            $modelocliente = new ModeloCliente();

            $modelocliente->setId_cliente($row['idusuario']);
            $modelocliente->setNombre($row['nombre']);
            $modelocliente->setApellidos($row['apellido']);
            $modelocliente->setRol($row['rol']);
            $modelocliente->setCantidadservicio($row['cantidadservicio']);

            $array[] = $modelocliente;

        }

        return $array;
        
    }

    function ReporteUsuariosFechas($f_inicio,$f_fin)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_cliente.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT usu.id_usuario as idusuario,usu.nombre as nombre,
        usu.apellidos as apellido,rol.rol_nombre as rol,COUNT(1) AS cantidadservicio FROM 
        usuarios usu, servicio_entradas ser, detalle_servicio_entradas deta,roles rol,tipo_servicios tipo 
        WHERE usu.id_rol = rol.id_rol AND ser.id_usuario = usu.id_usuario AND tipo.id_tipo_servicio = deta.id_tipo_servicio 
        AND ser.id_servicio_entrega = deta.id_servicio_entrega AND ser.fecha_entrada BETWEEN '$f_inicio' AND '$f_fin' 
        GROUP BY usu.id_usuario HAVING COUNT(1) >= 1 ORDER BY cantidadservicio DESC");

        while($row = $consulta->fetch_assoc())
        {
            $modelocliente = new ModeloCliente();

            $modelocliente->setId_cliente($row['idusuario']);
            $modelocliente->setNombre($row['nombre']);
            $modelocliente->setApellidos($row['apellido']);
            $modelocliente->setRol($row['rol']);
            $modelocliente->setCantidadservicio($row['cantidadservicio']);

            $array[] = $modelocliente;

        }

        return $array;
        
    }

    function ReporteCostos()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_costos.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT cost.id_costos as idcostos,cost.costo_maquina_lavadora as costolavadora,cost.costo_maquina_secadora as costosecadora,
        cost.costo_maquina_energia as costoenergia,cost.costo_maquina_agua as costoagua,cost.costo_maquina_gas as costogas,cost.costo_maquina_empaque as costoempaque,
        cost.cloro_gramos as clorogramos,cost.cloro_costo as clorocosto,cost.detergente_gramos as detergentegramos,cost.detergente_costo as detergentecosto,cost.suavisante_gramos as suavisantegramos,
        cost.suavisante_costo as suavisantecosto,cost.total_costo as totalcosto,cost.insumos as insumos,cost.utilidadxtipo as utilidadxtipo,tipo.tipo_de_servicio as tiposervicio,tipo.precio as precio
        FROM costos cost, tipo_servicios tipo WHERE cost.id_tipo_servicio = tipo.id_tipo_servicio");

        while($row = $consulta->fetch_assoc())
        {
            $modelocostos = new ModeloCostos();

            $modelocostos->setId_costos($row['idcostos']);
            $modelocostos->setCosto_maquina_lavadora($row['costolavadora']);
            $modelocostos->setCosto_maquina_secadora($row['costosecadora']);
            $modelocostos->setCosto_maquina_energia($row['costoenergia']);
            $modelocostos->setCosto_maquina_agua($row['costoagua']);
            $modelocostos->setCosto_maquina_gas($row['costogas']);
            $modelocostos->setCosto_maquina_empaque($row['costoempaque']);
            $modelocostos->setCloro_gramos($row['clorogramos']);
            $modelocostos->setCloro_costo($row['clorocosto']);
            $modelocostos->setDetergente_gramos($row['detergentegramos']);
            $modelocostos->setDetergente_costo($row['detergentecosto']);
            $modelocostos->setSuavisante_gramos($row['suavisantegramos']);
            $modelocostos->setSuavisante_costo($row['suavisantecosto']);
            $modelocostos->setTotal_costo($row['totalcosto']);
            $modelocostos->setInsumos($row['insumos']);
            $modelocostos->setUtilidadxtipo($row['utilidadxtipo']);
            $modelocostos->setTiposervicio($row['tiposervicio']);
            $modelocostos->setPrecio($row['precio']);

            $array[] = $modelocostos;

        }

        return $array;
        
    }

}

?>
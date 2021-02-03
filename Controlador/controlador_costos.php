<?php

class ControladorCostos{

    function InsertarCostos($modelocostos)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('INSERT INTO costos(`id_costos`, `costo_maquina_lavadora`, 
        `costo_maquina_secadora`, `costo_maquina_energia`, `costo_maquina_agua`, `costo_maquina_gas`, 
        `costo_maquina_empaque`, `cloro_gramos`, `cloro_costo`, `detergente_gramos`, `detergente_costo`, 
        `suavisante_gramos`, `suavisante_costo`, `total_costo`, `insumos`, `utilidadxtipo`, `id_tipo_servicio`)
        VALUES("'.$modelocostos->getId_costos().'","'.$modelocostos->getCosto_maquina_lavadora().'","'.$modelocostos->getCosto_maquina_secadora().'","'.$modelocostos->getCosto_maquina_energia().'",
        "'.$modelocostos->getCosto_maquina_agua().'","'.$modelocostos->getCosto_maquina_gas().'","'.$modelocostos->getCosto_maquina_empaque().'","'.$modelocostos->getCloro_gramos().'",
        "'.$modelocostos->getCloro_costo().'","'.$modelocostos->getDetergente_gramos().'","'.$modelocostos->getDetergente_costo().'","'.$modelocostos->getSuavisante_gramos().'",
        "'.$modelocostos->getSuavisante_costo().'","'.$modelocostos->getTotal_costo().'","'.$modelocostos->getInsumos().'","'.$modelocostos->getUtilidadxtipo().'","'.$modelocostos->getId_tipo_servicio().'")');

        if($consulta)
        {
            $mensaje = "ok";
        }
        else
        {
            $mensaje = "error";
        }

        return $mensaje;
    }

    function EditarCosto($modelocostos)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query('UPDATE costos SET costo_maquina_lavadora = "'.$modelocostos->getCosto_maquina_lavadora().'",
        costo_maquina_secadora = "'.$modelocostos->getCosto_maquina_secadora().'",costo_maquina_energia = "'.$modelocostos->getCosto_maquina_energia().'",
        costo_maquina_agua = "'.$modelocostos->getCosto_maquina_agua().'",costo_maquina_gas = "'.$modelocostos->getCosto_maquina_gas().'",
        costo_maquina_empaque = "'.$modelocostos->getCosto_maquina_empaque().'",cloro_gramos = "'.$modelocostos->getCloro_gramos().'",
        cloro_costo = "'.$modelocostos->getCloro_costo().'",detergente_gramos = "'.$modelocostos->getDetergente_gramos().'",
        detergente_costo = "'.$modelocostos->getDetergente_costo().'",suavisante_gramos = "'.$modelocostos->getSuavisante_gramos().'",
        suavisante_costo = "'.$modelocostos->getSuavisante_costo().'",total_costo = "'.$modelocostos->getTotal_costo().'",insumos = "'.$modelocostos->getInsumos().'",
        utilidadxtipo = "'.$modelocostos->getUtilidadxtipo().'",id_tipo_servicio = "'.$modelocostos->getId_tipo_servicio().'" WHERE id_costos = "'.$modelocostos->getId_costos().'"');

        if($consulta)
        {
            $mensaje = "ok";
        }
        else
        {
            $mensaje = "error";
        }

        return $mensaje;

    } 

    function EliminarCosto($idcostos)
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("DELETE FROM costos WHERE id_costos = '$idcostos'");

        if($consulta)
        {
            $mensaje = "ok";
        }
        else
        {
            $mensaje = "error";
        }

        return $mensaje;

    }


    function MostrarCodigoCostos()
    {
        include('../../Conexion/conexion.php');

        $cn = new Conexion();

        $consulta = $cn->conexion()->query("SELECT MAX(id_costos) as idcostos FROM costos");

        foreach($consulta as $card)
        {
            $idcostos = $card['idcostos'];
        }

        return $idcostos;
    }

    function PrecioTipoServicio($precio,$idtiposervicio)
    {
        $cn = new Conexion();

        $consulta = $cn->conexion()->query("UPDATE tipo_servicios SET precio = '$precio' WHERE id_tipo_servicio = '$idtiposervicio'");

        if($consulta)
        {
            $mensaje = "ok";
        }
        else
        {
            $mensaje = "error";
        }

        return $mensaje;
    }

    function ListadoCosto()
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_costos.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT cost.id_costos as idcosto,cost.costo_maquina_lavadora as lavadora,cost.costo_maquina_secadora as secadora,
        cost.costo_maquina_energia as energia,cost.costo_maquina_agua as agua,cost.costo_maquina_gas as gas,cost.costo_maquina_empaque as empaque,cost.cloro_gramos as clorogramos,
        cost.cloro_costo as clorocosto,cost.detergente_gramos as detergentegramos,cost.detergente_costo as detergentecosto,cost.suavisante_gramos as suavisantegramos,cost.suavisante_costo as suavisantecosto,
        cost.total_costo as totalcosto,cost.insumos as insumos,cost.utilidadxtipo as utilidad,tipo.tipo_de_servicio as tiposervicio FROM costos cost,tipo_servicios tipo 
        WHERE cost.id_tipo_servicio = tipo.id_tipo_servicio");

        while($row = $consulta->fetch_assoc())
        {
            $modelocostos = new ModeloCostos();

            $modelocostos->setId_costos($row['idcosto']);
            $modelocostos->setCosto_maquina_lavadora($row['lavadora']);
            $modelocostos->setCosto_maquina_secadora($row['secadora']);
            $modelocostos->setCosto_maquina_energia($row['energia']);
            $modelocostos->setCosto_maquina_agua($row['agua']);
            $modelocostos->setCosto_maquina_gas($row['gas']);
            $modelocostos->setCosto_maquina_empaque($row['empaque']);
            $modelocostos->setCloro_gramos($row['clorogramos']);
            $modelocostos->setCloro_costo($row['clorocosto']);
            $modelocostos->setDetergente_gramos($row['detergentegramos']);
            $modelocostos->setDetergente_costo($row['detergentecosto']);
            $modelocostos->setSuavisante_gramos($row['suavisantegramos']);
            $modelocostos->setSuavisante_costo($row['suavisantecosto']);
            $modelocostos->setTotal_costo($row['totalcosto']);
            $modelocostos->setInsumos($row['insumos']);
            $modelocostos->setUtilidadxtipo($row['utilidad']);
            $modelocostos->setId_tipo_servicio($row['tiposervicio']);

            $array[] = $modelocostos;
        }

        return $array;
    }

    function BuscarId($idcostos)
    {
        include('../../Conexion/conexion.php');
        include('../../Modelo/modelo_costos.php');

        $cn = new Conexion();

        $array = array();

        $consulta = $cn->conexion()->query("SELECT cost.id_costos as idcosto,cost.costo_maquina_lavadora as 
        lavadora,cost.costo_maquina_secadora as secadora, cost.costo_maquina_energia as energia,cost.costo_maquina_agua as agua,
        cost.costo_maquina_gas as gas,cost.costo_maquina_empaque as empaque,cost.cloro_gramos as clorogramos, 
        cost.cloro_costo as clorocosto,cost.detergente_gramos as detergentegramos,cost.detergente_costo as 
        detergentecosto,cost.suavisante_gramos as suavisantegramos,cost.suavisante_costo as suavisantecosto,tipo.precio as precio, 
        cost.total_costo as totalcosto,cost.insumos as insumos,cost.utilidadxtipo as utilidad,cost.id_tipo_servicio as idtiposervicio 
        FROM costos cost,tipo_servicios tipo WHERE cost.id_tipo_servicio = tipo.id_tipo_servicio 
        AND cost.id_costos = '$idcostos'");

        while($row = $consulta->fetch_assoc())
        {
            $modelocostos = new ModeloCostos();

            $modelocostos->setId_costos($row['idcosto']);
            $modelocostos->setCosto_maquina_lavadora($row['lavadora']);
            $modelocostos->setCosto_maquina_secadora($row['secadora']);
            $modelocostos->setCosto_maquina_energia($row['energia']);
            $modelocostos->setCosto_maquina_agua($row['agua']);
            $modelocostos->setCosto_maquina_gas($row['gas']);
            $modelocostos->setCosto_maquina_empaque($row['empaque']);
            $modelocostos->setCloro_gramos($row['clorogramos']);
            $modelocostos->setCloro_costo($row['clorocosto']);
            $modelocostos->setDetergente_gramos($row['detergentegramos']);
            $modelocostos->setDetergente_costo($row['detergentecosto']);
            $modelocostos->setSuavisante_gramos($row['suavisantegramos']);
            $modelocostos->setSuavisante_costo($row['suavisantecosto']);
            $modelocostos->setTotal_costo($row['totalcosto']);
            $modelocostos->setInsumos($row['insumos']);
            $modelocostos->setUtilidadxtipo($row['utilidad']);
            $modelocostos->setId_tipo_servicio($row['idtiposervicio']);
            $modelocostos->setPrecio($row['precio']);

            $array[] = $modelocostos;
        }

        return $array;
    }

}





?>
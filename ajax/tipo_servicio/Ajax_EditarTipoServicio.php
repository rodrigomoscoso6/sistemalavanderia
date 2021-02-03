<?php

include('../../Modelo/modelo_tipo_servicio.php');
include('../../Controlador/controlador_tipo_servicio.php');

$modelotiposervicio = new ModeloTipoServicio();

$modelotiposervicio->setId_tipo_servicio($_POST['idtiposervicio']);
$modelotiposervicio->setTipo_de_servicio($_POST['tiposervicio']);
$modelotiposervicio->setMedida($_POST['medida']);
$modelotiposervicio->setPrecio($_POST['precio']);
$modelotiposervicio->setDescripcion($_POST['descripcion']);

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->ModificarTipoServicio($modelotiposervicio);

echo $resultado;

?>
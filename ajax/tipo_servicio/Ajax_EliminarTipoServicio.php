<?php

include('../../Modelo/modelo_tipo_servicio.php');
include('../../controlador/controlador_tipo_servicio.php');

$modelotiposervicio = new ModeloTipoServicio();

$modelotiposervicio->setId_tipo_servicio($_POST['idtiposervicio']);

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->EliminarTipoServicio($modelotiposervicio);

echo $resultado;


?>
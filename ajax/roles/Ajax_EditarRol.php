<?php

include('../../Modelo/modelo_roles.php');
include('../../Controlador/controlador_rol.php');

$modeloroles = new ModeloRoles();

$modeloroles->setId_rol($_POST['idrol2']);
$modeloroles->setRol_nombre($_POST['nombrerol2']);

$controladorroles = new ControladorRol();

$resultado = $controladorroles->EditarRol($modeloroles);

echo $resultado;

?>
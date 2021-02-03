<?php

include('../../Modelo/modelo_roles.php');
include('../../Controlador/controlador_rol.php');

$modeloroles = new ModeloRoles();

$modeloroles->setId_rol($_POST['idrol']);
$modeloroles->setRol_nombre($_POST['nombrerol']);

$controladorrol = new ControladorRol();

$resultado = $controladorrol->RegistrarRol($modeloroles);

echo $resultado;


?>
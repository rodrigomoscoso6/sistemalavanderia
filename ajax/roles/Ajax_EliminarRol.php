<?php

include('../../Modelo/modelo_roles.php');
include('../../controlador/controlador_rol.php');

$modeloroles = new ModeloRoles();

$modeloroles->setId_rol($_POST['idrol']);

$controladorrol = new ControladorRol();

$resultado = $controladorrol->EliminarRol($modeloroles);

echo $resultado;


?>
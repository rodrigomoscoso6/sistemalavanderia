<?php

include('../../Modelo/modelo_usuarios.php');
include('../../Controlador/controlador_usuario.php');

$modelousuarios = new ModeloUsuario();

$modelousuarios->setUsuario($_POST['usuario']);
$modelousuarios->setNombre($_POST['nombre']);
$modelousuarios->setApellidos($_POST['apellidos']);
$modelousuarios->setSexo($_POST['sexo']);
$modelousuarios->setEstado($_POST['estado']);
$modelousuarios->setId_rol($_POST['roles']);
$modelousuarios->setId_usuario($_POST['idusuario']);

$controladorusuarios = new ControladorUsuario();

$resultado = $controladorusuarios->EditarUsuario($modelousuarios);

echo $resultado;



?>
<?php

include('../../Modelo/modelo_usuarios.php');
include('../../controlador/controlador_usuario.php');

$modelousuario = new ModeloUsuario();

$modelousuario->setId_usuario($_POST['idusuario']);

$controladorusuario = new ControladorUsuario();

$resultado = $controladorusuario->EliminarUsuario($modelousuario);

echo $resultado;


?>
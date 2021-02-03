<?php

include('../../Controlador/controlador_usuario.php');

$controladorusuario = new ControladorUsuario();

$result = $controladorusuario->CantidadUsuarios();

echo $result;

?>
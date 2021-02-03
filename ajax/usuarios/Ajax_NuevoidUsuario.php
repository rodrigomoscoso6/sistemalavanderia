<?php

include('../../Modelo/modelo_usuarios.php');
include('../../Controlador/controlador_usuario.php');

$controladorusuario = new ControladorUsuario();

$num = $controladorusuario->NuevoId();

$result = $num + 1;

echo "<input type='hidden' name='idusuario' id='idusuario' value='$result'>";

?>
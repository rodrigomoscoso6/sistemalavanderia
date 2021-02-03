<?php

include('../../Modelo/modelo_roles.php');
include('../../Controlador/controlador_rol.php');

$controladorrol = new ControladorRol();

$num = $controladorrol->NuevoIdRol();

$result = $num + 1;

echo "<input type='hidden' name='idrol' id='idrol' value='$result'>";


?>
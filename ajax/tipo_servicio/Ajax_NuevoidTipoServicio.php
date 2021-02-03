<?php

include('../../Modelo/modelo_tipo_servicio.php');
include('../../Controlador/controlador_tipo_servicio.php');

$controladortiposervicio = new ControladorTipoServicio();

$num = $controladortiposervicio->NuevoIdTipoServicio();

$result = $num + 1;

echo "<input type='hidden' name='idtiposervicio' id='idtiposervicio' value='$result'>";

?>
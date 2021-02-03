<?php

include('../../Controlador/controlador_servicio_salida.php');

$controladorserviciosalida = new ControladorServicioSalida();

$result = $controladorserviciosalida->NuevoIdServicioSalida();

$sum = $result + 1;

echo "<input value='$sum' type='hidden' name='idserviciosalida' id='idserviciosalida'>";

?>
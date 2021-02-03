<?php

include('../../Controlador/controlador_sanciones_economicas.php');

$controladorsanciones = new ControladorSancionesEconomicas();

$sum = $controladorsanciones->IdSancionesEconomicas();

$resultado = $sum + 1;

echo $resultado;

?>
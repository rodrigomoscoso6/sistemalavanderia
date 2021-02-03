<?php

include('../../Controlador/controlador_costos.php');

$controladorcostos = new ControladorCostos();

$resultado = $controladorcostos->MostrarCodigoCostos();

$nuevoid = $resultado + 1;

echo "<input type='hidden' name='idcostos' value='$nuevoid'>";

?>
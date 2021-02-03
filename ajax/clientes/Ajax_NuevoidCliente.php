<?php

include('../../Modelo/modelo_cliente.php');
include('../../Controlador/controlador_cliente.php');

$controladorcliente = new ControladorCliente();

$num = $controladorcliente->NuevoIdCliente();

$result = $num + 1;

echo "<input type='hidden' name='idcliente' id='idcliente' value='$result'>";


?>
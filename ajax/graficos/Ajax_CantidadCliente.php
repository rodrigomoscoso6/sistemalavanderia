<?php

include('../../Controlador/controlador_cliente.php');

$controladorcliente = new ControladorCliente();

$result = $controladorcliente->CantidadCliente();

echo $result;

?>
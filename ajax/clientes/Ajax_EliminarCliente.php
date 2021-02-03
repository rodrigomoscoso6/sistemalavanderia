<?php

include('../../Modelo/modelo_cliente.php');
include('../../controlador/controlador_cliente.php');

$modelocliente = new ModeloCliente();

$modelocliente->setId_cliente($_POST['idcliente']);

$controladorcliente = new ControladorCliente();

$resultado = $controladorcliente->EliminarCliente($modelocliente);

echo $resultado;

?>
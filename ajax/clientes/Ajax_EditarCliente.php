<?php

include('../../Modelo/modelo_cliente.php');
include('../../Controlador/controlador_cliente.php');

$modelocliente = new ModeloCliente();

$modelocliente->setNombre($_POST['nombre']);
$modelocliente->setApellidos($_POST['apellidos']);
$modelocliente->setDni($_POST['dni']);
$modelocliente->setDireccion($_POST['direccion']);
$modelocliente->setCelular($_POST['celular']);
$modelocliente->setCorreo($_POST['correo']);
$modelocliente->setId_cliente($_POST['idcliente']);

$controladorcliente = new ControladorCliente();

$resultado = $controladorcliente->ModificarCliente($modelocliente);

echo $resultado;

?>
<?php

include('../../Modelo/modelo_cliente.php');
include('../../Controlador/controlador_cliente.php');

$controladorcliente = new ControladorCliente();

if ($controladorcliente->VerficarDNI($_POST['dni']) == "YaExiste") 
{
    echo "Ya existe el dni: " . $_POST['dni'];
}


else
{
    $modelocliente = new ModeloCliente();

    $modelocliente->setId_cliente($_POST['idcliente']);
    $modelocliente->setNombre($_POST['nombre']);
    $modelocliente->setApellidos($_POST['apellidos']);
    $modelocliente->setDni($_POST['dni']);
    $modelocliente->setCorreo($_POST['correo']);
    $modelocliente->setDireccion($_POST['direccion']);
    $modelocliente->setCelular($_POST['celular']);

    $resultado = $controladorcliente->InsertarCliente($modelocliente);

    echo $resultado;
}

?>
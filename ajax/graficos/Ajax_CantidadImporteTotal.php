<?php

include('../../Controlador/controlador_servicio_entrada.php');

$controladorservicioentrada = new ControladorServicioEntrada();

$result = $controladorservicioentrada->CantidadImporteTotal();

if ($result == "") 
{
    echo "00.00";
}
else
{
    echo $result;
}

?>
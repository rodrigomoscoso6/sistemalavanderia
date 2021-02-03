<?php

$idcosto = $_POST['idcosto'];

include('../../Controlador/controlador_tipo_servicio.php');

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->ListadoTipoServicio();

echo "<label >Tipo de Servicio:</label>";
echo "<select name='tiposervicio2' class='form-control' id='tiposervicio'>";
echo "<option value='0' >SELECCIONE UN TIPO DE SERVICIO</option>";
foreach($resultado as $card)
{
    if($card->getId_tipo_servicio() == $idcosto)
    {
        echo '<option selected value='. $card->getId_tipo_servicio() . '>'. $card->getTipo_de_servicio() .'</option>';
    }
    else
    {
        echo '<option value='. $card->getId_tipo_servicio() . '>'. $card->getTipo_de_servicio() .'</option>';
    }
}
echo "</select>"; 



?>
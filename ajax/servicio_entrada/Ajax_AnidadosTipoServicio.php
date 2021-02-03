<?php
include('../../Controlador/controlador_tipo_servicio.php');

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->ListadoTipoServicio();

echo "<label >Tipo de Servicio:</label>";
echo "<select name='tiposervicio' class='form-control' id='tiposervicio'>";
echo "<option value='0' >SELECCIONE UN TIPO DE SERVICIO</option>";
foreach($resultado as $card)
{
    echo '<option value='. $card->getId_tipo_servicio() . '>'. $card->getTipo_de_servicio() .'</option>';
}
echo "</select>"; 

?>
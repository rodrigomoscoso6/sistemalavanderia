<?php

include('../../Controlador/controlador_reportes.php');

$f_inicio = $_REQUEST['f_inicio'];
$f_fin = $_REQUEST['f_fin'];

$controladorreporte = new ControladorReportesxfecha();

$resultado = $controladorreporte->ReporteTipoServicioFecha($f_inicio,$f_fin);

echo "<table id='reportetiposervicio' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >Idtiposervicio</th>
            <th >Tiposervicio</th>
            <th >Medida</th>
            <th >Descripcion</th>
            <th >TipoServisioMasUsado</th>

        </tr>
    </thead>
    <tbody>";

foreach($resultado as $card) 
{ 
    echo "<tr>
        <td>" . $card->getIdtiposervicio() . "</td>
        <td>" . $card->getTiposervicio() . "</td>
        <td>" . $card->getMedida() . "</td>
        <td>" . $card->getDescripcion() . "</td>
        <td>" . $card->getTiposerviciomasusado() . "</td>
    </tr>";
}

echo "</tbody>
</table>";

?>
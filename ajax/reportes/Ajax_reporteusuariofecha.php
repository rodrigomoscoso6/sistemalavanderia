<?php

include('../../Controlador/controlador_reportes.php');

$f_inicio = $_REQUEST['f_inicio'];
$f_fin = $_REQUEST['f_fin'];

$controladorreportes = new ControladorReportesxfecha();

$resultado = $controladorreportes->ReporteUsuariosFechas($f_inicio,$f_fin);

echo "<table id='reporteusuario' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >IdUsuario</th>
            <th >Nombre</th>
            <th >Apellido</th>
            <th >Rol</th>
            <th >Cantidad Servicio Realizado</th>
        </tr>
    </thead>
    <tbody>";

foreach($resultado as $card) 
{ 
    echo "<tr style='text-align:center;'>
        <td>" . $card->getId_cliente() . "</td>
        <td>" . $card->getNombre() . "</td>
        <td>" . $card->getApellidos() . "</td>
        <td>" . $card->getRol() . "</td>
        <td>" . $card->getCantidadservicio() . "</td>
    </tr>";
}

echo "</tbody>
</table>";





?>
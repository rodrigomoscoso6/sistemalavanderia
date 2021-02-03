<?php

include('../../Controlador/controlador_servicio_entrada.php');

$controladordetalleservicio = new ControladorServicioEntrada();

$resultado = $controladordetalleservicio->TablaDetalleServicio($_REQUEST['idservicioentrada']);

$totaltotal = 0;

echo "<table id='tablaservicios' class='table ' style='width:100%'>
        <thead class='text-center'>
            <tr>          
                <th >Tipo Servicio</th>
                <th >Medida</th>
                <th >Precio</th>
                <th >Total</th>              
            </tr>
        </thead>
        <tbody>";
        foreach($resultado as $fila)
        {   
            $totaltotal = $totaltotal + $fila->getTotal();
            echo "<tr style='cursor:pointer;text-align: center;'>            
                <td>". $fila->getId_tipo_servicio() ."</td>
                <td>". $fila->getUnidad() ."</td>
                <td>". number_format($fila->getPrecio(),2) ."</td>
                <td>". number_format($fila->getTotal(),2) ."</td>                          
            </tr>";
        }
echo "<tr>
    <td colspan='3' style='text-align: right;'>" . "Importe Total: " . "</td>
    <td style='text-align: center;' id='importetotal' >" . "S/." . number_format($totaltotal,2) . "</td>
    </tr>";  
echo "</tbody>
    </table>";

?>
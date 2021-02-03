<?php

include('../../Controlador/controlador_reportes.php');

$controladorreportesxfecha = new ControladorReportesxfecha();

$result = $controladorreportesxfecha->ListadoReportesxfecha();

echo "<table id='tablaxfecha' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >Id</th>
            <th >Nombre Cliente</th>
            <th >Apellidos Cliente</th>
            <th >DNI</th>
            <th >Celular</th>
            <th >Tipo_Servicio</th>
            <th >Medida</th>
            <th >Precio</th>
            <th >Unidad</th>
            <th >Total</th>
            <th >Estado Prenda</th>  
            <th >Fecha Entrada</th>  
            <th >Fecha Salida</th>    
        </tr>
    </thead>
    <tbody>";
    foreach($result as $card)
    {
    $idservicioentrada = $card->getId_servicio_entrega();
    echo "<tr style='cursor:pointer;'> 
            <td>". $card->getId_servicio_entrega() ."</td>
            <td>". $card->getNombrecliente() ."</td>
            <td>". $card->getApellidos() ."</td>
            <td>". $card->getDni() ."</td>
            <td>". $card->getCelular() ."</td>
            <td>". $card->getTipo_de_servicio() ."</td>
            <td>". $card->getMedida() ."</td>
            <td>". $card->getPrecio() ."</td>
            <td>". $card->getUnidad() ."</td>
            <td>". $card->getTotal() ."</td>
            <td>". $card->getEstado_prenda() ."</td>
            <td>". $card->getFecha_entrada() ."</td>
            <td>". $card->getFecha_salida() ."</td>                    
        </tr>";
    }
        
echo "</tbody>
</table>";

?>
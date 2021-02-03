<?php

include('../../Controlador/controlador_reportes.php');

$controladorreportes = new ControladorReportesxfecha();

$resultado = $controladorreportes->ReporteCostos();

echo "<table id='reportecostos' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >idcostos</th>
            <th >costolavadora</th>
            <th >costosecadora</th>
            <th >costoenergia</th>
            <th >costoagua</th>
            <th >costogas</th>
            <th >costoempaque</th>
            <th >clorogramos</th>
            <th >clorocosto</th>
            <th >detergentegramos</th>
            <th >detergentecosto</th>
            <th >suavisantegramos</th>
            <th >suavisantecosto</th>
            <th >totalcosto</th>
            <th >insumos</th>
            <th >utilidadxtipo</th>
            <th >tiposervicio</th>
            <th >precio</th>
        </tr>
    </thead>
    <tbody>";

foreach($resultado as $card) 
{ 
    echo "<tr style='text-align:center;'>
        <td>" . $card->getId_costos() . "</td>
        <td>" . $card->getCosto_maquina_lavadora() . "</td>
        <td>" . $card->getCosto_maquina_secadora() . "</td>
        <td>" . $card->getCosto_maquina_energia() . "</td>
        <td>" . $card->getCosto_maquina_agua() . "</td>
        <td>" . $card->getCosto_maquina_gas() . "</td>
        <td>" . $card->getCosto_maquina_empaque() . "</td>
        <td>" . $card->getCloro_gramos() . "</td>
        <td>" . $card->getCloro_costo() . "</td>
        <td>" . $card->getDetergente_gramos() . "</td>
        <td>" . $card->getDetergente_costo() . "</td>
        <td>" . $card->getSuavisante_gramos() . "</td>
        <td>" . $card->getSuavisante_costo() . "</td>
        <td>" . $card->getTotal_costo() . "</td>
        <td>" . $card->getInsumos() . "</td>
        <td>" . $card->getUtilidadxtipo() . "</td>
        <td>" . $card->getTiposervicio() . "</td>
        <td>" . $card->getPrecio() . "</td>
    </tr>";
}

echo "</tbody>
</table>";





?>
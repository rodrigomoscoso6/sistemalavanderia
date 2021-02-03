<?php

include('../../Controlador/controlador_servicio_entrada.php');

$controladorservicioentrada = new ControladorServicioEntrada();

$result = $controladorservicioentrada->ListadoServicioEntrada();

echo "<table id='tablaservicioentrada2' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >Id</th>
            <th >Nombre Cliente</th>
            <th >Apellidos Cliente</th>
            <th >Fecha Entrada</th>
            <th >Hora Entrada</th>
            <th >Estado Prenda</th>
            <th >Comprobante</th>
            <th >Accion</th>   
        </tr>
    </thead>
    <tbody>";
    foreach($result as $card)
    {
    $idservicioentrada = $card->getId_servicio_entrega();
    $estadoprenda = $card->getEstado_prenda();
    if ($estadoprenda == "Entregado")
    {
        echo "<tr style='cursor:pointer;'> 
            <td>". $card->getId_servicio_entrega() ."</td>
            <td>". $card->getNombrecliente() ."</td>
            <td>". $card->getApellidocliente() ."</td>
            <td>". $card->getFecha_entrada() ."</td>
            <td>". $card->getHora_entrada() ."</td>
            <td>". $card->getEstado_prenda() ."</td>
            <td>". $card->getComprobante() ."</td>
            <td>"."<button type='button' id='eliminar$idservicioentrada' class='eliminar btn btn-primary'>Eliminar</button>" .                      
        "</tr>";
    }
    else
    {
        echo "<tr style='cursor:pointer;'> 
            <td>". $card->getId_servicio_entrega() ."</td>
            <td>". $card->getNombrecliente() ."</td>
            <td>". $card->getApellidocliente() ."</td>
            <td>". $card->getFecha_entrada() ."</td>
            <td>". $card->getHora_entrada() ."</td>
            <td>". $card->getEstado_prenda() ."</td>
            <td>". $card->getComprobante() ."</td>
            <td>"."<button type='button' id='editar$idservicioentrada' class='modificar btn btn-primary'>Editar</button>" .                      
        "</tr>";
    }

    }
        
echo "</tbody>
</table>";

?>
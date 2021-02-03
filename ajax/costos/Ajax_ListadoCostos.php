<?php

include('../../Controlador/controlador_costos.php');

$controladorcostos = new ControladorCostos();

$resultado = $controladorcostos->ListadoCosto();

echo "<table id='tablacliente' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >IdCostos</th>
            <th >CostoLavadora</th>
            <th >CostoSecadora</th>
            <th >CostoEnergia</th>
            <th >CostoAgua</th>
            <th >CostoGas</th>
            <th >CostoEmpaque</th>
            <th >GramoCloro</th>
            <th >CostoCloro</th>
            <th >GramoDetergente</th>
            <th >CostoDetergente</th>
            <th >GramoSuavisante</th>
            <th >CostoSuavisante</th>
            <th >TotalCosto</th>
            <th >Insumos</th>
            <th >UtilidadxTipo</th>
            <th >TipoServicio</th>
            <th >Accion</th>   
        </tr>
    </thead>
    <tbody>";
    foreach($resultado as $card) 
    {
    $idcostos = $card->getId_costos();
    echo "<tr style='cursor:pointer;'> 
            <td>". $card->getId_costos() ."</td>
            <td>". $card->getCosto_maquina_lavadora() ."</td>
            <td>". $card->getCosto_maquina_secadora() ."</td>
            <td>". $card->getCosto_maquina_energia() ."</td>
            <td>". $card->getCosto_maquina_agua() ."</td>
            <td>". $card->getCosto_maquina_gas() ."</td>
            <td>". $card->getCosto_maquina_empaque() ."</td>
            <td>". $card->getCloro_gramos() ."</td>
            <td>". $card->getCloro_costo() ."</td>
            <td>". $card->getDetergente_gramos() ."</td>
            <td>". $card->getDetergente_costo() ."</td>
            <td>". $card->getSuavisante_gramos() ."</td>
            <td>". $card->getSuavisante_costo() ."</td>
            <td>". $card->getTotal_costo() ."</td>
            <td>". $card->getInsumos() ."</td>
            <td>". $card->getUtilidadxtipo() ."</td>
            <td>". $card->getId_tipo_servicio() ."</td>
            <td>"."<button type='button' id='editar$idcostos' class='modificar btn p4 btn btn-primary' data-toggle='modal' data-target='#ModalEditar' >Editar</button>"." ".
            "<button type='button' id='eliminar$idcostos' class='eliminar  btn btn-primary'>Eliminar</button>" ."</td>            
        </tr>";
    }
        
echo "</tbody>
</table>";




?>
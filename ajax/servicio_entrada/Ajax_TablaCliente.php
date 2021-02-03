<?php

include('../../Controlador/controlador_cliente.php');

$controladorcliente = new ControladorCliente();

$result = $controladorcliente->ListadoCliente();

echo "<table id='tablacliente2' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >IdCliente</th>
            <th >Nombre</th>
            <th >Apellidos</th>
            <th >Dni</th>
            <th >Direccion</th>
            <th >Celular</th>              
        </tr>
    </thead>
    <tbody>";
    foreach($result as $card)
    {
    $idcliente = $card->getId_cliente();
    echo "<tr style='cursor:pointer;'> 
            <td>". $card->getId_cliente() ."</td>
            <td>". $card->getNombre() ."</td>
            <td>". $card->getApellidos() ."</td>
            <td>". $card->getDni() ."</td>
            <td>". $card->getDireccion() ."</td>
            <td>". $card->getCelular() ."</td>                      
        </tr>";
    }
        
echo "</tbody>
</table>";

?>
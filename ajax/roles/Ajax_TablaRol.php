<?php

include('../../Controlador/controlador_rol.php');

$controladorrol = new ControladorRol();

$result = $controladorrol->ListadoRoles();

echo "<table id='tablaroles' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >IdRol</th>
            <th >Nombre</th>          
            <th >Accion</th>   
        </tr>
    </thead>
    <tbody class='text-center'>";
    foreach($result as $card)
    {
    $idroles = $card->getId_rol();
    echo " <tr style='cursor:pointer;'> 
            <td>". $card->getId_rol() ."</td>
            <td>". $card->getRol_nombre() ."</td>
            <td>". "<button type='button' id='editar$idroles' class='modificar btn p4 btn btn-primary' data-toggle='modal' data-target='#ModalEditar' >Editar</button>" . " ". 
            "<button type='button' id='eliminar$idroles' class='test  btn btn-primary'>Eliminar</button>" . "</td>" ;            
    }
        
echo "</tbody>
</table>";

?>


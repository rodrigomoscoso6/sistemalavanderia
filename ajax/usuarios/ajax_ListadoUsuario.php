<?php

include('../../Controlador/controlador_usuario.php');

$controladorusuario = new ControladorUsuario();

$resultado = $controladorusuario->ListadoUsuario();

echo "<table id='listadousuario' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >IdUsuario</th>
            <th >Usuario</th>
            <th >Nombre</th>
            <th >Apellidos</th>
            <th >Sexo</th>
            <th >Estado</th>
            <th >Rol</th>
            <th >Accion</th>   
        </tr>
    </thead>
    <tbody>";
    foreach($resultado as $card)
    {
    $idusuario = $card->getId_usuario();
    echo " <tr style='cursor:pointer;'> 
            <td>". $card->getId_usuario() ."</td>
            <td>". $card->getUsuario() ."</td>
            <td>". $card->getNombre() ."</td>
            <td>". $card->getApellidos() ."</td>
            <td>". $card->getSexo() ."</td>
            <td>". $card->getEstado() ."</td>
            <td>". $card->getId_rol() ."</td>
            <td>". "<button type='button' id='editar$idusuario' class='modificar btn p4 btn btn-primary' data-toggle='modal' data-target='#ModalEditar' >Editar</button>" . " ".
            "<button type='button' id='eliminar$idusuario' class='test  btn btn-primary'>Eliminar</button>" ."</td>            
        </tr>";
    }
        
echo "</tbody>
</table>";

?>
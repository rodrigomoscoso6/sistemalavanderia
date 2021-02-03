<?php

include('../../Controlador/controlador_tipo_servicio.php');

$controladortiposervicio = new ControladorTipoServicio();

$result = $controladortiposervicio->ListadoTipoServicio();

echo "<table id='tablatiposervicio' class='table table-striped table-bordered' style='width:100%'>
    <thead class='text-center'>
        <tr>
            <th >Id</th>
            <th >Tipo Servicio</th>
            <th >Medida</th>
            <th >Precio</th>
            <th >Descripcion</th>
            <th >Acciones</th>
        </tr>
    </thead>
    <tbody>";
    foreach($result as $card)
    {
    $idtiposervicio = $card->getId_tipo_servicio();
    echo "<tr style='cursor:pointer;'> 
            <td>". $card->getId_tipo_servicio() ."</td>
            <td>". $card->getTipo_de_servicio() ."</td>
            <td>". $card->getMedida() ."</td>
            <td>". $card->getPrecio() ."</td>
            <td>". $card->getDescripcion() ."</td>
            <td>"."<button type='button' id='editar$idtiposervicio' class='modificar btn p4 btn btn-primary' data-toggle='modal' data-target='#ModalEditar' >Editar</button>"." ".
            "<button type='button' id='eliminar$idtiposervicio' class='test  btn btn-primary'>Eliminar</button>" ."</td>            
        </tr>";
    }
        
echo "</tbody>
</table>";

?>


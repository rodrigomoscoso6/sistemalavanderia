<?php

include('../../Controlador/controlador_tipo_servicio.php');

$idtiposervicio = $_POST['idtiposervicio'];

$controladortiposervicio = new ControladorTipoServicio();

$resultado = $controladortiposervicio->BuscarporId($idtiposervicio);

echo "<form id='frmeditartiposervicio'>";
foreach($resultado as $card)
{
    $idtiposervicio = $card->getId_tipo_servicio();
    $tiposervicio = $card->getTipo_de_servicio();
    $medida = $card->getMedida();
    $precio = $card->getPrecio();
    $descripcion = $card->getDescripcion();

    echo "<input type='hidden' name='idtiposervicio' id='idtiposervicio' value='$idtiposervicio'>                                                                                      
    <div class='form-row'>
    <div class='form-group col-md-12'>
    <label >Tipo de Servicio</label>
    <input type='text' class='form-control' name='tiposervicio' id='tiposervicio' value='$tiposervicio'>
    </div>  
    </div>

    <div class='form-row'>   
    <div class='form-group col-md-6'>
    <label>Medida</label>
    <input type='text' class='form-control' name='medida' id='medida' value='$medida'>
    </div>

    <div class='form-group col-md-6'>
    <label >Precio</label>
    <input type='text' class='form-control' name='precio' id='precio' value='$precio'>
    </div>                                                 
    </div>

    <div class='form-row'>
    <div class='form-group col-md-12'>
    <label >Descripcion</label>
    <textarea class='form-control' name='descripcion' id='descripcion' rows='3'>$descripcion</textarea>
    </div>  
    </div>                                          
                                                                                                                 
    <div class='modal-footer'>
    <button type='submit' class='btn btn-primary'>Guardar</button>
    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>                           
    </div>";        

}
                                 
echo "</form>";


?>
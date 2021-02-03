<?php

include('../../Controlador/controlador_cliente.php');

$idcliente = $_POST['idcliente'];

$controladorcliente = new ControladorCliente();

$resultado = $controladorcliente->BuscarporId($idcliente);

echo "<form id='frmeditarcliente'>";
foreach($resultado as $card)
{
    $idclientes = $card->getId_cliente();
    $nombre = $card->getNombre();
    $apellidos = $card->getApellidos();
    $dni = $card->getDni();
    $correo = $card->getCorreo();
    $celular = $card->getCelular();
    $direccion = $card->getDireccion();

    echo "<input type='hidden' name='idcliente' id='idcliente' value='$idclientes'>                                                                                      
    <div class='form-row'>
    <div class='form-group col-md-6'>
    <label >Nombre</label>
    <input type='text' class='form-control' name='nombre' id='nombre' value='$nombre'>
    </div>
    <div class='form-group col-md-6'>
    <label>Apellidos</label>
    <input type='text' class='form-control' name='apellidos' id='apellidos' value='$apellidos'>
    </div>
    </div>
    <div class='form-row'>  
    <div class='form-group col-md-6'>
    <label >DNI</label>
    <input type='text' class='form-control' name='dni' id='dni' maxlength='8' value='$dni'>
    </div>
    <div class='form-group col-md-6'>
    <label >Celular</label>
    <input type='text' class='form-control' name='celular' id='celular' maxlength='9' value='$celular'>
    </div>                                                   
    </div>
                                                    
    <div class='form-row'>
        <div class='form-group col-md-6'>
            <label>Correo</label>
            <input type='text' class='form-control' name='correo' id='correo' value='$correo'>
        </div>
        <div class='form-group col-md-6'>
            <label>Direccion</label>
            <input type='text' class='form-control' name='direccion' id='direccion' value='$direccion'>
        </div>
    </div>                                                                                                                 
    
    <div class='modal-footer'>
    <button type='submit' class='btn btn-primary'>Guardar</button>
    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>                           
    </div>";        

}
                                 
echo "</form>";


?>
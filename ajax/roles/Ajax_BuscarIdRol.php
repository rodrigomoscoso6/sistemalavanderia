<?php

include('../../Controlador/controlador_rol.php');

$idroles = $_POST['idroles'];

$controladorroles = new ControladorRol();

$resultado = $controladorroles->BuscarId($idroles);

echo "<form id='frmeditarrol'>
<div class='form-row'>";

foreach($resultado as $card)
{
$idrol = $card->getId_rol();
$nombrerol = $card->getRol_nombre();

echo "<input type='hidden' name='idrol2' id='idrol2' value='$idrol'>
<div class='form-group col-md-12'>
<label >Nombre Rol</label>
<input type='text' class='form-control' name='nombrerol2' id='nombrerol2' value='$nombrerol'>
</div>                                                  
</div>";
}
echo "<div class='modal-footer'>
<button type='submit' class='btn btn-primary'>Guardar</button>
<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>                           
</div>                                         
</form>";

        
                                                                                                                                                                                                           
        



?>
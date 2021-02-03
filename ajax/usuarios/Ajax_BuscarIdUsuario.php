<?php

include('../../Controlador/controlador_usuario.php');

$idusuario = $_POST['idusuario'];

$controladorusuario = new ControladorUsuario();

$resultado = $controladorusuario->BuscarId($idusuario);

$result = $controladorusuario->AnidadoRolesID();

echo "<form id='frmeditarusuario'>";

foreach($resultado as $card)
{
    $iduser = $card->getId_usuario();
    $usuario = $card->getUsuario();
    $nombre = $card->getNombre();
    $apellidos = $card->getApellidos();
    $sexo = $card->getSexo();
    $estado = $card->getEstado();
    $roles = $card->getId_rol();

    echo "<input type='hidden' name='idusuario' id='idusuario' value='$iduser'>

    <div class='form-row'>
            <div class='form-group col-md-6'>
            <label >Usuario</label>
            <input type= 'text' class='form-control' name='usuario' id='usuario' value='$usuario' >
            </div>
            <div class='form-group col-md-6'>
            <label >Nombre</label>
            <input type='text' class='form-control' name='nombre' id='nombre' value='$nombre'>
            </div>
        </div>
        <div class='form-row'>                                                   
            <div class='form-group col-md-6'>
            <label >Apellidos</label>
            <input type='text' class='form-control' name='apellidos' id='apellidos' value='$apellidos'>
            </div>
            <div class='form-group col-md-6'>
                <label >Sexo</label>
                <select name='sexo' class='form-control' id='sexo'>";
                if($sexo == "M")
                {
                    echo "<option value='M'>Masculino</option>
                    <option value='F'>Femenino</option>";
                }
                else
                {
                    echo "<option value='F'>Femenino</option>
                    <option value='M'>Masculino</option>";
                }
                
            echo"</select>
                </div>                                                   
        </div>

        <div class='form-row'>                 
                <div class='form-group col-md-6'>
                <label >Estado</label>
                <select name='estado' class='form-control' id='estado'>";
                if($estado == "activo")
                {
                    echo "<option value='activo'>Activo</option>
                    <option value='inactivo'>Inactivo</option>";
                }
                else
                {
                    echo "<option value='inactivo'>Inactivo</option>
                    <option value='activo'>Activo</option>";
                }               
        echo    "</select>
                </div>
                <div class='form-group col-md-6'>
                <label>Roles</label>";
                echo "<select name='roles' class='form-control' id='roles'>";
                foreach($result as $row)
                {                  
                    if($row->getRol_nombre() == $roles)
                    {
                        echo '<option value='. $row->getId_rol() . ' selected>'. $row->getRol_nombre() .'</option>';
                    }
                    else
                    {
                        echo '<option value='. $row->getId_rol() . '>'. $row->getRol_nombre() .'</option>';
                    }
                    
                }
                echo "</select>                                                                                                                                                   
                </div>                                                    
        </div>
        
        <div class='modal-footer'>
            <button type='submit' class='btn btn-primary'>Guardar</button>
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>                           
        </div>";   
    }                                      
echo "</form>";


?>
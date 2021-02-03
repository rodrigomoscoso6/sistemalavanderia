<?php
include('../../Controlador/controlador_usuario.php');

$controaldorusuario = new ControladorUsuario();

$resultado = $controaldorusuario->AnidadoRoles();

echo "<label >Roles</label>";
echo "<select name='roles' class='form-control' id='roles'>";
foreach($resultado as $card)
{
    echo '<option value='. $card->getId_rol() . '>'. $card->getRol_nombre() .'</option>';
}
echo "</select>";

?>
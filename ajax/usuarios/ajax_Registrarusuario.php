<?php
include('../../Controlador/controlador_usuario.php');
include('../../Modelo/modelo_usuarios.php');

$modelousuario = new ModeloUsuario();

$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$modelousuario->setId_usuario($_POST['idusuario']);
$modelousuario->setUsuario($_POST['usuario']);
$modelousuario->setClave($clave);
$modelousuario->setNombre($_POST['nombre']);
$modelousuario->setApellidos($_POST['apellidos']);
$modelousuario->setSexo($_POST['sexo']);
$modelousuario->setEstado($_POST['estado']);
$modelousuario->setId_rol($_POST['roles']);

$controaldorusuario = new ControladorUsuario();

$validar = $controaldorusuario->ExisteUsuarioRegistrado($modelousuario);

if ($validar=="YaExiste")
{
    echo "Ya existe el Usuario";
}
else
{
    global $modelousuario;

    $resultado = $controaldorusuario->RegistrarUsuario($modelousuario);
    echo $resultado;
}

?>
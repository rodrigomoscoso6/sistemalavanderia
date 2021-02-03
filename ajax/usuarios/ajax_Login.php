<?php

session_start();

include('../../Modelo/modelo_usuarios.php');
include('../../Controlador/controlador_usuario.php');

$modelousuario = new ModeloUsuario();

$modelousuario->setUsuario($_POST['usuario']);
$modelousuario->setClave($_POST['clave']);

$controladorusuario = new ControladorUsuario();

$resultado = $controladorusuario->ExisteusuarioLogueo($modelousuario);

if ($resultado == "NoExiste") 
{
    echo "No Existe";
}
else
{
    if (password_verify($modelousuario->getClave(), $resultado)) 
    {              
       if($modelousuario->getEstado() == "Activo") 
       {
        $_SESSION['usuario'] = $modelousuario->getNombre() . " " . $modelousuario->getApellidos();

        $datos = $controladorusuario->MostrandoRol($modelousuario->getId_rol());

        $_SESSION['conectado'] = true;
        $_SESSION['rol'] = $datos;
        $_SESSION['idusuario'] = $modelousuario->getId_usuario();

         echo "Bienvenido";
       }
       else
       {
        echo "Su cuenta esta Inactivo Porfavor comunicarse con el Administrador";
       }

       
    }
    else
    {
        echo "contraseña incorrecta";
    }
}

?>
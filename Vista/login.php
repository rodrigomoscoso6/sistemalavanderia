<?php

if(isset($_SESSION["conectado"]) && $_SESSION["conectado"] == true)
{
  header("location: Vista/usuarios/plantillaGeneral.php");
exit; 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script src="Plantilla/Js/jquery-3.4.1.min.js"></script>
    
    <link rel="stylesheet" href="Plantilla/Login/stylelogin.css" />
    <link rel="stylesheet" href="Plantilla/Presentacion_General/css/estilo_movimiento.css" />
    <title>Registro de Labanderia - Rodrigo Moscoso</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  class="sign-in-form" id="login">
            <h2 class="title">Iniciar Sesion</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Nombre de Usuario" name="usuario">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Contraseña" name="clave">
            </div>
            <!--<div class="">
                <a href="#">
                    Olvidaste Contraceña
                </a>
            </div>-->          
            <input type="submit" value="Entrar" class="btn solid" />
            <p class="social-text">Inicia sesión con un Admin o un Recepcionista.</p>
            
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Labanderia Difa</h3>
            <p>
            Ser reconocidos como una lavandería de prestigio, Lavado - Centrifugado - Lavado al Seco - Servicio de tintoreria-etc. Gracias a un excelente servicio y eficiencia personalizada, que permitan garantizar la calidad en nuestros servicios.
            </p>  
          </div>
          <img src="Plantilla/Login/img/log.svg" class="image" alt="" />
        </div> 
      </div>

      <div class="burbujas">
        <div class="burbuja"></div>
      </div>

    </div>

    
    
    <script src="Plantilla/Js/sweetalert2.js"></script>
    <script src="Js/login.js"></script>
    
 </body>

</html>
<?php

session_start();

if(isset($_REQUEST['indice'])) 
{
    $indice = $_REQUEST['indice'];

    unset($_SESSION['carrito'][$indice]);  

    echo "ok";
}
else
{
    echo "error";
}



?>
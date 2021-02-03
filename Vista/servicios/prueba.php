<?php

if (isset($_GET['mensaje'])) {
    /* Deshacemos el trabajo hecho por base64_encode */
    //$error = base64_decode($_GET['mensaje']);
    /* Deshacemos el trabajo hecho por 'serialize' */
    $error = unserialize($_GET["mensaje"]);
    
    echo $error;

?>
<?php

class Conexion
{
        function conexion()
        {
            $cn = new MYSQLI("localhost","root","GAMIDE070201","bd_lavanderia");   
            mysqli_set_charset($cn,"utf8");        
            return $cn;
        }
}

?>

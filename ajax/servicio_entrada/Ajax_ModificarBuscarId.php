<?php

$result = $_REQUEST['idservicioentrada'];

$cadena = strlen($result);

if ($cadena == "1") 
{
    echo "<h6 id='mostraridservicio'>000000$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}
else if ($cadena == "2")
{
    echo "<h6 id='mostraridservicio'>00000$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}
else if($cadena == "3")
{
    echo "<h6 id='mostraridservicio'>0000$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}
else if ($cadena == "4")
{
    echo "<h6 id='mostraridservicio'>000$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}
else if ($cadena == "5")
{
    echo "<h6 id='mostraridservicio'>00$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}
else if ($cadena == "6")
{
    echo "<h6 id='mostraridservicio'>0$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}
else
{
    echo "<h6 id='mostraridservicio'>$result</h6>";
    echo "<input type='hidden' name='idservientrada' id='idservientrada' value='$result' >";
}






?>
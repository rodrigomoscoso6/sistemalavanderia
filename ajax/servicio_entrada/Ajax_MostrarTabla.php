<?php
session_start();

if (isset($_SESSION['carrito'])) 
{
    $carrito = $_SESSION['carrito'];
    $count = 0;
    $totaltotal = 0;

    if (count($carrito) == 0) 
    {
        echo "NO HAY DATOS";
    }
    else
    {
        echo "<table id='tablaservicios' class='table ' style='width:100%'>
        <thead class='text-center'>
            <tr>          
                <th >Tipo Servicio</th>
                <th >Cantidad</th>
                <th >Precio</th>
                <th >Total</th>
                <th >Accion</th>              
            </tr>
        </thead>
        <tbody>";
        foreach($carrito as $key => $fila)
        {   
            $totaltotal = $totaltotal + $fila['TOTAL'];
            $tiposervicio = $fila['TIPOSERVICIO'];
            echo "<tr style='cursor:pointer;text-align: center;'>            
                <td>". $fila['TIPOSERVICIO'] ."</td>
                <td>". $fila['MEDIDA'] ."</td>
                <td>". number_format($fila['PRECIO'],2) ."</td>
                <td>". number_format($fila['TOTAL'],2) ."</td>
                <td>". "<button type='button' name='mas' id='mas$key' class='mas  btn btn-primary'>+</button>" . " " . 
                "<button type='button' name='menos' id='menos$key' class='menos  btn btn-primary'>-</button>" . " " .
                "<button type='button' id='eliminar$key' class='test  btn btn-primary'>Eliminar</button>" ."</td>                          
            </tr>";
        }
        echo "<tr>
        <td colspan='3' style='text-align: right;'>" . "Importe Total: " . "</td>
        <td style='text-align: center;' id='importetotal' >" . number_format($totaltotal,2) . "</td>
        </tr>";  
        echo "</tbody>
        </table>";
    }
}
else
{
    echo "NO HAY DATOS";
}








?>
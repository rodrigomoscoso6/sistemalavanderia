<?php
session_start();

function getPlantillaTickets()
{
    $datosdatalleservicio  = $_SESSION['llavedetalle'];
    $datosticket = $_SESSION['datosticket'];

    $f_entrada = "";
    $h_entrada = "";
    $codigo_servicio = "";
    $nombre_apellido = "";
    $dni = "";
    $importe_total = "";
    $estado_servicio = "";
    $f_salida = "";
    $h_salida = "";

    foreach($datosticket as $row)
    {
        $f_entrada = $row['f_entrada'];
        $h_entrada = $row['h_entrada'];
        $codigo_servicio = $row['codigo_servicio'];
        $nombre_apellido = $row['nombre_apellido'];
        $dni = $row['dni'];
        $importe_total = $row['importe_total'];
        $estado_servicio = $row['estado_servicio'];
        $f_salida = $row['f_salida'];
        $h_salida = $row['h_salida'];
    }
$asdas = "";

$plantillaTickets = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href='../../Plantilla/Presentacion_General/css/estilo_reportes_ticketera.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <header class='contenedor'>
        
        <div id='logo'>
            <img src='../../Plantilla/Presentacion_General/img/logo.png'
            class='img-fluid' alt='Responsive image'>
        </div>

        <div class='ruc' id='datos'>    
            <label >Ruc: 10722573501</label>
        </div>

        <div class='direccion' id='datos'>
            <label>Direccion: St2Gr17MzDlt20</label>
        </div>

        <div class='fechayhoraentrada' id='datos'>    
            <label>Fecha: $f_entrada</label>
            <label>Hora: $h_entrada</label>
        </div>

        <div class='nServicio' id='datos'>    
            <label>------------------------------------------------------------</label>
        </div>

        <div class='codigoServicio' id='datos' >    
            <label >Codigo Servicio: $codigo_servicio</label>
        </div>

        <div class='nServicio' id='datos'>    
            <label>------------------------------------------------------------</label>
        </div>

        <div class='Nombreyapellido' id='datos'>    
            <label >Nombre: $nombre_apellido</label>
        </div>

        <div class='dni' id='datos'>    
            <label >DNI: $dni</label>
        </div>";

    
         $plantillaTickets .= "<table border='none'>        
                <tr>
                    <th style='text-align: center;'>Tipo Servicio</td>
                    <th style='text-align: center;'>Cantidad</th>
                    <th style='text-align: center;'>Medida</th>
                    <th style='text-align: center;'>precio</th>
                    <th style='text-align: center;'>total</th>
                </tr>";   

                foreach($datosdatalleservicio as $key => $card)
                {
                    $plantillaTickets .= "
                    <tr>
                    <td style='text-align: center;'>".$card['TIPOSERVICIO']."</td>
                    <td style='text-align: center;'>".$card['MEDIDA']."</td>
                    <td style='text-align: center;'>".$card['KG']."</td>
                    <td style='text-align: center;'>".$card['PRECIO']."</td>
                    <td style='text-align: center;'>".$card['TOTAL']."</td>
                    <tr>
                    ";        
                }
        $plantillaTickets .="
        </table>
        ";

            
        $plantillaTickets .= "

        <div class='fechaentrega' id='datos'>    
            <label >Fecha Entrega: $f_salida</label>
        </div>

        <div class='horaentrega' id='datos'>    
            <label >Hora Entrega: $h_salida</label>
        </div>

        <div class='nServicio' id='datos'>    
            <label>------------------------------------------------------------</label>
        </div>

        <div class='estadoServicio' id='datos' >    
            <label >Observación: $estado_servicio</label>
        </div>

        <div class='importetotal' id='datos' >    
            <label >Importe Total: $importe_total</label>
        </div>

        <div class='nServicio' id='datos'>    
            <label>------------------------------------------------------------</label>
        </div>
        
        

        <div class='hora' id='graciasporsupreferencia' >    
        <label >'Gracias por su preferencia'</label>

       
    </div>

    </header>
</body>
</html>";
    
return $plantillaTickets;
}

?>
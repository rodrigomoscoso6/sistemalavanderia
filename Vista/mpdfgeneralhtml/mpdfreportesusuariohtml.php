<?php

function getPlantillaTickets()
{
    
    switch($_REQUEST['accion'])
    {
        case 'mostratodo':

        include('../../Controlador/controlador_reportes.php');

        $controladorfechatodo = new ControladorReportesxfecha();

        $resultado = $controladorfechatodo->ReporteUsuarios();
            
        $plantillaTickets = "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <link href='../../Plantilla/Presentacion_General/css/estilo_reportes_mpdf.css' rel='stylesheet'>
            <title>Document</title>
        </head>
        <body>
            <header class='contenedor'>
                
                <div class='contenedor_encabezado'>

                    <div class='hijo'>
                        <div id='logoempresa'>
                            <img src='../../Plantilla/Presentacion_General/img/logo.png'
                            class='imagenlogo' alt='Responsive image'>
                        </div>
                    </div>
                    
                    <div class='hijo'>
                        <h1> Lista de Reportes por Usuario</h1>

                    </div>

                </div>

                
                <hr style='width:100%'>";

                $plantillaTickets .= "
                    <table id='tablaxfecha' style='width:100%'>
                            <thead>
                                <tr class='datscabezera'>
                                    <th style='text-align: center;color: #000;'>IdUsuario</th>
                                    <th style='text-align: center;color: #000;'>Nombre</th>
                                    <th style='text-align: center;color: #000;'>Apellido</th>
                                    <th style='text-align: center;color: #000;'>Rol</th>
                                    <th style='text-align: center;color: #000;'>Cantidad Servicio Realizado</th>  
                                </tr>
                            </thead>
                            <tbody>";

                        foreach($resultado as $card)
                        {
                            $plantillaTickets .="
                            <tr style='text-align: center;'>
                                <td style='text-align: center;'>" . $card->getId_cliente() . "</td>
                                <td style='text-align: center;'>" . $card->getNombre() . "</td>
                                <td style='text-align: center;'>" . $card->getApellidos() . "</td>
                                <td style='text-align: center;'>" . $card->getRol() . "</td>
                                <td style='text-align: center;'>" . $card->getCantidadservicio() . "</td>
                            </tr>";  
                        }             
                    $plantillaTickets .="              
                    </table>

            </header>
        </body>
        </html>";

        break;

        case 'filtro':

            $fechainicio = $_REQUEST['fechainicio'];
            $fechafin = $_REQUEST['fechafin'];

            include('../../Controlador/controlador_reportes.php');

            $controladorfechatodo = new ControladorReportesxfecha();

            $resultado = $controladorfechatodo->ReporteUsuariosFechas($fechainicio,$fechafin);
                
            $plantillaTickets = "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <link href='../../Plantilla/Presentacion_General/css/estilo_reportes.css' rel='stylesheet'>
                <title>Document</title>
            </head>
            <body>
                <header class='contenedor'>
                    
                    <div class='contenedor_encabezado'>
                        <div class='hijo'>
                            <div id='logoempresa'>
                                <img src='../../Plantilla/Presentacion_General/img/logo.png'
                                class='imagenlogo' alt='Responsive image'>
                            </div>
                        </div>
                        
                        <div class='hijo'>
                            <h1> Lista de Reportes por Usuario</h1>

                        </div>
                    </div>
                    
                    <hr style='width:100%'>";

                    $plantillaTickets .= "
                        <table id='tablaxfecha' style='width:100%'>
                                <thead>
                                    <tr class='datscabezera'>
                                    <th style='text-align: center;color: #000;'>IdUsuario</th>
                                    <th style='text-align: center;color: #000;'>Nombre</th>
                                    <th style='text-align: center;color: #000;'>Apellido</th>
                                    <th style='text-align: center;color: #000;'>Rol</th>
                                    <th style='text-align: center;color: #000;'>Cantidad Servicio Realizado</th>  
                                    </tr>
                                </thead>
                                <tbody>";

                            foreach($resultado as $card)
                            {
                                $plantillaTickets .="
                                <tr style='text-align: center;'>
                                <td style='text-align: center;'>" . $card->getId_cliente() . "</td>
                                <td style='text-align: center;'>" . $card->getNombre() . "</td>
                                <td style='text-align: center;'>" . $card->getApellidos() . "</td>
                                <td style='text-align: center;'>" . $card->getRol() . "</td>
                                <td style='text-align: center;'>" . $card->getCantidadservicio() . "</td>
                                </tr>";  
                            }             
                        $plantillaTickets .="
                        </table>                    
                </header>
            </body>
            </html>";

        break;
    }
    
return $plantillaTickets;
}
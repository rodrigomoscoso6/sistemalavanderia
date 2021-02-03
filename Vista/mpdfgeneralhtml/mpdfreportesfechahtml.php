<?php

function getPlantillaTickets()
{
    
    switch($_REQUEST['accion'])
    {
        case 'mostratodo':

        include('../../Controlador/controlador_reportes.php');

        $controladorfechatodo = new ControladorReportesxfecha();

        $resultado = $controladorfechatodo->ListadoReportesxfecha();
            
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
                        <h1> Lista de Reportes por Fecha</h1>

                    </div>

                </div>

                
                <hr style='width:100%'>";

                $plantillaTickets .= "
                    <table id='tablaxfecha' style='width:100%'>
                            <thead>
                                <tr class='datscabezera'>
                                    <th style='text-align: center;color: #000;'>Id</th>
                                    <th style='text-align: center; color: #000;'>Nombre Cliente</th>
                                    <th style='text-align: center; color: #000;'>Apellidos Cliente</th>
                                    <th style='text-align: center; color: #000;'>DNI</th>
                                    <th style='text-align: center; color: #000;'>Celular</th>
                                    <th style='text-align: center; color: #000;'>Tipo_Servicio</th>
                                    <th style='text-align: center; color: #000;'>Medida</th>
                                    <th style='text-align: center; color: #000;'>Precio</th>
                                    <th style='text-align: center; color: #000;'>Unidad</th>
                                    <th style='text-align: center; color: #000;'>Total</th>
                                    <th style='text-align: center; color: #000;'>Estado Prenda</th>  
                                    <th style='text-align: center; color: #000;'>Fecha Entrada</th>  
                                    <th style='text-align: center; color: #000;'>Fecha Salida</th>  
                                </tr>
                            </thead>
                            <tbody>";

                        foreach($resultado as $card)
                        {
                            $total = $total + $card->getTotal();
                            $plantillaTickets .="
                            <tr style='text-align: center;'>
                                <td style='text-align: center;'>".$card->getId_servicio_entrega()."</td>
                                <td style='text-align: center;'>".$card->getNombrecliente()."</td>
                                <td style='text-align: center;'>".$card->getApellidos()."</td>
                                <td style='text-align: center;'>".$card->getDni()."</td>
                                <td style='text-align: center;'>".$card->getCelular()."</td>
                                <td style='text-align: center;'>".$card->getTipo_de_servicio()."</td>
                                <td style='text-align: center;'>".$card->getMedida()."</td>
                                <td style='text-align: center;'>". "S/" .$card->getPrecio()."</td>
                                <td style='text-align: center;'>".$card->getUnidad()."</td>
                                <td style='text-align: center;'>". "S/" .$card->getTotal()."</td>
                                <td style='text-align: center;'>".$card->getEstado_prenda()."</td>
                                <td style='text-align: center;'>".$card->getFecha_entrada()."</td>
                                <td style='text-align: center;'>".$card->getFecha_salida()."</td>
                            </tr>";  
                        }             
                    $plantillaTickets .="              
                    </table>

                    <div class='totaltotal'>
                        <label>Total Generado: S/ ". number_format($total,2) ."</label> 
                    </div>
                    
            

            </header>
        </body>
        </html>";

        break;

        case 'filtro':

            $fechainicio = $_REQUEST['fechainicio'];
            $fechafin = $_REQUEST['fechafin'];

            include('../../Controlador/controlador_reportes.php');

            $controladorfechatodo = new ControladorReportesxfecha();

            $resultado = $controladorfechatodo->listadoReportesFechaInicioFechaFin($fechainicio,$fechafin);
                
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
                            <h1> Lista de Reportes por Fecha</h1>

                        </div>
                    </div>
                    
                    <hr style='width:100%'>";

                    $plantillaTickets .= "
                        <table id='tablaxfecha' style='width:100%'>
                                <thead>
                                    <tr class='datscabezera'>
                                        <th style='text-align: center; color: #000;'>Id</th>
                                        <th style='text-align: center; color: #000;'>Nombre Cliente</th>
                                        <th style='text-align: center; color: #000;'>Apellidos Cliente</th>
                                        <th style='text-align: center; color: #000;'>DNI</th>
                                        <th style='text-align: center; color: #000;'>Celular</th>
                                        <th style='text-align: center; color: #000;'>Tipo_Servicio</th>
                                        <th style='text-align: center; color: #000;'>Medida</th>
                                        <th style='text-align: center; color: #000;'>Precio</th>
                                        <th style='text-align: center; color: #000;'>Unidad</th>
                                        <th style='text-align: center; color: #000;'>Total</th>
                                        <th style='text-align: center; color: #000;'>Estado Prenda</th>  
                                        <th style='text-align: center; color: #000;'>Fecha Entrada</th>  
                                        <th style='text-align: center; color: #000;'>Fecha Salida</th>  
                                    </tr>
                                </thead>
                                <tbody>";

                            foreach($resultado as $card)
                            {
                                $total = $total + $card->getTotal();
                                $plantillaTickets .="
                                <tr style='text-align: center;'>
                                    <td style='text-align: center;'>".$card->getId_servicio_entrega()."</td>
                                    <td style='text-align: center;'>".$card->getNombrecliente()."</td>
                                    <td style='text-align: center;'>".$card->getApellidos()."</td>
                                    <td style='text-align: center;'>".$card->getDni()."</td>
                                    <td style='text-align: center;'>".$card->getCelular()."</td>
                                    <td style='text-align: center;'>".$card->getTipo_de_servicio()."</td>
                                    <td style='text-align: center;'>".$card->getMedida()."</td>
                                    <td style='text-align: center;'>".$card->getPrecio()."</td>
                                    <td style='text-align: center;'>".$card->getUnidad()."</td>
                                    <td style='text-align: center;'>".$card->getTotal()."</td>
                                    <td style='text-align: center;'>".$card->getEstado_prenda()."</td>
                                    <td style='text-align: center;'>".$card->getFecha_entrada()."</td>
                                    <td style='text-align: center;'>".$card->getFecha_salida()."</td>
                                </tr>";  
                            }             
                        $plantillaTickets .="
                        </table>

                        <div class='totaltotal'>
                            <label>Total Generado: S/ ". number_format($total,2) ."</label> 
                        </div>

                </header>
            </body>
            </html>";

        break;
    }
    
return $plantillaTickets;
}

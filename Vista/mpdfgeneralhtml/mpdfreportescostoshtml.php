<?php

function getPlantillaTickets()
{
    
        include('../../Controlador/controlador_reportes.php');

        $controladorfechatodo = new ControladorReportesxfecha();

        $resultado = $controladorfechatodo->ReporteCostos();
            
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
                        <h1> Lista de Reportes por Costos</h1>

                    </div>

                </div>

                
                <hr style='width:100%'>";

                $plantillaTickets .= "
                    <table id='tablaxfecha' style='width:100%'>
                            <thead>
                                <tr class='datscabezera'>                                   
                                    <th style='text-align: center;color: #000;'>idcostos</th>
                                    <th style='text-align: center;color: #000;'>costolavadora</th>
                                    <th style='text-align: center;color: #000;'>costosecadora</th>
                                    <th style='text-align: center;color: #000;'>costoenergia</th>
                                    <th style='text-align: center;color: #000;'>costoagua</th>
                                    <th style='text-align: center;color: #000;'>costogas</th>
                                    <th style='text-align: center;color: #000;'>costoempaque</th>
                                    <th style='text-align: center;color: #000;'>clorogramos</th>
                                    <th style='text-align: center;color: #000;'>clorocosto</th>
                                    <th style='text-align: center;color: #000;'>detergentegramos</th>
                                    <th style='text-align: center;color: #000;'>detergentecosto</th>
                                    <th style='text-align: center;color: #000;'>suavisantegramos</th>
                                    <th style='text-align: center;color: #000;'>suavisantecosto</th>
                                    <th style='text-align: center;color: #000;'>totalcosto</th>
                                    <th style='text-align: center;color: #000;'>insumos</th>
                                    <th style='text-align: center;color: #000;'>utilidadxtipo</th>
                                    <th style='text-align: center;color: #000;'>tiposervicio</th>
                                    <th style='text-align: center;color: #000;'>precio</th>  
                                </tr>
                            </thead>
                            <tbody>";

                        foreach($resultado as $card)
                        {
                            $plantillaTickets .="
                            <tr style='text-align: center;'>
                                <td style='text-align: center;'>" . $card->getId_costos() . "</td>
                                <td style='text-align: center;'>" . $card->getCosto_maquina_lavadora() . "</td>
                                <td style='text-align: center;'>" . $card->getCosto_maquina_secadora() . "</td>
                                <td style='text-align: center;'>" . $card->getCosto_maquina_energia() . "</td>
                                <td style='text-align: center;'>" . $card->getCosto_maquina_agua() . "</td>
                                <td style='text-align: center;'>" . $card->getCosto_maquina_gas() . "</td>
                                <td style='text-align: center;'>" . $card->getCosto_maquina_empaque() . "</td>
                                <td style='text-align: center;'>" . $card->getCloro_gramos() . "</td>
                                <td style='text-align: center;'>" . $card->getCloro_costo() . "</td>
                                <td style='text-align: center;'>" . $card->getDetergente_gramos() . "</td>
                                <td style='text-align: center;'>" . $card->getDetergente_costo() . "</td>
                                <td style='text-align: center;'>" . $card->getSuavisante_gramos() . "</td>
                                <td style='text-align: center;'>" . $card->getSuavisante_costo() . "</td>
                                <td style='text-align: center;'>" . $card->getTotal_costo() . "</td>
                                <td style='text-align: center;'>" . $card->getInsumos() . "</td>
                                <td style='text-align: center;'>" . $card->getUtilidadxtipo() . "</td>
                                <td style='text-align: center;'>" . $card->getTiposervicio() . "</td>
                                <td style='text-align: center;'>" . $card->getPrecio() . "</td>
                            </tr>";  
                        }             
                    $plantillaTickets .="              
                    </table>      
            </header>
        </body>
        </html>";

        
    return $plantillaTickets;
}
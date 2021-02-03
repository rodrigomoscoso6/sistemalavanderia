<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../../Conexion/conexion.php';
require_once '../ticketera/ticketeradiseño.php';

session_start();

$datosdatalleservicio  = $_SESSION['llavedetalle'];
$datosticket = $_SESSION['datosticket'];

$plantilla = getPlantillaTickets();

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [76, 185]]);
$mpdf->SetTitle('Tickets');
$mpdf->WriteHTML($plantilla);
$mpdf->Output();

?>
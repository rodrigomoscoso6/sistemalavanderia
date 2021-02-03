<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../mpdfgeneralhtml/mpdfreportesfechahtml.php';

$plantilla = getPlantillaTickets();
$mpdf = new \Mpdf\Mpdf (['mode' => 'utf-8','format' => 'A4-L']);
$mpdf->SetTitle('Tickets');
$mpdf->WriteHTML($plantilla);
$mpdf->Output();

?>
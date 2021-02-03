<?php


include('../../Controlador/controlador_servicio_entrada.php');

$idservicioentrada = $_REQUEST['idservicioentrada'];

$controladorservicioentrada = new ControladorServicioEntrada();

$idusuario = $controladorservicioentrada->Idusaurio($idservicioentrada);

$usuario = $controladorservicioentrada->NombreUsuario($idusuario);

$result = $controladorservicioentrada->DatosServicioEntrada($idservicioentrada);

foreach($result as $card)
{
    $array = array(
        'idusuario' => $idusuario,
        'usuario' => $usuario,
        'f_entrada' => $card->getFecha_entrada(),
        'h_entrada' => $card->getHora_entrada(),
        'comprobante' => $card->getComprobante(),
        'estado_prenda' => $card->getEstado_prenda(),
        'tipo_pago' => $card->getTipo_pago(),
        'importetotal' => $card->getImporte_total()
    );
}

echo json_encode($array);



?>
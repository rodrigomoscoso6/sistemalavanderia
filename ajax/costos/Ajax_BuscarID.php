<?php

include('../../Controlador/controlador_costos.php');

$idcostos = $_POST['idcostos']; 

$controladorcostos = new ControladorCostos();

$resultado = $controladorcostos->BuscarId($idcostos);

echo "<form id='frmeditarcostos'>"; 
foreach($resultado as $card)
{
  $idcostos = $card->getId_costos();
  $costomaquinalavadora = $card->getCosto_maquina_lavadora();
  $costomaquinasecadora =  $card->getCosto_maquina_secadora();
  $costomaquinaenergia =  $card->getCosto_maquina_energia();
  $costomaquinaagua =  $card->getCosto_maquina_agua();
  $costomaquinagas =  $card->getCosto_maquina_gas();
  $costomaquinaempaque =  $card->getCosto_maquina_empaque();
  $clorogramos =  $card->getCloro_gramos();
  $clorocosto =  $card->getCloro_costo();
  $detergentegramos =  $card->getDetergente_gramos();
  $detergentecosto =  $card->getDetergente_costo();
  $suavisantegramos =  $card->getSuavisante_gramos();
  $suavisantecosto =  $card->getSuavisante_costo();
  $totalcosto =  $card->getTotal_costo();
  $insumos =  $card->getInsumos();
  $utilidadxtipo =  $card->getUtilidadxtipo();
  $idtiposervicio =  $card->getId_tipo_servicio();
  $precio = $card->getPrecio();

    echo " 
    <input type='hidden' name='idcostos2' value='$idcostos'>                                          
    <div class='row'>
        <div class='col-md-12 col-lg-12 col-xl-12'>
            <div class='form-group'>
                <h3 class='CostoMaquina'>Costo Maquina</h3>
                <div class='row'>
                                        
                    <div class='col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2'>
                        <div class='form-group'>
                            <label class='letra'>Costo Lavadora</label>     
                            <input type='text' class='form-control'  placeholder='S/' name='lavadora2' id='lavadora2' value='$costomaquinalavadora' >
                        </div>
                    </div>
                
                    <div class='col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2'>
                        <div class='form-group'>
                            <label class='letra'>Costo Secadora</label>
                            <input type='text' class='form-control'  placeholder='S/' name='secadora2' id='secadora2' value='$costomaquinasecadora'>
                        </div>
                    </div>
                    
                    <div class='col-4 costoenergia col-sm-4 col-md-4 col-lg-3 col-xl-2'>
                        <div class='form-group'>
                            <label class='letra'>Costo Energia</label>
                            <input type='text' class='form-control'  placeholder='S/' name='energia2' id='energia2' value='$costomaquinaenergia'>
                        </div>
                    </div>  

                    <div class='col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2'>
                        <div class='form-group'>
                            <label class='letra'>Costo Agua</label>
                            <input type='text' class='form-control'  placeholder='S/' name='agua2' id='agua2' value='$costomaquinaagua'>
                        </div>
                    </div>  

                    <div class='col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2'>
                        <label class='letra'>Costo Gas</label>
                        <input type='text' class='form-control'  placeholder='S/' name='gas2' id='gas2' value='$costomaquinagas'>
                    </div> 

                    <div class='col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2'>
                        <label class='letra'>Costo Empaque</label>
                        <input type='text' class='form-control'  placeholder='S/' name='empaque2' id='empaque2' value='$costomaquinaempaque'>
                    </div> 
                </div>     
            </div>                                            
        </div>                                                    
    </div>
    <div class='row'>                                                   
        <div class='col-4 col-sm-6 col-md-6 col-lg-4 col-xl-4'>
            <div class='form-group'>
                <h3 class='CostoMaquina'>Cloro</h3>
                <div class='row'>
                    <div class='col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                        <label class='letra'>Gramos</label>
                        <input type='text' class='form-control'  placeholder='S/' name='cloroGramos2' id='cloroGramos2' value='$clorogramos'>
                    </div>

                    <div class='col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                        <label class='letra'>Precio</label>
                        <input type='text' class='form-control'  placeholder='S/' name='preciocloro2' id='preciocloro2' value='$clorocosto'>
                    </div>
                </div>
            </div>
        </div>
        
        <div class='col-4 col-sm-6 col-md-6 col-lg-4 col-xl-4'>
            <div class='form-group'>
                <h3 class='CostoMaquina'>Detergente</h3>
                <div class='row'>
                    <div class='col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                        <label class='letra'>Gramos</label>
                        <input type='text' class='form-control'  placeholder='S/' name='detergenteGramos2' id='detergenteGramos2' value='$detergentegramos'>
                    </div>
                    <div class='col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                        <label class='letra'>Precio</label>
                        <input type='text' class='form-control'  placeholder='S/' name='preciodetergente2' id='preciodetergente2' value='$detergentecosto'>
                    </div>
                </div>
            </div>
        </div>

        <div class='col-4 col-sm-12 col-md-6 contedorsuavisante col-lg-4 col-xl-4'>
            <div class='form-group'>
                <h3 class='CostoMaquina'>Suavisante</h3>
                <div class='row'>
                    <div class='col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                        <label class='letra'>Gramos</label>
                        <input type='text' class='form-control'  placeholder='S/' name='suavisanteGramos2' id='suavisanteGramos2' value='$suavisantegramos'>
                    </div>
                    <div class='col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6'>
                        <label class='letra'>Precio</label>
                        <input type='text' class='form-control'  placeholder='S/' name='preciosuavisante2' id='preciosuavisante2' value='$suavisantecosto'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>        
        <div class='col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6'>
            <input type='hidden' id='idtiposervicio2' name='idtiposervicio2' value='$idtiposervicio' >
            <div class='form-group' id='combotiposervicio'>                                                            
            </div>
        </div>

        <div class='col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3'>
            <div class='form-group'>
                <label class='letra'>Precio</label>
                <input type='text' class='form-control'  placeholder='S/' name='precio2' id='precio2' value='$precio'>
            </div>
        </div>

        <div class='col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3'>
            <div class='form-group'>
                <label class='letra'>Total Costo</label>
                <input type='text' class='form-control' disabled placeholder='S/' name='totalCosto2' id='totalCosto2' value='$totalcosto'>
            </div>
        </div>                                                      
    </div>

    <div class='row'>
        
        <div class='col-lg-3 col-xl-3'>

        </div>

        <div class='col-lg-3 col-xl-3'>
            
            </div>
        <div class='col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3'>
            <div class='form-group'>
                    <label class='letra'>Insumos</label>
                    <input type='text' class='form-control' disabled name='insumos2'  id='insumos2' value ='$insumos'>
            </div>
        </div>

        <div class='col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3'>
            <div class='form-group'>
                <label class='letra'>Utilidad</label>
                <input type='text' class='form-control' disabled  name='utilidad2' id='utilidad2' value='$utilidadxtipo'>
            </div>
        </div>
    </div>

    <div class='modal-footer'>
        <button type='submit' class='btn btn-primary'>Registrar</button>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>                           
    </div>";                                       
     
}
                                 
echo "</form>";

?>
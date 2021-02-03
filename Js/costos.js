$(document).ready(function(){

    $.ajax({
        url: "../../ajax/servicio_entrada/Ajax_AnidadosTipoServicio.php",
    }).done(function(response)  
    {
        $("#anidadotiposervicio").html(response);

        $("#tiposervicio").change(function() 
        {
            let dato = $(this).val();
                
                $.ajax({ 
                    url : "../../ajax/costos/Ajax_DatosAnidados.php",
                    type: "post",
                    data: {dato:dato}		
                }).done(function(response)
                {
                  var datos = JSON.parse(response);
                 
                  document.getElementById("precio").value = datos.precio;

                function Calcular()
                {
                    //primera fila
                    var costolavadora = document.getElementById('lavadora').value;
                    var costosecadora = document.getElementById('secadora').value;
                    var costoenergia = document.getElementById('energia').value;
                    var costoagua = document.getElementById('agua').value;
                    var costogas = document.getElementById('gas').value;
                    var costoenpaque = document.getElementById('empaque').value;

                    //segunda fila
                    var clorogramos = document.getElementById('cloroGramos').value;
                    var preciocloro = document.getElementById('preciocloro').value;
                    var detergentegramos = document.getElementById('detergenteGramos').value;
                    var precciodetergente = document.getElementById('preciodetergente').value;
                    var suavisantegramos = document.getElementById('suavisanteGramos').value;
                    var preciosuavisante = document.getElementById('preciosuavisante').value;

                    document.getElementById('totalCosto').value = 
                    (parseFloat(costolavadora) + parseFloat(costosecadora) + parseFloat(costoenergia) + parseFloat(costoagua) + parseFloat(costogas) + parseFloat(costoenpaque) + 
                    parseFloat(clorogramos) + parseFloat(preciocloro) + parseFloat(detergentegramos) + parseFloat(precciodetergente) + parseFloat(suavisantegramos) + parseFloat(preciosuavisante)).toFixed(2);

                }

                Calcular();

                function Insumos()
                {
                    var clorogramos = document.getElementById('cloroGramos').value;
                    var detergentegramos = document.getElementById('detergenteGramos').value;
                    var suavisantegramos = document.getElementById('suavisanteGramos').value;

                    document.getElementById('insumos').value = (parseFloat(clorogramos) + parseFloat(detergentegramos) + parseFloat(suavisantegramos)).toFixed(2);
                }

                Insumos();

                function Utilidad()
                {
                    var totalcosto = document.getElementById('totalCosto').value;
                    var precio = document.getElementById('precio').value;

                    if(precio == "")
                    {
                        document.getElementById('utilidad').value = parseFloat(totalcosto).toFixed(2);
                    }
                    else
                    {
                        var utilidad = precio - totalcosto;
                        document.getElementById('utilidad').value = parseFloat(utilidad).toFixed(2);
                    }

                    
                }

                Utilidad();

                let array = ['lavadora','secadora','energia','agua','gas','empaque','cloroGramos','preciocloro',
                            'detergenteGramos','preciodetergente','suavisanteGramos','preciosuavisante','precio'];

                for (let i = 0; i < array.length; i++) 
                {
                    //id.push(array[i]);
                    $('#' + array[i]).keyup(function()
                    {

                    var costos = document.getElementById(array[i]).value;
                    if(costos == "")
                    {         
                    }
                    else
                    {
                        Calcular();
                        Insumos();
                        Utilidad();
                    }
                    })
                }
                                                                        
        }); 
    })

    });

    $.ajax({
        url: "../../ajax/costos/Ajax_TraerID.php",
    }).done(function(response)  
    {
        $("#inputidcostos").html(response);
    });

    $.ajax({
        url: "../../ajax/costos/Ajax_ListadoCostos.php",
    }).done(function(response)  
    {
        $("#TablaCostos").html(response); 

        $('.modificar[type="button"]').on('click',function()
        {
            var id = this.id;                     
            var res = id.split("editar");
            var datos = res;

            var hola = "" + datos;
            var idcostos = hola.substring(1);

            $.ajax({
                url : "../../ajax/costos/Ajax_BuscarID.php",
                type: "post",
                data: {idcostos:idcostos}		
            }).done(function(response)
            {
                
            $("#formeditarcostos").html(response); 

            var idcosto = document.getElementById('idtiposervicio2').value;

            $.ajax({
                url: "../../ajax/costos/Ajax_ComboSeleccionado.php",
                type: "post",
                data: {idcosto:idcosto}
            }).done(function(response)  
            {
                $("#combotiposervicio").html(response);

                function Calcular()
                {
                    //primera fila
                    var costolavadora = document.getElementById('lavadora2').value;
                    var costosecadora = document.getElementById('secadora2').value;
                    var costoenergia = document.getElementById('energia2').value;
                    var costoagua = document.getElementById('agua2').value;
                    var costogas = document.getElementById('gas2').value;
                    var costoenpaque = document.getElementById('empaque2').value;

                    //segunda fila
                    var clorogramos = document.getElementById('cloroGramos2').value;
                    var preciocloro = document.getElementById('preciocloro2').value;
                    var detergentegramos = document.getElementById('detergenteGramos2').value;
                    var precciodetergente = document.getElementById('preciodetergente2').value;
                    var suavisantegramos = document.getElementById('suavisanteGramos2').value;
                    var preciosuavisante = document.getElementById('preciosuavisante2').value;

                    document.getElementById('totalCosto2').value = 
                    (parseFloat(costolavadora) + parseFloat(costosecadora) + parseFloat(costoenergia) + parseFloat(costoagua) + parseFloat(costogas) + parseFloat(costoenpaque) + 
                    parseFloat(clorogramos) + parseFloat(preciocloro) + parseFloat(detergentegramos) + parseFloat(precciodetergente) + parseFloat(suavisantegramos) + parseFloat(preciosuavisante)).toFixed(2);

                }

                Calcular();

                function Insumos()
                {
                    var clorogramos = document.getElementById('cloroGramos2').value;
                    var detergentegramos = document.getElementById('detergenteGramos2').value;
                    var suavisantegramos = document.getElementById('suavisanteGramos2').value;

                    document.getElementById('insumos2').value = (parseFloat(clorogramos) + parseFloat(detergentegramos) + parseFloat(suavisantegramos))
                }

                Insumos();

                function Utilidad()
                {
                    var totalcosto = document.getElementById('totalCosto2').value;
                    var precio = document.getElementById('precio2').value;

                    if(precio == "")
                    {
                        document.getElementById('utilidad2').value = parseFloat(totalcosto).toFixed(2);
                    }
                    else
                    {
                        var utilidad = precio - totalcosto;
                        document.getElementById('utilidad2').value = parseFloat(utilidad).toFixed(2);
                    }

                    
                }

                Utilidad();

                let array = ['lavadora2','secadora2','energia2','agua2','gas2','empaque2','cloroGramos2','preciocloro2',
                            'detergenteGramos2','preciodetergente2','suavisanteGramos2','preciosuavisante2','precio2'];

                for (let i = 0; i < array.length; i++) 
                {
                    //id.push(array[i]);
                    $('#' + array[i]).keyup(function()
                    {

                    var costos = document.getElementById(array[i]).value;
                    if(costos == "")
                    {         
                    }
                    else
                    {
                        Calcular();
                        Insumos();
                        Utilidad();
                    }
                    })
                }

                $("#frmeditarcostos").submit(function(event)
                {
                    event.preventDefault(); 

                    document.getElementById('totalCosto2').disabled = false;
                    document.getElementById('insumos2').disabled = false; 
                    document.getElementById('utilidad2').disabled = false; 
            
                    var data = $(this).serialize();
                
                    $.ajax({
                        url : "../../ajax/costos/Ajax_EditarCosto.php",
                        type: "post",
                        data : data
                    }).done(function(response) 
                    {                       
                        if (response == "ok") 
                        {
                            Swal.fire({
                                icon: 'success',
                                title: 'Correcto!!!',
                                text: 'Modifico Correctamente',
                                confirmButtonText: `OK`           
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });       
                        } 
                        else 
                        {
                            Swal.fire({
                                icon:'warning',
                                title: 'Error al Registrar',                              
                                text: response             
                            });           
                        }
                        
                    });
                });
            });
            
            });

        })

        $('.eliminar[type="button"]').on('click',function(){
                                  
            Swal.fire({
                title: 'Esta un paso de Eliminar un Costo de Tipo de Servicio',
                text: "¿Esta seguro de Eliminar este Costo de Tipo de Servicio?",
                icon: "warning",
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'          
                }).then((result) => {
                  if (result.isConfirmed) {
                    var id = this.id;                     
                    var res = id.split("eliminar");
                    var datos = res;
        
                    var hola = "" + datos;
                    var idcostos = hola.substring(1);

                    $.ajax({
                        url: '../../ajax/costos/Ajax_EliminarCostos.php',
                        type: 'POST',
                        data: {idcostos:idcostos},
                        success:function(response)
                        {
                            if (response == "ok") 
                            {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Correcto!!!',
                                    text: 'Se Elimino Correctamente',
                                    confirmButtonText: `OK`           
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.reload();
                                    }
                                });       
                            } 
                            else 
                            {
                                Swal.fire({
                                    icon: 'Error al Eliminar',
                                    title: 'Oops...',
                                    text: response             
                                });           
                            }                              
                        } 
                    });
                    
                    }
                });                               
    });

    });

    $("#frminsertarcostos").submit(function(event){
        event.preventDefault();

        document.getElementById('totalCosto').disabled = false;
        document.getElementById('insumos').disabled = false; 
        document.getElementById('utilidad').disabled = false;
    
        var data = $(this).serialize();

        $.ajax({
            url : "../../ajax/costos/Ajax_InsertarCostos.php",
            type: "post",
            data : data
        }).done(function(response)
        {            
            if (response == "ok") 
            {
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto!!!',
                    text: 'Inserto Correctamente',
                    confirmButtonText: `OK`           
                  }).then((result) => {
                    if (result.isConfirmed) 
                    {
                        location.reload();
                      }
                  });       
            } 
            else 
            {
                Swal.fire({
                    icon: 'warning',
                    title: 'PorFavor', 
                    text: response,
                    confirmButtonText: `OK`             
                  }).then((result) => {
                    if (result.isConfirmed) 
                    {
                        
                    }
                  });           
            }
            
        });
    });

    function Calcular()
    {
        //primera fila
        var costolavadora = document.getElementById('lavadora').value;
        var costosecadora = document.getElementById('secadora').value;
        var costoenergia = document.getElementById('energia').value;
        var costoagua = document.getElementById('agua').value;
        var costogas = document.getElementById('gas').value;
        var costoenpaque = document.getElementById('empaque').value;

        //segunda fila
        var clorogramos = document.getElementById('cloroGramos').value;
        var preciocloro = document.getElementById('preciocloro').value;
        var detergentegramos = document.getElementById('detergenteGramos').value;
        var precciodetergente = document.getElementById('preciodetergente').value;
        var suavisantegramos = document.getElementById('suavisanteGramos').value;
        var preciosuavisante = document.getElementById('preciosuavisante').value;

        document.getElementById('totalCosto').value = 
        (parseFloat(costolavadora) + parseFloat(costosecadora) + parseFloat(costoenergia) + parseFloat(costoagua) + parseFloat(costogas) + parseFloat(costoenpaque) + 
        parseFloat(clorogramos) + parseFloat(preciocloro) + parseFloat(detergentegramos) + parseFloat(precciodetergente) + parseFloat(suavisantegramos) + parseFloat(preciosuavisante)).toFixed(2);

    }

    Calcular();

    function Insumos()
    {
        var clorogramos = document.getElementById('cloroGramos').value;
        var detergentegramos = document.getElementById('detergenteGramos').value;
        var suavisantegramos = document.getElementById('suavisanteGramos').value;

        document.getElementById('insumos').value = (parseFloat(clorogramos) + parseFloat(detergentegramos) + parseFloat(suavisantegramos)).toFixed(2);
    }

    Insumos();

    function Utilidad()
    {
        var totalcosto = document.getElementById('totalCosto').value;
        var precio = document.getElementById('precio').value;

        if(precio == "")
        {
            document.getElementById('utilidad').value = parseFloat(totalcosto).toFixed(2);
        }
        else
        {
            var utilidad = precio - totalcosto;
            document.getElementById('utilidad').value = parseFloat(utilidad).toFixed(2);
        }

        
    }

    Utilidad();

    let array = ['lavadora','secadora','energia','agua','gas','empaque','cloroGramos','preciocloro',
                'detergenteGramos','preciodetergente','suavisanteGramos','preciosuavisante','precio'];

    for (let i = 0; i < array.length; i++) 
    {
        //id.push(array[i]);
        $('#' + array[i]).keyup(function()
        {

        var costos = document.getElementById(array[i]).value;
        if(costos == "")
        {         
        }
        else
        {
            Calcular();
            Insumos();
            Utilidad();
        }
        })
    }

})
$(document).ready(function(){

    var d = new Date(); 
    var ano = d.getFullYear(); 
    var mes = d.getMonth()+1;
    var dia = d.getDate();
    var hora = d.getHours();
    var minutos = d.getMinutes();

    if(mes < 10)
    {
        mes = "0" + mes;
    }

    if (dia < 10) 
    {
        dia = "0" + dia;
    }

    var fechaactual = ano+"-"+mes+"-"+dia;

    document.getElementById('f_salida').value = fechaactual;

    if(hora < 10)
    {
        hora = "0" + hora;
    }
    if(minutos < 10)
    {
        minutos = "0" + minutos;
    }

    document.getElementById('h_salida').value = hora+":"+minutos;

    var idservicioentrada = document.getElementById('idservicioentrada').value;

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_ModificarBuscarId.php",
        type: "post",
        data : {idservicioentrada:idservicioentrada}		
    }).done(function(response)
    {
        $("#traeridservicio").html(response);
    });
    
    function BuscarEstadoPrenda()
    {
        $.ajax({
            url : "../../ajax/servicio_entrada/Ajax_Buscarestadoprenda.php",
            type: "post",
            data : {idservicioentrada:idservicioentrada}		
        }).done(function(response)
        {
            document.getElementById('estadoprendaseleccionado2').value = response;

            ServicioSalida();
        });
    }

    BuscarEstadoPrenda();
    

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_ModificarTablaDetalleServicio.php",
        type: "post",
        data : {idservicioentrada:idservicioentrada}		
    }).done(function(response)
    {
        $("#EditarTabladetalleservicio").html(response);
    });

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_ModificarBuscarCliente.php",
        type: "post",
        data : {idservicioentrada:idservicioentrada}		
    }).done(function(response)
    {
        var datos = JSON.parse(response);

        document.getElementById("idcliente").value = datos.idcliente;
        document.getElementById("nombres").value = datos.nombre;
        document.getElementById("apellidos").value = datos.apellido;
        document.getElementById("dni").value = datos.dni;
        document.getElementById("telefono").value = datos.telefono;

    });

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_ModificarBuscarDatos.php",
        type: "post",
        data : {idservicioentrada:idservicioentrada}		
    }).done(function(response)
    {
        var datos = JSON.parse(response);

        document.getElementById("idusuario").value = datos.idusuario;
        document.getElementById("nombresusuario").value = datos.usuario;
        document.getElementById("fechaentrada").value = datos.f_entrada;
        document.getElementById("horaentrada").value = datos.h_entrada;
        document.getElementById("importetotal").value = datos.importetotal;

        $('#comprobante > option[value="' + datos.comprobante + '"]').attr('selected', 'selected');
        $('#estadoprenda > option[value="' + datos.estado_prenda + '"]').attr('selected', 'selected');
        $('#tipodepago > option[value="' + datos.tipo_pago + '"]').attr('selected', 'selected');
    });

    function ServicioSalida()
    {

        $.ajax({
            url : "../../ajax/servicio_entrada/Ajax_ModificarServicioSalida.php",
            type: "post",
            data : {idservicioentrada:idservicioentrada}		
        }).done(function(response)
        {
            var datos = JSON.parse(response);

            var f_salida = datos.f_salida;
            var h_salida = datos.h_salida;

            document.getElementById("idserviciosalida").value = datos.idserviciosalida;
            document.getElementById("fechasalida").value = datos.f_salida;
            document.getElementById("horasalida").value = datos.h_salida;
            document.getElementById("costoretraso").value = datos.costoretraso; 
            document.getElementById("idsancioneseconomica").value = datos.idsancioneseconomicas;

            let estadoprendaseleccionado = $("#estadoprendaseleccionado2").val();

            if(estadoprendaseleccionado == "Terminado")
            {
                var objFecha1 = new Date();
                var objFecha2 = new Date(f_salida + " " + h_salida);            

                if(objFecha1 > objFecha2) 
                {
                    $('#exampleModalCenter').modal('toggle'); 
                    
                    document.getElementById("sancionesconomica").value = "Sancionado";
                    document.getElementById("botonsancion").style.display = "block"; 
                }
                else
                {
                    $('#exampleModalCenter').modal('hide');
                    document.getElementById("sancionesconomica").value = "NoSancionado";
                    document.getElementById("botonsancion").style.display = "none";
                }
            }    
            else
            {
                $('#exampleModalCenter').modal('hide');
                document.getElementById("sancionesconomica").value = "NoSancionado";
                document.getElementById("botonsancion").style.display = "none";
            }        
        });
    }

    $("#modificarservicios2").submit(function(event)
    {
        event.preventDefault(); 

        document.getElementById('comprobante').disabled = false;
        document.getElementById('tipodepago').disabled = false;
        document.getElementById('telefono').disabled = false;
    
        var data = $(this).serialize();
        var costoretraso = document.getElementById('costoretraso').value;

        if(costoretraso == "")
        {
            alert("Es Necesario Colocar un Costo de retraso");
        }
        else
        {
            $.ajax({
                url : "../../ajax/servicio_entrada/Ajax_ModificarServicios.php",
                type: "post",
                data : data 
            }).done(function(response)
            {                 
                //console.log(response);
                if (response.length > 9) 
                {
                    var cadena = response;
                    var fila = cadena.split('Terminado');
                    var tel = "" + fila;
                    var telefono = tel.substring(1);
    
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto!!!',
                        text: 'Se Guardo Correctamente',
                        confirmButtonText: `OK`           
                      }).then((result) => {
                        if (result.isConfirmed) 
                        {                      
                            window.open("https://api.whatsapp.com/send?phone=51"+ telefono+ "&text=Hola,%20Su%20Servicio%20estás%20Terminado,%20Puede%20venir%20a%20Recogerlo.", '_blank');
                            location.href = "plantillaServicioEntrada.php";
                        }
                      });
                }
                else
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Correcto!!!',
                        text: 'Se Guardo Correctamente',
                        confirmButtonText: `OK`           
                      }).then((result) => {
                        if (result.isConfirmed) 
                        {
                            location.href = "plantillaServicioEntrada.php";                   
                        }
                      });     
                }
            });
        }
    });


})
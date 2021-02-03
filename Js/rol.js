$(document).ready(function(){

	$.ajax({
		url : "../../ajax/roles/Ajax_NuevoidRol.php"		
    }).done(function(response)
    {
    $("#inputidrol").html(response);        		
    });
    
    $("#frmregistrarrol").submit(function(event){
        event.preventDefault();
    
        var data = $(this).serialize();
        
        $.ajax({
            url : "../../ajax/roles/Ajax_InsertarRol.php",
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
                    if (result.isConfirmed) {
                        location.reload();
                      }
                  });       
            } 
            else 
            {
                Swal.fire({
                    icon: 'Error al Registrar',
                    title: 'Oops...',
                    text: response             
                  });           
            } 
            
        });
    });

    function atributostabla()
    {
        $(document).ready(function() {    
            $('#tablaroles').DataTable({
            //para cambiar el lenguaje a español
                "language": {
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "sSearch": "Buscar:",
                        "oPaginate": {
                            "sFirst": "Primero",
                            "sLast":"Último",
                            "sNext":"Siguiente",
                            "sPrevious": "Anterior"
                        },
                        "sProcessing":"Procesando...",
                    }
            });     
        });
    }

    function Mostrartabla()
    {
        $.ajax({
            url : "../../ajax/roles/Ajax_TablaRol.php"		
        }).done(function(response){ 
            //donde se muestra los datos en la tabla
            $("#tablarol").html(response);

            atributostabla();

            //codigo para editar
            $('.modificar[type="button"]').on('click',function()
            {
            var id = this.id;                     
            var res = id.split("editar");
            var datos = res;

            var hola = "" + datos;
            var idroles = hola.substring(1);

            $.ajax({
                url : "../../ajax/roles/Ajax_BuscarIdRol.php",
                type: "post",
                data: {idroles:idroles}		
            }).done(function(response)
            {
            $("#formeditar").html(response); 
            
            $("#frmeditarrol").submit(function(event){
                event.preventDefault();
            
                var data = $(this).serialize();
                
                $.ajax({
                    url : "../../ajax/roles/Ajax_EditarRol.php",
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
                            title: 'Error al Registrar',
                            text: 'Oops...',
                            text: response             
                          });           
                    } 
                    
                });
            });

            });

            })

            //Codigo para Boton eliminar 
            $('.test[type="button"]').on('click',function(){
                                  
                    Swal.fire({
                        title: 'Esta un paso de Eliminar un Rol',
                        text: "¿Esta seguro de Eliminar este Rol?",
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
                            var idrol = hola.substring(1);

                            $.ajax({
                                url: '../../ajax/roles/Ajax_EliminarRol.php',
                                type: 'POST',
                                data: {idrol:idrol},
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
    }

    Mostrartabla();

})


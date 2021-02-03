
    function NuevoIDusuario()
    {
        $.ajax({
            url : "../../ajax/usuarios/Ajax_NuevoidUsuario.php"		
        }).done(function(response){ 
            $("#inputidusuario").html(response);
        });
    }

    NuevoIDusuario();

    function anidadosroles()
    {
        $.ajax({
            url : "../../ajax/usuarios/ajax_AnidadosRoles.php"		
        }).done(function(response){ 
            $("#divroles").html(response);
        });
    }

    anidadosroles();

    $("#frmregistrarusuario").submit(function(event){
        event.preventDefault();
    
        if($("#usuario").val().length == 0 || $("#clave").val().length == 0 || 
        $("#nombre").val().length == 0 || $("#apellidos").val().length == 0)
        {
            alert("Es necesario llenar todos los datos");
        }
        else
        {
            var data = $(this).serialize();
            
            $.ajax({
                url : "../../ajax/usuarios/Ajax_Registrarusuario.php",
                type: "post",
                data : data
            }).done(function(response){ 
                if (response == "ok") 
                    {
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto!!!',
                            text: 'Usuario Registrado',
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
                            icon: 'error',
                            title: 'Oops...',
                            text: response             
                        });           
                    }
                
            });
        }
    
    });

    function atributostabla()
    {
        $(document).ready(function() {    
            $('#listadousuario').DataTable({
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
            url : "../../ajax/usuarios/ajax_ListadoUsuario.php"		
        }).done(function(response){ 
            //donde se muestra los datos en la tabla
            $("#tablausuarios").html(response);

            atributostabla();

            //codigo para boton editar

            $('.modificar[type="button"]').on('click',function()
            {
            var id = this.id;                     
            var res = id.split("editar");
            var datos = res;

            var hola = "" + datos;
            var idusuario = hola.substring(1);

            $.ajax({
                url : "../../ajax/usuarios/Ajax_BuscarIdUsuario.php",
                type: "post",
                data: {idusuario:idusuario}		
            }).done(function(response)
            {
            $("#formeditar").html(response); 
            
            $("#frmeditarusuario").submit(function(event){
                event.preventDefault();
            
                var data = $(this).serialize();
                
                $.ajax({
                    url : "../../ajax/usuarios/Ajax_EditarUsuario.php",
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
                        title: 'Esta un paso de Eliminar a un Usuario',
                        text: "¿Esta seguro de Eliminar a este Usuario?",
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
                            var idusuario = hola.substring(1);

                            $.ajax({
                                url: '../../ajax/usuarios/ajax_EliminarUsuario.php',
                                type: 'POST',
                                data: {idusuario:idusuario},
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

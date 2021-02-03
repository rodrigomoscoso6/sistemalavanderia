$(document).ready(function(){

	$.ajax({
		url : "../../ajax/clientes/Ajax_NuevoidCliente.php"		
	}).done(function(response){
    $("#inputidcliente").html(response);        		
	});

})


$("#frmregistrarcliente").submit(function(event){
	event.preventDefault();

	var data = $(this).serialize();
	
	$.ajax({
		url : "../../ajax/clientes/Ajax_InsertarCliente.php",
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
                icon: 'warning',
                title: 'Oops...',
                text: response,
                confirmButtonText: `OK`             
              }).then((result) => {
                if (result.isConfirmed) {
                    
                  }
              });           
        } 
		
	});
});

function atributostabla()
{
    $(document).ready(function() {    
        $('#tablacliente').DataTable({
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
            url : "../../ajax/clientes/Ajax_TablaCliente.php"		
        }).done(function(response){ 
            //donde se muestra los datos en la tabla
            $("#traertabla").html(response);

            //aca lo pones
            atributostabla();
       
            //codigo para boton editar

            $('.modificar[type="button"]').on('click',function()
            {
            var id = this.id;                     
            var res = id.split("editar");
            var datos = res;

            var hola = "" + datos;
            var idcliente = hola.substring(1);

            $.ajax({
                url : "../../ajax/clientes/Ajax_BuscarIdCliente.php",
                type: "post",
                data: {idcliente:idcliente}		
            }).done(function(response)
            {
            $("#formeditar").html(response); 
            
            $("#frmeditarcliente").submit(function(event){
                event.preventDefault();
            
                var data = $(this).serialize();
                
                $.ajax({
                    url : "../../ajax/clientes/Ajax_EditarCliente.php",
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
                        title: 'Esta un paso de Eliminar al Cliente',
                        text: "¿Esta seguro de Eliminar este Cliente?",
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
                            var idcliente = hola.substring(1);

                            $.ajax({
                                url: '../../ajax/clientes/Ajax_EliminarCliente.php',
                                type: 'POST',
                                data: {idcliente:idcliente},
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
       
            //codigo para mostrar los datos de la tabla al formulario
            /*var table = document.getElementById("tablacliente2"),rIndex;
		
            for(var i=1; i< table.rows.length;i++){
                
                table.rows[i].onclick = function()
                {
                    rIndex = this.rowIndex;
                    if(this.cells[0].innerHTML)
                    {
                        var idcliente = this.cells[0].innerHTML;

                            $.ajax({
                                url : "../ajax/AjaxModificarCliente.php",
                                type: "post",
                                data : {idcliente:idcliente}
                            }).done(function(response){ 
                                $("#contenedor").html(response);
                                $('#contenedor').show();
                                $('#filtrodato').hide(); 
                                
                                //guardar los datos del formulario modificar
                                $("#frmmodificar").submit(function(event){
                                    event.preventDefault();
                               
                                    var data = $(this).serialize();
                                    
                                    $.ajax({
                                        url : "../ajax/AjaxModificarCliente2.php",
                                        type: "post",
                                        data : data
                                    }).done(function(response)
                                    { 
                                        alert(response); 
                                        location.reload();
                                    }); 
                                });
                            });
                    }                
                }
            }*/

        });
}

Mostrartabla();
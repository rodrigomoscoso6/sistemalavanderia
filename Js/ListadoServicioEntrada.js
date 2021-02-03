$(document).ready(function(){

    var d = new Date(); 
    var ano = d.getFullYear(); 
    var mes = d.getMonth()+1;
    var dia = d.getDate(); 
    
    
    if(mes < 10)
    {
        mes = "0" + mes;
    }
    
    if (dia < 10) 
    {
        dia = "0" + dia;
    }
    
    document.getElementById('filtrofecha').value = ano+"-"+mes+"-"+dia;

    $("#buscador").click(function()
    {
        var fecha = document.getElementById('filtrofecha').value;

        $.ajax({
            url : "../../ajax/servicio_entrada/Ajax_ListadoServicioentradafecha.php",
            type: 'POST',
            data: {fecha:fecha}		
        }).done(function(response)
        {
            $("#listadoservicioentrada").html(response);

            atributostabla()
        });
    })

function ListadoServicioEntrada()
    {
        $.ajax({
            url : "../../ajax/servicio_entrada/Ajax_ListadoServicioentrada.php"		
        }).done(function(response)
        {
            $("#listadoservicioentrada").html(response);

            atributostabla()

            $('.modificar[type="button"]').on('click',function()
            {
                var id = this.id;                     
                var res = id.split("editar");
                var datos = res;
            
                var hola = "" + datos;
                var id = hola.substring(1);
                var boton = "#editar" + id;

                //$(boton).load('plantillaModificarServicioEntrada.php'); codigo que incluye datos a la pagina
    
                window.location.replace("plantillaModificarServicioEntrada.php?id=" + id);
            });

            $('.eliminar[type="button"]').on('click',function()
            {
                Swal.fire({
                    title: 'Esta un paso de Eliminar el Servicio',
                    text: "¿Esta seguro de Eliminar este Servicio?",
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
                        var idservicioentrada = hola.substring(1);

                        $.ajax({
                            url: '../../ajax/servicio_entrada/Ajax_EliminarServicio.php',
                            type: 'POST',
                            data: {idservicioentrada:idservicioentrada},
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
                                        if (result.isConfirmed) 
                                        {
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

ListadoServicioEntrada();

function atributostabla()
{
    $(document).ready(function() {    
        $('#tablaservicioentrada2').DataTable({
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

})
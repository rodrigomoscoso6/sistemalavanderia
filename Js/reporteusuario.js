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
    
    document.getElementById('fechainicio').value = ano+"-"+mes+"-"+dia;
    document.getElementById('fechafin').value = ano+"-"+mes+"-"+dia;

    function ReporteTipoServicio()
    {

        $.ajax({
            url : "../../ajax/reportes/Ajax_reporteusuario.php"		
        }).done(function(response){
        
            $("#tablausuarios").html(response);

            $('#reporteusuario').DataTable(
                {
                    //para cambiar el lenguaje a español
                        orderCellsTop: true,
                        searching: false,
                        responsive: "true",
                        dom: 'Bfrtip',
                        buttons: [
                
                            {
                                extend: 'copyHtml5',
                                text: '<i class="far fa-copy"></i> Copy',
                                titleAttr: 'Copy',
                                className: 'btn btn-outline-info'
                            },
                            
                            {
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel"></i> Excel',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn excel btn-outline-success'
                            },
                
                                
                        ]/*, 
                        language: {
                                "lengthMenu": "Mostrar _MENU_ Registros",
                                "zeroRecords": "No se encontraron resultados",
                                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "oPaginate": {
                                    "sFirst": "Primero",
                                    "sLast":"Último",
                                    "sNext":"Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "sProcessing":"Procesando...",
                            }*/
            });

            $('#botonreporte').click(function()
            {
                location.href = "../mpdfgeneral/mpdfreportesusuario.php?accion=mostratodo";
            })
        
        });
    }

    ReporteTipoServicio();

    function ReporteTipoServiciofecha()
    {
        $("#buscar").click(function(event)
        {
            event.preventDefault();
            var f_inicio = $('#fechainicio').val();
            var f_fin = $('#fechafin').val();

            $.ajax({
                url: "../../ajax/reportes/Ajax_reporteusuariofecha.php",
                type: 'POST',
                data: {f_inicio:f_inicio, f_fin:f_fin}
            }).done(function(response)
            {
                
                $("#tablausuarios").html(response);

                $('#reporteusuario').DataTable(
                {
                    //para cambiar el lenguaje a español
                        orderCellsTop: true,
                        searching: false,
                        responsive: "true",
                        dom: 'Bfrtip',
                        buttons: [
                
                            {
                                extend: 'copyHtml5',
                                text: '<i class="far fa-copy"></i> Copy',
                                titleAttr: 'Copy',
                                className: 'btn btn-outline-info'
                            },
                            
                            {
                                extend: 'excelHtml5',
                                text: '<i class="fas fa-file-excel"></i> Excel',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn excel btn-outline-success'
                            },
                
                                
                        ],
                        language: {
                                "lengthMenu": "Mostrar _MENU_ Registros",
                                "zeroRecords": "No se encontraron resultados",
                                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                                "oPaginate": {
                                    "sFirst": "Primero",
                                    "sLast":"Último",
                                    "sNext":"Siguiente",
                                    "sPrevious": "Anterior"
                                },
                                "sProcessing":"Procesando...",
                            }
                });    

                $('#botonreporte').click(function()
                {
                    var f_inicio = document.getElementById('fechainicio').value;
                    var f_fin = document.getElementById('fechafin').value;
                
                    location.href = "../mpdfgeneral/mpdfreportesusuario.php?accion=filtro&fechainicio=" + f_inicio +"&fechafin=" + f_fin;               
                })

            });
        });
    }

    ReporteTipoServiciofecha();
    

})
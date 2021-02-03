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


$fechainicio = document.getElementById('fechainicio').value = ano+"-"+mes+"-"+dia;
document.getElementById('fechafin').value = ano+"-"+mes+"-"+dia;

    function ListadoReportesfecha()
    {
            $.ajax({
                url : "../../ajax/reportes/ajax_reportesFecha.php"		
            }).done(function(response)
            {
                
                $("#listadoreportesxfecha").html(response);

                $('#tablaxfecha').DataTable({
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
                    location.href = "../mpdfgeneral/mpdfreportesfecha.php?accion=mostratodo";
                })

            });
    }

    ListadoReportesfecha();


    function ListadoReportesporFechaInicioFechaFin()
    {
        $("#buscar").click(function(event)
        {
            event.preventDefault();
            var inicio = $('#fechainicio').val();
            var fin = $('#fechafin').val();

            $.ajax({
                url: "../../ajax/reportes/ajax_reportesFechaBuscar.php",
                type: 'POST',
                data: {fechainicio:inicio, fechafin:fin}
            }).done(function(response)
            {
                
                $("#listadoreportesxfecha").html(response);

                $('#tablaxfechainicioyfechafin').DataTable(
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

                $('#botonreporte').click(function(){

                    var f_inicio = document.getElementById('fechainicio').value;
                    var f_fin = document.getElementById('fechafin').value;
                
                    location.href = "../mpdfgeneral/mpdfreportesfecha.php?accion=filtro&fechainicio=" + f_inicio +"&fechafin=" + f_fin;
                    
                })

            });
        });
    }

    ListadoReportesporFechaInicioFechaFin();

});
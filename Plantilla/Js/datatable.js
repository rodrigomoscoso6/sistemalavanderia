$(document).ready(function() {    
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
});


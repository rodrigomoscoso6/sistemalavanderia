$(document).ready(function(){

    $.ajax({
        url : "../../ajax/graficos/Ajax_CantidadUsuarios.php"		
    }).done(function(response)
    {
        document.getElementById('cantidadusuario').innerHTML = response;
    });

    $.ajax({
        url : "../../ajax/graficos/Ajax_CantidadCliente.php"		
    }).done(function(response)
    {
        document.getElementById('cantidadcliente').innerHTML = response;
    });

    $.ajax({
        url : "../../ajax/graficos/Ajax_CantidadTipoServicio.php"		
    }).done(function(response)
    {
        document.getElementById('cantidadtiposervicio').innerHTML = response;
    });

    $.ajax({
        url : "../../ajax/graficos/Ajax_CantidadImporteTotal.php"		
    }).done(function(response)
    {
        document.getElementById('cantidadimportetotal').innerHTML = "S/ " + response;
    });

})









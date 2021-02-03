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

    document.getElementById('fechasalido').value = ano+"-"+mes+"-"+dia;
    document.getElementById('fechaentrada').value = ano+"-"+mes+"-"+dia;
    
    if(hora < 10)
    {
        hora = "0" + hora;
    }
    if(minutos < 10)
    {
        minutos = "0" + minutos;
    }

    document.getElementById('horasalido').value = hora+":"+minutos;
    document.getElementById('horaentrada').value = hora+":"+minutos;

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_NuevoIdServicioEntrada.php"		
    }).done(function(response)
    {
        $("#idservicioentrada").html(response);
    });

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_NuevoIdServicioSalida.php"		
    }).done(function(response)
    {
        $("#traeridserviciosalida").html(response);
    });

    $("#facturar").click(function()
    {
        var importetotal = document.getElementById('importetotal').innerHTML;
        var idserviciosalida = document.getElementById('idserviciosalida').value;
        var fechasalida = document.getElementById('fechasalido').value;
        var horasalida = document.getElementById('horasalido').value;
        var idcompleto = document.getElementById('mostraridservicio').innerHTML;       
        var nombre = document.getElementById('nombres').value;
        var apellido = document.getElementById('apellidos').value;
        var nombreapellido = nombre + " " + apellido;
        var dni = document.getElementById('dni').value;

            $.ajax({
                url : "../../ajax/servicio_entrada/Ajax_RegistrarServicioEntrada.php",
                type: "post",
                data : {importetotal:importetotal,idserviciosalida:idserviciosalida,
                fechasalida:fechasalida,horasalida:horasalida,idcompleto:idcompleto,
                nombreapellido:nombreapellido,dni:dni}
            }).done(function(response)
            {                               
                Swal.fire({
                    title: '¿Esta seguro que el cliente no quiere mas Servicio?',
                    text: "Si el cliente no quiere mas Servicio,Presione Confirmar",
                    icon: "warning",
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, Confirmar!',
                    cancelButtonText: 'Cancelar'          
                    }).then((result) => {
                      if (result.isConfirmed) 
                        {
                            location.reload();                        
                            //location.href = "plantillaServicioEntrada.php";
                        }                   
                    });                              
            });
      
    });

    function ListadoDetalleCompra(){

    $.ajax({
        url : "../../ajax/servicio_entrada/Ajax_MostrarTabla.php"		
    }).done(function(response)
    { 
        $("#tablaservicio").html(response);

        $('.mas[type="button"]').on('click',function()
        {
            var id = this.id;                     
            var res = id.split("mas");
            var datos = res;
        
            var hola = "" + datos;
            var key = hola.substring(1);

            var accion = "mas";

            $.ajax({
                url: '../../ajax/servicio_entrada/Ajax_botonesmasmenos.php',
                type: 'POST',
                data: {accion:accion,key:key},
                success:function(response)
                {
                    setTimeout(ListadoDetalleCompra(), 1000);
                } 
            });
        });
        
        $('.menos[type="button"]').on('click',function()
        {
            var id = this.id;                     
            var res = id.split("menos");
            var datos = res;
        
            var hola = "" + datos;
            var key = hola.substring(1);
            var accion = "menos";

            $.ajax({
                url: '../../ajax/servicio_entrada/Ajax_botonesmasmenos.php',
                type: 'POST',
                data: {accion:accion,key:key},
                success:function(response)
                {    
                    setTimeout(ListadoDetalleCompra(), 1000);                             
                } 
            });
        });

        $('.test[type="button"]').on('click',function(){
                                  
            Swal.fire({
                title: 'Esta un paso de Eliminar un Servicio',
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
                    var indice = hola.substring(1);
                  
                    $.ajax({
                        url: '../../ajax/servicio_entrada/Ajax_EliminarTabla.php',
                        type: 'POST',
                        data: {indice:indice},
                        success:function(response)
                        {
                            setTimeout(ListadoDetalleCompra(), 1000);                        
                        } 
                    });
                    
                    }
                });                               
            });

        }); 
    }

    ListadoDetalleCompra();

        $.ajax({
            url : "../../ajax/servicio_entrada/Ajax_AnidadosTipoServicio.php"		
        }).done(function(response){ 
            $("#anidadotiposervicio").html(response);
       
            $("#tiposervicio").change(function() 
            {
                let dato = $(this).val();
                
                $.ajax({
                    url : "../../ajax/servicio_entrada/Ajax_DatosAnidados.php",
                    type: "post",
                    data: {dato:dato}		
                }).done(function(response)
                {
                  var datos = JSON.parse(response);
                 
                  document.getElementById("kg").innerHTML = datos.medida;
                  document.getElementById("precio").value = datos.precio;
                  var cantidad = document.getElementById("medida").value;
                 
                    var cantidad = document.getElementById("medida").value;
                    var precio = document.getElementById("precio").value;

                    var calcular = cantidad * precio;

                    document.getElementById("total").value = calcular.toFixed(2);
                                   
                }); 

            });

        });

        $("#guardartabla").submit(function(event){
            event.preventDefault();
        
            idservicioentrada = document.getElementById("mostraridservicio").innerHTML;
            document.getElementById('precio').disabled = false;
            document.getElementById('total').disabled = false;
            kg = document.getElementById("kg").innerHTML;

            var combo = $("#tiposervicio option:selected").text();
            var datos = $(this).serialize();
                                  
            $.ajax({
                url : "../../ajax/servicio_entrada/Ajax_GuardarTabla.php",
                type: "post",
                data : datos + '&combo=' + combo + '&idservicioentrada='+ idservicioentrada+'&kg=' + kg
            }).done(function(response)
            {               
                Swal.fire({
                    icon: 'success',
                    title: 'Correcto!!!',
                    text: 'Se agrego correctamente',
                    confirmButtonText: `OK`           
                }).then((result) => {
                    if (result.isConfirmed) 
                    {
                        setTimeout(ListadoDetalleCompra(), 1000);
                    }
                });               
            });
        });
    
    function Calcular()
    {
        $('#medida').keyup(function() 
        {
            
            var cantidad = document.getElementById("medida").value;
            var precio = document.getElementById("precio").value;

            var calcular = cantidad * precio;

            document.getElementById("total").value = calcular.toFixed(2);

        });
    }

    Calcular();


    function atributostabla()
    {
        $(document).ready(function() {    
            $('#tablacliente2').DataTable({
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
                url : "../../ajax/servicio_entrada/Ajax_TablaCliente.php"		
            }).done(function(response){ 
                //donde se muestra los datos en la tabla
                $("#mostrartablacliente").html(response);

                //aca lo pones
                atributostabla();

                var table = document.getElementById("tablacliente2"),rIndex;
            
                for(var i=1; i< table.rows.length;i++){
                    
                    table.rows[i].onclick = function()
                    {
                        rIndex = this.rowIndex;
                        if(this.cells[0].innerHTML)
                        {
                            var idcliente = this.cells[0].innerHTML;
                            var nombre = this.cells[1].innerHTML;
                            var apellidos = this.cells[2].innerHTML;
                            var dni = this.cells[3].innerHTML;
                            var telefono = this.cells[5].innerHTML;

                            document.getElementById("idcliente").value = idcliente;
                            document.getElementById("nombres").value = nombre;
                            document.getElementById("apellidos").value = apellidos;
                            document.getElementById("dni").value = dni;
                            document.getElementById("telefonos").value = telefono;

                            $('#exampleModal').modal('hide');
                        }                
                    }
                }
                

            });
    }

    Mostrartabla();

})

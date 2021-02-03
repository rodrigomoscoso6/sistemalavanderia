$("#login").submit(function(e) {
    
    e.preventDefault();
    
    var data = $(this).serialize();

    $.ajax({
        url: "ajax/usuarios/ajax_Login.php",
        type: "POST",
        data: data
    }).done(function(response) 
    {
        if (response == "Bienvenido") 
        {
            Swal.fire({
                icon: 'success',
                title: 'Correcto!!!',
                text: 'Bienvenido al Sistema',
                confirmButtonText: `OK`           
              }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "Vista/usuarios/plantillaGeneral.php";
                    console.log(response);
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
});
  
    

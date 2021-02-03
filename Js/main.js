function Mostrarol()
{

    var valor = document.getElementById("capturarrol").innerHTML; 
    
    if(valor == "ADMINISTRADOR")
    {
        document.getElementById("menuusuarios").style.display = "block"; 
    }
    else
    {
        document.getElementById("menuusuarios").style.display = "none";
    }
    
}

Mostrarol();

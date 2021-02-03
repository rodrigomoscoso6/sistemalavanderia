
function ver()
{

$.ajax({
  url : "../../ajax/graficos/Ajax_QueTipoServicioSaleMas.php"		
}).done(function(response){ 
  var data = JSON.parse(response);

  var tiposervicio = [];
  var cantidad = [];
  
  for (var i=0; i< data.tiposervicio.length;i++) 
  {
      tiposervicio.push(data.tiposervicio[i]);
      cantidad.push(data.cantidad[i]); 
  }
  var oilCanvas = document.getElementById("myPieChart");
  Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 10;

var oilData = {
    labels: tiposervicio,
    datasets: [
        {
            data: cantidad,
            backgroundColor: [
                "#A0522D",
                "#00FFFF", 
                "#7FFFD4",
                "#F5F5DC",
                "#0000FF",
                "#8A2BE2",
                "#A52A2A",
                "#5F9EA0",
                "#7FFF00",
                "#D2691E",
                "#6495ED",
                "#DC143C",
                "#B8860B",
                "#A9A9A9",
                "#006400",
                "#8B008B",
                "#556B2F",
                "#FFD700",
                "#ADFF2F",
                "#800000",
                "#48D1CC"
            ]
        }]
};

var pieChart = new Chart(oilCanvas, {
  type: 'pie',
  data: oilData
});

});
}

ver();

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" >
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Ejemplo PHP MySQLi POO MVC</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <title>.: GRAFICOS :.</title>
        <style>
            .container2 .panel {
                position: absolute;
                top: 20%;
            
                width: 100%;
            }
            .principal{
                position:relative;
            }
            footer {
                padding-top:10px;
                width:100%;
                top: 80%;
                height:60px;
                position:relative;
                bottom:0;
                border-top: solid 5px #FAAF3A;
            }
            div{
                margin:0px;
                padding: 0px;
            }
        </style>
        <script type="text/javascript">
        window.onload = function () {
            <?php if($numDesactivado != null || $numFinalizado != null || $numPendiente != null || $numPorConfirmar != null) {?>
            var chart = new CanvasJS.Chart("chartContainer",
            {
                    title:{
                            text: "Prestamos por Estado",
                            fontSize: 20,
                            fontFamily: "arial black"
                    },
                    exportEnabled: true,
                    animationEnabled: true,
                    legend: {
                            verticalAlign: "bottom",
                            horizontalAlign: "center"
                    },
                    theme: "theme1",
                    data: [
                    {        
                            type: "pie",
                            indexLabelFontFamily: "Garamond",       
                            indexLabelFontSize: 20,
                            indexLabelFontWeight: "bold",
                            startAngle:0,
                            indexLabelFontColor: "MistyRose",       
                            indexLabelLineColor: "darkgrey", 
                            indexLabelPlacement: "inside", 
                            toolTipContent: "{name}: {y} prestamo(s)",
                            showInLegend: true,
                            indexLabel: "#percent%", 
                            dataPoints: [                         
                                    {  y: <?php echo $numDesactivado ?>, name: "Desactivado", legendMarkerType: "circle"},
                                    {  y:  <?php echo $numFinalizado ?>, name: "Finalizado", legendMarkerType: "circle"},
                                    {  y:  <?php echo $numPendiente ?>, name: "Pendiente", legendMarkerType: "circle"},
                                    {  y:  <?php echo $numPorConfirmar ?>, name: "Por Confirmar", legendMarkerType: "circle"}
                            ]
                    }
                    ]
            });
            chart.render();
            <?php } ?>  
              <?php if($grafico2 != null) {?>
            var chart2 = new CanvasJS.Chart("chartContainer2",
            {
            zoomEnabled: true,      
             exportEnabled: true,
            title:{
                text: "Prestamos solicitados por Mes", 
                fontSize: 20,
                fontFamily: "arial black"
            },
            axisY: {
                title: "Prestamos"               
            }, 
            axisX:{
                interval: 1,
                intervalType: "month",
                title: "Meses",
                valueFormatString: "MMM"
            },
            data:   [
                    {        
                      type: "line",
                      dataPoints: [                  
                              <?php foreach($grafico2 as $row) { ?>
                                {x: new Date(2018,<?php echo $row->mes-1; ?>, 1) , y: <?php echo $row->cantidad; ?>},
                              <?php } ?>  
                                ]
                    }
                ]
            });
            chart2.render();
            <?php } ?>
            <?php if($grafico3 != null) {?>
            var chart3 = new CanvasJS.Chart("chartContainer3",
            {
                title:{
                  text: "Prestamos solicitados por Usuario",
                  fontSize: 20,
                  fontFamily: "arial black"
                },
                axisY: {			
			title: "Prestamos"		
		}, 
		axisX: {
			title: "Usuarios"
		},
                exportEnabled: true,
                animationEnabled: true,              
                legend: {
                  verticalAlign: "bottom",
                  horizontalAlign: "center"
                },
                theme: "theme2",        
                data: [

                    {        
                      type: "column",        
                      toolTipContent: "{label}: {y} prestamos",
                      legendMarkerColor: "grey",
                      dataPoints: [  
                      <?php foreach($grafico3 as $row) { ?>
                        {y: <?php echo $row->cantidad; ?> , label: '<?php echo $row->nombre; ?>'},
                      <?php } ?>       
                      ]
                    }   
                ]
            });
            chart3.render();
            <?php } ?>
             <?php if($grafico4 != null) {?>
            var chart4 = new CanvasJS.Chart("chartContainer4",
            {
                title:{
                  text: "Materiales por Categoria",
                  fontSize: 20,
                  fontFamily: "arial black"
                },
                axisY: {			
			title: "materiales"		
		}, 
		axisX: {
			title: "categorias"
		},
                exportEnabled: true,
                animationEnabled: true,              
                legend: {
                  verticalAlign: "bottom",
                  horizontalAlign: "center"
                },
                theme: "theme2",        
                data: [

                    {        
                      type: "column",        
                      toolTipContent: "{label}: {y} materiales",
                      legendMarkerColor: "grey",
                      dataPoints: [  
                      <?php foreach($grafico4 as $row) { ?>
                        {y: <?php echo $row->cantidad; ?> , label: '<?php echo $row->nombre; ?>'},
                      <?php } ?>       
                      ]
                    }   
                ]
            });
            chart4.render();
            <?php } ?>
             <?php if($grafico5 != null) {?>
            var chart5 = new CanvasJS.Chart("chartContainer5",
            {
                    title:{
                            text: "Materiales solicitados",
                            fontSize: 20,
                            fontFamily: "arial black"
                    },
                    exportEnabled: true,
                    animationEnabled: true,
                    legend: {
                            verticalAlign: "bottom",
                            horizontalAlign: "center"
                    },
                    theme: "theme1",
                    data: [
                    {        
                            type: "pie",
                            indexLabelFontFamily: "Garamond",       
                            indexLabelFontSize: 20,
                            indexLabelFontWeight: "bold",
                            startAngle:0,
                            indexLabelFontColor: "MistyRose",       
                            indexLabelLineColor: "darkgrey", 
                            indexLabelPlacement: "inside", 
                            toolTipContent: "{name}: {y} prestamo(s)",
                            showInLegend: true,
                            indexLabel: "#percent%", 
                            dataPoints: [    
                                <?php foreach($grafico5 as $row) { ?>
                                    {  y:  <?php echo $row->cantidad; ?>, name: '<?php echo $row->nombre; ?>', legendMarkerType: "circle"},
                                  <?php } ?>            
                                
                           ]
                    }
                    ]
            });
            chart5.render();
            <?php } ?> 
            <?php if($grafico6 != null) {?>
            var chart6 = new CanvasJS.Chart("chartContainer6",
            {
            zoomEnabled: true,      
             exportEnabled: true,
            title:{
                text: "Materiales por mes y gastos", 
                fontSize: 20,
                fontFamily: "arial black"
            },
            axisY: {
                title: "Materiales"               
            }, 
            axisX:{
                interval: 1,
                intervalType: "month",
                title: "Meses",
                valueFormatString: "MMM"
            },
            data:   [
                    {        
                      type: "line",
                      toolTipContent: "{y} materiales(s) y un gasto total de ${name}",
                      dataPoints: [                  
                              <?php foreach($grafico6 as $row) { ?>
                                {x: new Date(2018,<?php echo $row->mes-1; ?>, 1) , y: <?php echo $row->cantidad; ?> , name: '<?php echo $row->plata; ?>'},
                              <?php } ?>  
                                ]
                    }
                ]
            });
            chart6.render();
            <?php } ?>
    }
    </script>
    </head>
    <body style="background-color:#012C56;" >
        
        <div class="container2">  
            <div style="width: 100%;height:60px;text-align: center;background-color: #B0B0B0;padding-top: 4px;position: relative"><font color="white" ><b><h3>ESTADISTICAS DE PRESTAMOS</h3></b></div>
            <div style="width: 100%;height:420px;text-align: center;padding-top: 2px;position: relative">
            <div id="chartContainer" style="width: 31%;position: absolute;left: 1%;margin-top:3px;"><img src="view/img/alerta.png" width="50%" height="50%" alt=""/><br><b>Datos insuficientes</b></div>
            <div id="chartContainer2" style="width: 31%;position: absolute;left: 34.5%;margin-top:3px;"><img src="view/img/alerta.png" width="50%" height="50%" alt=""/><br><b>Datos insuficientes</b></div>
            <div id="chartContainer3" style="width: 31%;position: absolute;left: 68%;margin-top:3px;"><img src="view/img/alerta.png" width="50%" height="50%" alt=""/><br><b>Datos insuficientes</b></div>
            </div>
            <div style="width: 100%;height:60px;text-align: center;background-color: #B0B0B0;padding-top: 2px;position: relative"><font color="white" ><b><h3>ESTADISTICAS DE MATERIALES</h3></b></div>
            <div style="width: 100%;height:420px;text-align: center;padding-top: 2px;position: relative">
                  <div id="chartContainer4" style="width: 31%;position: absolute;left: 1%;margin-top:3px;"><img src="view/img/alerta.png" width="50%" height="50%" alt=""/><br><b>Datos insuficientes</b></div>
            <div id="chartContainer5" style="width: 31%;position: absolute;left: 34.5%;margin-top:3px;"><img src="view/img/alerta.png" width="50%" height="50%" alt=""/><br><b>Datos insuficientes</b></div>
            <div id="chartContainer6" style="width: 31%;position: absolute;left: 68%;margin-top:3px;"><img src="view/img/alerta.png" width="50%" height="50%" alt=""/><br><b>Datos insuficientes</b></div>
            </div>
          
                
        </div>
                <footer><center><img src="view/img/logo.png" alt="Duoc Uc"/><center></footer>
    </body>
</html>

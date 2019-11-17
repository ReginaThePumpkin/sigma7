<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<!-- Include the heartcode canvasloader js file -->
	<script src="../funciones/js/heartcode-canvasloader-min-0.9.1.js"></script>
	
	
	<style type="text/css">
		.animacion {
	position: absolute;
	top: 50%;
	left: 50%;
		}
		#contenedor_animacion{
	position: absolute;
	width: 99%;
	height: 99%;
	z-index: 1000;
		}
	</style>
</head>
<body onUnload="animacion()">
	
	<div id="contenedor_animacion">
    <!-- Create a div which will be the canvasloader wrapper -->	
	<div id="canvasloader-container" class="animacion">put</div>
		
	<!-- This script creates a new CanvasLoader instance and places it in the wrapper div -->
    </div>
<script type="text/javascript">
		var cl = new CanvasLoader('canvasloader-container');
		cl.setColor('#285269'); // default is '#000000'
		cl.setShape('roundRect'); // default is 'oval'
		cl.setDiameter(128); // default is 40
		cl.setDensity(53); // default is 40
		cl.setRange(1.1); // default is 1.3
		cl.setSpeed(4); // default is 2
		cl.setFPS(12); // default is 24
		cl.show(); // Hidden by default
		
		// This bit is only for positioning - not necessary
		  var loaderObj = document.getElementById("canvasLoader");
  		loaderObj.style.position = "absolute";
  		loaderObj.style["top"] = cl.getDiameter() * -0.5 + "px";
  		loaderObj.style["left"] = cl.getDiameter() * -0.5 + "px";
    </script>
<script>
 function animacion(){
	 document.getElementById("contenedor_animacion").style.display="none";
	 document.getElementById("canvasloader-container").style.display="none";
}
 </script>
</body>
</html>
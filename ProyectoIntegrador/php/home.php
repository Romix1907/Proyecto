

<!DOCTYPE html>
<html lang="es" dir="ltr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="../css/home.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<title>Chocolatemia</title>
</head>
<body>
<?php
	require('menu.php');
  require_once("funciones.php");
?>
	<main>
		<h2 class="bienvenido">
			<?php
			var_dump($_COOKIE);
			if(estaLogueado()){
				foreach($usuarios as $usuario){
					if($usuario["genero"]==f){
						echo "¡Bienvenida, ".$usuario["nombre"]."!";
					} else if($usuario["genero"]==m){
						echo "¡Bienvenido, ".$usuario["nombre"]."!";
					} else if($usuario["genero"]==nb){
						echo "¡Bienvenide, ".$usuario["nombre"]."!";
					}
				}
			} else echo "¡Bienvenido!"

			?></h2>

		<div class="slider">
		<input type="radio" class="boton" name="boton" checked="checked">
		<label></label>
		<input type="radio" class="boton" name="boton">
		<label></label>
		<input type="radio" class="boton" name="boton">
		<label></label>
		<input type="radio" class="boton" name="boton">
		<label></label>

		<div class="contenedor-img cuatro-imagenes">
			<img src="../Imagenes/img/especial1.jpg">
			<img src="../Imagenes/img/especial2.jpg">
			<img src="../Imagenes/img/especial3.jpg">
			<img src="../Imagenes/img/especial4.jpg">
		</div>

	</div>

</main>
<br>
<?php
include('footer.php');
?>
</body>
</html>

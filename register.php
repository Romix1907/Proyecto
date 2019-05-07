<?php

 require_once("funciones.php");

 $errores = [];

 $nombreDefault = "";
 $apellidoDefault = "";
 $fechaDefault = "";
 $emailDefault = "";
 $telefonoDefault = "";

if ($_POST) {
  $errores = validarRegistracion();

  if (count ($errores) ==  0) {

  $usuario = armarUsuario();

  guardarUsuario($usuario);

  guardarAvatar($usuario);
  //si se loguea bien, setea una cookie que despues uso en la funcion estaLogueado
  setcookie("email",$_POST["email"]);
  header("location:home.php");
  }

  $nombreDefault = $_POST["nombre"];
  $apellidoDefault = $_POST["apellido"];
  $fechaDefault = $_POST["fecha"];
  $emailDefault = $_POST["email"];
  $telefonoDefault = $_POST["telefono"];

}

?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chocolatemia</title>
    <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../css/home.css">
  </head>
  <body>
    <?php
    require('menu.php');
    ?>

<form class="register" action="register.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <h2 style="color:white" class="registrate">Registrate</h2>
<label for="nombre">Nombre</label>
<input id="nombre" type="text" name="nombre" value="<?=$nombreDefault?>" placeholder="Ingrese su nombre aquí *">
<?php if (isset($errores["nombre"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["nombre"]?></p>
<?php endif; ?>
</p>
<p>
<label for="apellido">Apellido</label>
<input id="apellido"type="text" name="apellido" value="<?=$apellidoDefault?>" placeholder="Ingrese su apellido aquí *">
<?php if (isset($errores["apellido"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["apellido"]?></p>
<?php endif; ?>
</p>
<p>
<label for="fecha">Fecha de Nacimiento</label>
<input id="fecha"type="date" name="fecha" value="<?=$fechaDefault?>">
<?php if (isset($errores["fecha"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["fecha"]?></p>
<?php endif; ?>
</p>
<p>
<label for="email">Email</label>
<input id="email" type="email" name="email" value="<?=$emailDefault?>"placeholder="nombre@nombre.com *">
<?php if (isset($errores["email"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["email"]?></p>
<?php endif; ?>
</p>
<p>
<label for="password">Contraseña</label>
<input id="password" type="password" name="password" value="" placeholder="Contraseña *">
<?php if (isset($errores["password"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["password"]?></p>
<?php endif; ?>
</p>
<p>
<label for="cpassword">Confirmar Contraseña</label>
<input id="cpassword" type="password" name="cpassword" value="" placeholder="Confirme contraseña *">
<?php if (isset($errores["cpassword"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["cpassword"]?></p>
<?php endif; ?>
</p>
<p>
  <label for="avatar">Selecciona tu Avatar</label>
  <input type="file" name="avatar" value="">
  <?php if (isset($errores["avatar"])) : ?>
    <p style="color:red; font-size: 15px;"><?=$errores["avatar"]?></p>
  <?php endif; ?>
</p>
<p>
<label for="telefono">Teléfono</label>
<input id="telefono" type="text" name="telefono" value="<?=$telefonoDefault?>" placeholder="Número de teléfono *">
<?php if (isset($errores["telefono"])) : ?>
  <p style="color:red; font-size: 15px;"><?=$errores["telefono"]?></p>
<?php endif; ?>
</p>
<p>
<br>
<label for="genero">Género</label>
<br>
<?php if (isset($_POST["genero"]) && $_POST["genero"] == "m"): ?>
<input id="genero"type="radio" name="genero" value="m" checked>M
<?php else : ?>
<input id="genero"type="radio" name="genero" value="m">M
<?php endif; ?>
<br>
<?php if (isset($_POST["genero"]) && $_POST["genero"] == "f"): ?>
<input id="genero"type="radio" name="genero" value="f" checked>F
<?php else : ?>
<input id="genero"type="radio" name="genero" value="f">F
<?php endif; ?>
<br>
<?php if (isset($_POST["genero"]) && $_POST["genero"] == "o"): ?>
<input id="genero"type="radio" name="genero" value="nb" checked>No binario
<?php else : ?>
<input id="genero"type="radio" name="genero" value="nb">No binario
<?php endif; ?>
</p>
<p>
<br>
<label for="favoritos">Seleccione su sabor preferido de Chocolatemia</label>
<br>
<?php if (isset($_POST["favoritos"]) && $_POST["favoritos"] == "b"): ?>
<input id="favoritos"type="checkbox" name="favoritos" value="b" checked>Blanco
<?php else : ?>
<input id="favoritos"type="checkbox" name="favoritos" value="b">Blanco
<?php endif; ?>
<br>
<?php if (isset($_POST["favoritos"]) && $_POST["favoritos"] == "a"): ?>
<input id="favoritos"type="checkbox" name="favoritos" value="a" checked>Amargo
<?php else : ?>
<input id="favoritos"type="checkbox" name="favoritos" value="a">Amargo
<?php endif; ?>
<br>
<?php if (isset($_POST["favoritos"]) && $_POST["favoritos"] == "l"): ?>
<input id="favoritos"type="checkbox" name="favoritos" value="l" checked>Con Leche
<?php else : ?>
<input id="favoritos"type="checkbox" name="favoritos" value="l">Con Leche
<?php endif; ?>
<br>
<?php if (isset($_POST["favoritos"]) && $_POST["favoritos"] == "fs"): ?>
<input id="favoritos"type="checkbox" name="favoritos" value="fs" checked>Con Frutos Secos
<?php else : ?>
<input id="favoritos"type="checkbox" name="favoritos" value="fs">Con Frutos Secos
<?php endif; ?>
<br>
<?php if (isset($_POST["favoritos"]) && $_POST["favoritos"] == "r"): ?>
<input id="favoritos"type="checkbox" name="favoritos" value="r" checked>Rellenos
<?php else : ?>
<input id="favoritos"type="checkbox" name="favoritos" value="r">Rellenos
<?php endif; ?>
</p>
<p>
<br>
<label class="com"for="com">COMENTARIOS</label>
<br>
<textarea id="com" name="com" rows="8" cols="80"></textarea>
</p>
<p>
<button class="btn" type="submit" name="btn" value="Enviar Datos">ENVIAR</button>
<button type="reset" name="button">REINICIAR</button>
</p>
</div>
</form>
<?php
include ('footer.php');
?>
</body>
</html>

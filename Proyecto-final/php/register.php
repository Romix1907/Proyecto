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
  header("location:home.php"); exit;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <title>Chocolatemia</title>
    </head>
    <body>
     <div class="contenedor">

      <?php
      require_once("menu.php");
      ?>

    <main>
      <div class="form-register">
    <form class="register" action="register.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <h1 style="color:white">Registrate</h1>
    <label for="nombre" class="label-registro">Nombre</label>
    <input id="nombre" type="text" name="nombre" value="<?=$nombreDefault?>" placeholder="Ingrese su nombre *">
    <?php if (isset($errores["nombre"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["nombre"]?></mark>
    <?php endif; ?>
    </p>
    <p>
    <label for="apellido" class="label-registro">Apellido</label>
    <input id="apellido"type="text" name="apellido" value="<?=$apellidoDefault?>" placeholder="Ingrese su apellido *">
    <?php if (isset($errores["apellido"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["apellido"]?></mark>
    <?php endif; ?>
    </p>
    <p>
    <label for="fecha" class="label-registro">Fecha de nacimiento</label>
    <input id="fecha"type="date" name="fecha" value="<?=$fechaDefault?>">
    <?php if (isset($errores["fecha"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["fecha"]?></mark>
    <?php endif; ?>
    </p>
    <p>
    <label for="email" class="label-registro">Email</label>
    <input id="email" type="email" name="email" value="<?=$emailDefault?>"placeholder="nombre@nombre.com *">
    <?php if (isset($errores["email"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["email"]?></mark>
    <?php endif; ?>
    </p>
    <p>
    <label for="password" class="label-registro">Contraseña</label>
    <input id="password" type="password" name="password" value="" placeholder="Contraseña *">
    <?php if (isset($errores["password"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["password"]?></mark>
    <?php endif; ?>
    </p>
    <p>
    <label for="cpassword" class="label-registro">Confirmar contraseña</label>
    <input id="cpassword" type="password" name="cpassword" value="" placeholder="Confirme contraseña *">
    <?php if (isset($errores["cpassword"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["cpassword"]?></mark>
    <?php endif; ?>
    </p>
    <p>
      <label for="avatar" class="label-registro">Foto de perfil</label>
      <input type="file" name="avatar" value="">
      <?php if (isset($errores["avatar"])) : ?>
        <mark style="color:red; font-size: 13px;"><?=$errores["avatar"]?></mark>
      <?php endif; ?>
    </p>
    <p>
    <label for="telefono" class="label-registro">Teléfono</label>
    <input id="telefono" type="text" name="telefono" value="<?=$telefonoDefault?>" placeholder="Número de teléfono *">
    <?php if (isset($errores["telefono"])) : ?>
      <mark style="color:red; font-size: 13px;"><?=$errores["telefono"]?></mark>
    <?php endif; ?>
    </p>
    <p>
    <br>
    <label class="com"for="com" class="label-registro" id="comentarios">COMENTARIOS</label>
    <br>
    <textarea class="coment" id="com" name="com" rows="8" cols="80"></textarea>
    </p>
    <p>
    <button class="boton"type="submit" name="button" value="Enviar Datos">ENVIAR</button>
    <button class="resetear"type="reset" name="button">REINICIAR</button>
    </p>
    </div>
    </form>
      </div>
    </main>
    <?php
    require_once("footer.php");
    ?>
  </div>
    </body>
    </html>

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

  header("location:inicio.php"); exit;
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
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
    <title>Chocolatemia</title>
    </head>
    <body>
     <div class="contenedor">
        <header class="header">
          <header>
            <div class="logoymenu">
          <img src="img/logo.png" alt="" class="logo"><h1>CHOCOLATEMIA</h1><img src="img/menu2.png" alt="" class="menu"></div>
            <ul>
            <li><a href="#">TIENDA</a></li>
            <li><a href="#">SOBRE NOSOTRAS</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">CONTACTARNOS</a></li>
          </ul>
          </header>
      </header>
    <main>
      <div class="form-register">
    <form class="register" action="register.php" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <h1 style="color:white">Registrate</h1>
    <label for="nombre">Nombre</label>
    <input id="nombre" type="text" name="nombre" value="<?=$nombreDefault?>" placeholder="Ingrese su nombre *">
    <?php if (isset($errores["nombre"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["nombre"]?></p>
    <?php endif; ?>
    </p>
    <p>
    <label for="apellido">Apellido</label>
    <input id="apellido"type="text" name="apellido" value="<?=$apellidoDefault?>" placeholder="Ingrese su apellido *">
    <?php if (isset($errores["apellido"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["apellido"]?></p>
    <?php endif; ?>
    </p>
    <p>
    <label for="fecha">Fecha de nacimiento</label>
    <input id="fecha"type="date" name="fecha" value="<?=$fechaDefault?>">
    <?php if (isset($errores["fecha"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["fecha"]?></p>
    <?php endif; ?>
    </p>
    <p>
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="<?=$emailDefault?>"placeholder="nombre@nombre.com *">
    <?php if (isset($errores["email"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["email"]?></p>
    <?php endif; ?>
    </p>
    <p>
    <label for="password">Contraseña</label>
    <input id="password" type="password" name="password" value="" placeholder="Contraseña *">
    <?php if (isset($errores["password"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["password"]?></p>
    <?php endif; ?>
    </p>
    <p>
    <label for="cpassword">Confirmar contraseña</label>
    <input id="cpassword" type="password" name="cpassword" value="" placeholder="Confirme contraseña *">
    <?php if (isset($errores["cpassword"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["cpassword"]?></p>
    <?php endif; ?>
    </p>
    <p>
      <label for="avatar">Foto de perfil</label>
      <input type="file" name="avatar" value="">
      <?php if (isset($errores["avatar"])) : ?>
        <p style="color:red; font-size: 10px;"><?=$errores["avatar"]?></p>
      <?php endif; ?>
    </p>
    <p>
    <label for="telefono">Teléfono</label>
    <input id="telefono" type="text" name="telefono" value="<?=$telefonoDefault?>" placeholder="Número de teléfono *">
    <?php if (isset($errores["telefono"])) : ?>
      <p style="color:red; font-size: 10px;"><?=$errores["telefono"]?></p>
    <?php endif; ?>
    </p>
    <p>
    <br>
    <label class="com"for="com">COMENTARIOS</label>
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
    <br>
    <!<?php
    //include('../Footer/footer.php');
    ?>-->
    </body>
    </html

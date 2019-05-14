<?php

 require_once("funciones.php");

 $errores=[];
 $email="";
 $password="";

 if ($_POST) {
   $errores = validarLogin();
   if (count ($errores) ==  0) {
     if(isset($_POST["rec"])){
       //si pone recordarme, setea una cookie durante un mes con el mail
       setcookie("email",$_POST["email"],time()+60*60*24*30);
       header("Location:home.php");
     }
    header("Location:home.php");
    //si se loguea bien, setea una cookie que despues uso en la funcion estaLogueado
     setcookie("estaLogueado",true);
 }
 else {
   $email=$_POST["email"];
   $_POST["password"]="";
 }
   }
//var_dump($_COOKIE);
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
          <img src="" alt="" class="logo"><h1>CHOCOLATEMIA</h1><img src="img/menu2.png" alt="" class="menu"></div>
            <ul>
            <li><a href="#">TIENDA</a></li>
            <li><a href="#">REGISTRO</a></li>
            <li><a href="#">FAQ</a></li>
            <li><a href="#">CONTACTARNOS</a></li>
          </ul>
          </header>
      </header>
    <body>
<main>
  <div class="form-login">
  <form class="login" action="login.php" method="post">
      <br>
      <br>
      <h1>Logueate</h1>
<p>
  <label for="email">Email</label>
  <input id="email"type="email" name="email" value="<?=$email?>">
</p>
<p>
  <label for="password">Contraseña</label>
  <input id="password"type="password" name="password" value="">

  <?php if (isset($errores["email"])) : ?>
    <p style="color:red; font-size: 15px;"><?=$errores["email"]?></p>
  <?php endif; ?>
  <?php if (isset($errores["password"])) : ?>
    <p style="color:red; font-size: 15px;"><?=$errores["password"]?></p>
  <?php endif; ?>
</p>
<br>
<p>
  <input id="rec"type="radio" name="rec" value="r">
  <label for="rec">Recordarme</label>
<p>
  <br>
  <a href="index.php">¿Olvidaste tu contraseña?</a>
  <br>
  <br>
  <button class="boton"type="submit" name="button">INGRESAR</button>
  </p>
<br>
<br>
</form>
  </div>
</main>
<br>
</body>
</html>

<?php

function validarLogin() {
  $errores =  [];

if (estaVacio($_POST["email"])) {
  $errores["email"] = "Por favor complete su email";
} else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
  $errores["email"] = "El email debe ser una casilla válida";
} else if (!existeElEmail($_POST["email"])) {
  $errores["email"] = "Usuario y/o contraseña incorrecta";
} else if (estaVacio($_POST["password"])) {
  $errores["password"] = "Dejaste la contraseña vacía";
} else if(!passwordOk($_POST["email"],$_POST["password"])){
  $errores["password"]="Usuario y/o contraseña incorrecta";
}


if (empty($errores)){

}

return $errores;

}

function validarRegistracion() {
  $errores = [];

  $errorEnNombre = esAlfabeticoYMinimoCaracteres($_POST["nombre"], "nombre", 3);
  if ($errorEnNombre != null) {
  $errores["nombre"] = $errorEnNombre;
  }

  $errorEnApellido = esAlfabeticoYMinimoCaracteres($_POST["apellido"], "apellido", 4);
  if ($errorEnApellido != null) {
  $errores["apellido"] = $errorEnApellido;
  }

  if (estaVacio($_POST["password"])) {
    $errores["password"] = "Dejaste la contraseña vacía";
  }

  if (estaVacio($_POST["cpassword"])) {
    $errores["cpassword"] = "Dejaste el campo confirmar contraseña vacío";
  }

  if (!estaVacio($_POST["password"]) && !estaVacio ($_POST["cpassword"]) && $_POST["password"] != $_POST["cpassword"]) {
    $errores["password"] = "Las contraseñas no coinciden";
  }

  if (estaVacio($_POST["email"])) {
    $errores["email"] = "Por favor complete su email";
  } else if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == false) {
    $errores["email"] = "El email debe ser una casilla válida";
  } else if (existeElEmail($_POST["email"])) {
    $errores["email"] = "El email ya está registrado";
  }

  if (estaVacio($_POST["telefono"])) {
    $errores["telefono"] = "Por favor complete su teléfono";
  } else if (is_numeric($_POST["telefono"]) == false) {
    $errores["telefono"] = "El teléfono debe ser un número";
  }

  if (estaVacio($_POST["fecha"])) {
    $errores["fecha"] = "Por favor elija una fecha";
  }

  if ($_FILES ["avatar"] ["error"]!= 0) {
    $errores["avatar"] = "Se produjo un error en la carga";
  } else {
    if ($_FILES["avatar"]["type"] != ("image/png") &&
    $_FILES["avatar"]["type"] != ("image/jpeg") &&
    $_FILES["avatar"]["type"] != ("image/gif") &&
    $_FILES["avatar"]["type"] != ("image/psd") &&
    $_FILES["avatar"]["type"] != ("image/bmp")) {
    $errores ["avatar"]  = "Por favor sube una imágen";

    }
  }

  return $errores;
}


function passwordOk($email,$password) {
  $usuarios = traerUsuarios();

  foreach ($usuarios as $usuario) {
  if ($usuario["email"] == $email && password_verify($password, $usuario["password"])) {
    return true;
  }
}
return false;
}

function estaVacio($campo) {
  if ($campo == ""|| $campo==null) {
    return true;
  } else {
    return false;
  }
}

function esAlfabeticoYMinimoCaracteres ($campo, $nombreCampo, $min) {
  if (estaVacio($campo)) {
    return "Dejaste el campo $nombreCampo vacío";
  } else if (strlen($campo) < $min) {
    return "El campo $nombreCampo tiene un mínimo de $min caracteres";
  } else if  (ctype_alpha($campo) == false) {
    return "El campo $nombreCampo debe ser alfabético";
  } else {
    return null;
  }
}

function estaLogueado(){
  if(isset($_COOKIE["email"])){
    return $_COOKIE["email"];
  } else return "";
}

function armarUsuario () {
  return [
    "id" => traerProximoId(),
    "nombre" => ucfirst(trim($_POST["nombre"])),
    "apellido" => ucfirst(trim($_POST["apellido"])),
    "email" => trim($_POST["email"]),
    "telefono" => trim($_POST["telefono"]),
    "fecha" => $_POST["fecha"],
    "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
    "genero" => $_POST["genero"],
    "avatar" => uniqid() . "." . pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION),
  ];
}

function traerProximoId() {
  $usuarios = traerUsuarios();

  if ($usuarios == []) {
    return 1;
  }

  $ultimoUsuario = end($usuarios);

  return $ultimoUsuario["id"] + 1;
}

function traerUsuarios() {
  $leerArchivo = file_get_contents("../usuarios.json");

  if ($leerArchivo == "") {
    return [];
  }

  $usuarios = json_decode($leerArchivo, true);

  return $usuarios;
}

function guardarUsuario($usuario) {
  $usuarios = traerUsuarios();

  $usuarios[] = $usuario;

  $json = json_encode($usuarios);

  file_put_contents("../usuarios.json", $json);
}

function existeElEmail($email) {
  if (buscarUsuarioPorEmail($email) === null) {
    return false;
  } else {
    return true;
  }
}

function buscarUsuarioPorEmail($email) {
  $usuarios = traerUsuarios();

  foreach ($usuarios as $usuario) {
  if ($usuario["email"] == $email) {
    return $usuario;
  }
}
return null;
}

function  guardarAvatar($usuario) {
  move_uploaded_file($_FILES["avatar"]["tmp_name"], "avatars/" . $usuario["avatar"]);
}
?>

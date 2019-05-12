<?php
function validarRegistracion(){
  $errores=[];

  if ($_POST["nombre"] == ""){
    $errores["nombre"] = "Dejaste el campo nombre vacío";
  }

  return $errores;
}

 ?>

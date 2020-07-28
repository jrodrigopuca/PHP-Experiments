<?php
  $usuario= "Juan";
  $tiempo = time()+ 60*2; //dos minutos
  setcookie("nombre", $usuario, $tiempo, "/");
?>

<h3>Usando cookie</h3>
<?php 
  if(!isset($_COOKIE["nombre"])) {
    echo "no hay cookie";
  }else{
    echo "<h3>Hola {$_COOKIE['nombre']}";
  }

?>
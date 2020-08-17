<?php 
# Usando argumentos en archivos
# para probar:
# php -S localhost:8085
# localhost:8085/02-get.php?nombre=Juan
	$nombre= $_GET['nombre'];
    echo "Hola ".$nombre;
?>
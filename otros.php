<?php

//usando heredoc (copia todo lo que aparece dentro del separador)
$texto = <<< HEREDOC
asdasd
asdasd
adsdas
HEREDOC;
echo $texto;


//$_GET
    #echo $_GET["a"]; //http://phptest.dev/entrada/index.php?a=ho
    echo "</br>";
    
    //Array Server 
        echo "<b>Información del servidor</b> </br>";
        #var_dump($_SERVER);
        echo "</br>";
    
    //$GLOBALS: todas las variables incluidas en el script
    //$_POST: data de un form
    //$_COOKIE: info almacenada en una cookie del cliente
    //$_FILES: información de un archivo subido
    //$_ENV: 
    //$_SESSION
    //$_REQUEST: información combinada de $_GET, $_POST y $_COOKIE

?>
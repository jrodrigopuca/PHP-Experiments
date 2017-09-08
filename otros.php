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
    
    //$GLOBALS
    //$_POST
    //$_COOKIE
    //$_FILES
    //$_ENV
    //$_SESSION
    //$_REQUEST

?>
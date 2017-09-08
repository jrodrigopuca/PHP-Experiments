<?php

require __DIR__."/../../vendor/autoload.php"; //voy a incluir la validación desde un package
require __DIR__."/validation.php";


if ($_SERVER['REQUEST_METHOD']==='POST'){
    var_dump($_POST); //todas las variables que vienen del POST

    $date=trim($_POST["date"]);
    $email=trim($_POST["email"]);
    $description=trim($_POST["description"]);

    if (!empty($date) && !empty($email) && !empty($description)){

        $valor_devuelto= validate_date($date);

        if(is_array($valor_devuelto)){
            foreach ($valor_devuelto as $error){
                echo "<p><b>".$error."</b></p>";
            }
        }
        else{
            echo $value;
        }


        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<p> email: $email </p>"; 
        }

        echo "<p> description:".htmlspecialchars($description). "</p>";
    }
}

?>
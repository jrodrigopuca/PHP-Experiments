<?php
//cosas para agregar:
//M1: HTTP Request GET/POST
//M2:includes and requires
//M3:Custom validation and input security
//M4: Composer package management
//M5: Validation package


//El POST data existe

if ($_SERVER['REQUEST_METHOD']==='POST'){
    var_dump($_POST); //todas las variables que vienen del POST
    $date=$_POST["date"];
    $email=$_POST["email"];
    $description=$_POST["description"];
    echo "<p> Date: $date </p>"; //Acceder a cada variable independientemente
    echo "<p> email: $email </p>"; 
    echo "<p> description: $description </p>"; 
}


//https://www.youtube.com/watch?v=pZ1nMBDXSMA

?>

<form class="" action="em.php" method="post">
    <label for="date"> Date: </label><br>
    <input type="text" name="date" value="">
    <br>
    <label for="email"> Email: </label><br>
    <input type="email" name="email" value="">
    <br>
    <label for="description"> Description: </label><br>
    <input type="text" name="description" value="">
    <br>
    <hr>

    <input type="submit" value="enviar">

</form>


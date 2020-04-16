<?php
//=================Conexión con PDO==================
    echo "=================Conexión con PDO==================";
//Datos de conexión
    $db= parse_ini_file("config.ini");

    $dbServer=$db["db_server"];
    $dbName=$db["db_name"];
    $dbUserName= $db["db_user"];
    $dbPassword= $db["db_pass"];


//PDO Example
    echo "<br><h3>Consulta con PDO</h3><ul>";
    $connection2 = new PDO ('mysql:host='.$dbServer.";dbname=".$dbName, $dbUserName, $dbPassword);

    $consulta2 = "SELECT name from cars";

    $resultado2 = $connection2->query($consulta2);

    if ($resultado2->rowCount() >0)
    {
        foreach ($resultado2 as $fila2)
        {
            echo "<li> nombre: {$fila2['name']} </li>";
        }
    }
    echo "</ul>";
    $resultado2=null;
    $connection2=null;


?>
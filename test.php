<?php
    $db= parse_ini_file("config.ini");

    $dbServer=$db["db_server"];
    $dbName=$db["db_name"];
    $dbUserName= $db["db_user"];
    $dbPassword= $db["db_pass"];

function actualizarYa($newpass, $id){
  $db= parse_ini_file("config.ini");

  $dbServer=$db["db_server"];
  $dbName=$db["db_name"];
  $dbUserName= $db["db_user"];
  $dbPassword= $db["db_pass"];
  $pdo = new PDO ('mysql:host='.$dbServer.";dbname=".$dbName, $dbUserName, $dbPassword);
  $consulta = "UPDATE usuarios SET pass=:pass WHERE id=:id";

  $stmt =  $pdo->prepare($consulta);
  $stmt->bindParam(':pass', $newpass);
  $stmt->bindParam(':id', $id);
  $res=$stmt->execute();

}


//PDO Example
    echo "<br><h3>Consulta con PDO</h3><ul>";
    $pdo = new PDO ('mysql:host='.$dbServer.";dbname=".$dbName, $dbUserName, $dbPassword);

    $consulta2 = "SELECT * from usuarios";

    $resultado2 = $pdo->query($consulta2);

    if ($resultado2->rowCount() >0)
    {
        foreach ($resultado2 as $fila2)
        {
            echo "<li> nombre: {$fila2['user']} </li>";
            $newpass=password_hash($fila2['pass'],PASSWORD_BCRYPT );
            //$newpass="cambio";
            actualizarYa($newpass,$fila2['id']);
            //$pdo->query($consulta3);
            //print_r($resultado3->rowCount());
        }
    }
    echo "</ul>";
    $resultado2=null;
    $resultado3=null;
    $pdo=null;

?>
<?php
//DBs Soportadas: CUBRID, DB++, Firebird/InterBase, IBM DB2/Cloudscape/ApacheDerby, MaxDB, MongoDB, mSQL, MS SQL
//Otros: MySQL/MariaDB, Oracle OCI8, Paradox, PostgreSQL, SQLite, SQLSRV (MS SQL, SQL Azure), Sybase, Tokio Tyrant
//Con PECL: dBase, filePro, FrontBase, Informix (IDS)/Universal Server, Ingres/EDBC/Enterprise Access Gateways

//SQL CODE
    /*
    CREATE TABLE `cars` (
        `name` VARCHAR(50) NULL DEFAULT NULL,
        `description` VARCHAR(50) NULL DEFAULT NULL,
        `link` VARCHAR(50) NULL DEFAULT NULL,
        `ID` INT(11) NOT NULL AUTO_INCREMENT,
        PRIMARY KEY (`ID`) USING HASH
    )
    COLLATE='latin1_swedish_ci'
    ENGINE=InnoDB
    AUTO_INCREMENT=8
    ;

    */


//==============DB=================
    echo "==============Conexión con MYSQLI=================";
    echo "<br>";
//Conexión
    $dbPassword= "juan";
    $dbUserName= "juan";
    $dbServer="localhost";
    $dbName="dbcars";

    $connection = new mysqli($dbServer,$dbUserName,$dbPassword,$dbName);
    echo "<b> datos de la conexión: </b>";
    print_r($connection);
    echo "<br>";

//Capturar error
    if ($connection->connect_errno)
    {
        exit ("La conexión a fallado, motivo: {$connection->connect_error}");
    }



//INSERTAR
    $query =  "INSERT INTO cars (name, description, link) VALUES ('nuevo_car','jjlkjl','http://asjdkas.com')";
    $connection->query($query);
    echo "<br><b> elemento agregado en DB </b>: {$connection->insert_id} <br>";

//INSERTAR CON PARAMETRO
    $par_name= 'nuevo_conParametro';
    $par_description= 'asdasdasd';
    $par_link = 'http://asjdkas.com';

    $query =  "INSERT INTO cars (name, description, link) VALUES (?,?,?)";
    $sentencia = $connection->prepare($query);
    $sentencia->bind_param("sss",$par_name,$par_description,$par_link);
    $sentencia->execute();

    echo "<br><b> elemento insertado con parametros </b> ID: {$connection->insert_id} <br>";

//CONSULTAR
    echo "<br> <b> Consulta de datos </b><br>";

    $query = "SELECT * from cars ORDER BY name";
    $resultado = $connection->query($query);
    if ($resultado->num_rows >0)
    {
        while ($fila = $resultado->fetch_assoc())
        {
            //print_r($fila);
            echo "nombre: {$fila['name']} / id: {$fila['ID']}<br>";
        }
    }
    $resultado->close();

//CONSULTAR CON PARAMETRO
    echo "<br> <b> Consulta de datos con parametros </b><br>";
    $query = "SELECT name from cars";
    $sentencia = $connection->prepare($query);
    $sentencia->execute();

    $sentencia->bind_result($res_name);
    $sentencia->store_result();

    if ($sentencia->num_rows>0)
    {
        while ($sentencia->fetch())
        {
            echo "<li>", $res_name,"</li>";
        }
    }
    echo "</ul>";

//cerrar conexión  
    $sentencia->close();
    $connection->close();

//otra forma
    include 'pdo.php';

?>
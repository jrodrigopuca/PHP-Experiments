<?php
//=================Conexión con PDO==================
    echo "=================Conexión con PDO==================";
//Datos de conexión
    $db= parse_ini_file("config.ini");

    $dbServer=$db["db_server"];
    $dbName=$db["db_name"];
    $dbUserName= $db["db_user"];
    $dbPassword= $db["db_pass"];

    define("DB_SERVER",$dbServer);
    define("DB_NAME",$dbName);
    define("DB_USERNAME",$dbUserName);
    define("DB_PASSWORD",$dbPassword);

    function conecta()
    {
        try {
            //cadena de conexión
            $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME.";charset=utf8", DB_USERNAME, DB_PASSWORD);
            //tipos de errores  considerar
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("sin_conexion"); //devuelve el objeto PDO o el string sin_conexión
        }
    }

    function traerCars(){
        $pdo= conecta();
        $sql ="SELECT * FROM cars";
        $stmt = $pdo->query($sql);
        $usuarios=  $stmt->fetchAll(PDO::FETCH_OBJ);
        unset($pdo);
        return json_encode($usuarios);
    }

    function traerCarsXNombre($nombre){
        $pdo= conecta();
        $sql ="SELECT * FROM cars where name=:nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $usuarios=  $stmt->fetchAll(PDO::FETCH_OBJ);
        unset($pdo);
        return json_encode($usuarios);
    }

    function actualizarAuto($id, $nombre, $descr){
        $pdo= conecta();
        $sql= "UPDATE cars SET name=:nombre, description=:descr WHERE id=:id";
        $stmt= $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descr', $descr);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $res = $stmt->execute();
        $lineas= $stmt->rowCount();
        
        unset($stmt);
        unset($pdo);
        return array($res?"actualizado":"error", $lineas?"cambio registrado":"no hubo cambios");
    }

    function eliminarAuto($id)
    {
        $pdo= conecta();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{
            $pdo->beginTransaction();

            $sql= "INSERT INTO registro (nombre_c, desc_c) (SELECT name, description FROM cars WHERE id=:id)";
            $stmt= $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res1 = $stmt->execute();
            
            $sql="DELETE FROM cars WHERE id=:id";
            $stmt= $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $res2 = $stmt->execute();

            $pdo->commit();
            $res=$res1&&$res2;
        }catch(PDOException $e){
            $pdo->rollBack();
            $res=0;
        }

        unset($stmt);
        unset($pdo);
        return array($res?"actualizado":"error", $res1,$res2);

    }


    # echo traerCarsXNombre("nuevo_car");
    #print_r(actualizarUsuario(50,"actualizado", "prueba actualizado"))
    print_r(eliminarAuto(1));
?>
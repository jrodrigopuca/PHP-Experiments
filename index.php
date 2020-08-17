<html>
<head> </head>
<body>
    <?php 
        $mensaje="Hello world";
    ?>
    <h1> <?=$mensaje ?> </h1> 
    <h2> <?php echo $mensaje ?> </h2>
</body>
</html>


<?php


//==============COMENTARIOS===============
    //Comentarios
    #comentario
    /*
        Comentario
    */

//===============VARIABLES================
    echo "<h1>VARIABLES</h1>";
//Tipos de variables comunes
    $intVar=-1234;
    $stringVar="Hola";
    $boolVar = false;
    $floatVar = 12.34;

//variable simple
    $message= "hello World </br>";
    echo $message;
//variable por referencia
    $b=1;
    $a= &$b;
    $b=2;
    echo "</br> Por referencia: ".$a."</br>"; # a=b= 2


//Obtener tipo de variable
    echo gettype($stringVar); //muestra solo el tipo de variable
    echo "</br>";
    var_dump($stringVar);  //muestra toda la info de la variable
    echo "</br>";

//Determinar tipo -> 1 true, null false
    echo is_int($intVar).PHP_EOL;
    echo is_string($stringVar);
    echo is_bool($boolVar);
    echo is_float($floatVar);
    echo "</br>";
    
//Definir Constante
    define('NW_CONSTANTE', "hola_constante"); //para constantes se recomienda usar mayús.
    echo NW_CONSTANTE;
    echo "</br>";

//================OPERADORES======================
    echo "<h1>OPERADORES</h1>";
//Operadores
    echo "suma ",8+2,"<br/>";
    echo "resta ",8-2,"<br/>";
    echo "mult ",8+2,"<br/>";
    echo "div ",8/2,"<br/>";
    echo "pot ", 8**2,"<br/>";

    $valorNum= 10;
    echo "++v ",++$valorNum,"<br/>";
    echo "v++ ",$valorNum++,"<br/>";
    echo "--v ",--$valorNum,"<br/>";
    echo "v-- ",$valorNum--,"<br/>";

    echo "+=5 ",$valorNum+=5,"<br/>";
    echo "-=5 ",$valorNum-=5,"<br/>";
    echo "*=5 ",$valorNum*=5,"<br/>";
    echo "**=5 ",$valorNum**=5,"<br/>";
    echo "Texto "."Concatenado <br>";

//================ESTRUCTURAS DE CONTROL======================
    echo "<h1>ESTRUCTURAS DE CONTROL</h1>";

    $numeros = ["uno", "dos", "tres"];
    $count_num= count($numeros);

//Comparación
    var_dump(1 == 1); //igual
    echo "<br/>";
    var_dump(1 === "1"); //identico
    echo "<br/>";
    var_dump(1 <> 2); //no igual (También puede usarse el !=)
    echo "<br/>";
    var_dump(1 !== 2); //no identico
    echo "<br/>";
    var_dump(1 <=> 2); //spaceship (devuelve 0 si son iguales, 1 si el valor de izq es mayor, -1 si el valor de der es mayor )
    echo "<br/>";
    $varT= true;
    $varF= false;
    var_dump($varT);echo "<br/>"; //mostrar el valor de la primera var- (T)
    var_dump(!$varT);echo "<br/>";//mostrar el negado valor de la primera var- (F)
    var_dump($varT && $varF);echo "<br/>"; //AND (F)
    var_dump($varT || $varF);echo "<br/>";//OR (T)

//IF-ELSEIF-ELSE
    if ($count_num==1){
        echo "Solo un elemento <br/>";
    }
    elseif($count_num>1){
        echo "Más de un elemento! Hay {$count_num} <br/>";
    }
    else
    {
        echo "No hay elementos<br/>";
    }

//Switch
    switch ($count_num) {
        case 1:
            echo "hola un elemento! <br>";
            break;
        
        default:
            echo "Hola {$count_num} elementos! <br>";
            break;
    }

//Operador ? (funciona como if)
    $salida = ($count_num>0) ? "Hay elementos" : "No hay elementos";
    echo $salida, "<br>"; 

//Operador ?? (nulidad)
    $valornulo = null;
    $salida2 = $valornulo ?? "No tiene nada!"; //si es nulo muestra el mensaje, sino es nulo muestra el valor
    echo $salida2, "<br>"; 

//While
    $i= 1;
    while ($i < 5) {
        echo "salida del while </br>";
        $i++;
    }

//for
    for ($i=0; $i < 3; $i++) { 
        echo "salida del for </br>";
    }

    # usando for como un while
    $i=1;
    for(;;){
        echo "for como while: ".$i;
        $i+=1;
        if ($i>5) break;
    }


//===============MOSTRAR================
    echo "<h1>IMPRIMIR</h1>";
//Formas simples
    print("Usando print<br>");
    print("Usando print_r<br>");
    echo "Usando echo:", "1","2","3","4","5<br>";
    var_dump( array("info"=>"Más info") );

//Usando interpolación
    $inter="interpolación";
    echo "<br> estoy usando ${inter} <br>";
    echo "<br> estoy usando {$inter} <br>";
    echo "<br> estoy usando $inter <br>";

//===============STRING================
    echo "<h1>STRING</h1>";
//Crear un string 
    $ministring = "creando";
    $ejemploString = "{$ministring} un string {$ministring} <br>";
    echo $ejemploString;

//Funciones string
    $stringTest= "Bacon ipsum dolor amet ham hock flank meatloaf ipsum";
    $stringRecortado = substr($stringTest,6,5); //substring (texto, inicio,fin)
    echo "Sub-string: ",$stringRecortado, "<br>";
    echo "String en mayúscula: ", strtoupper($stringTest),"<br>";
    echo "String en miniscula: ", strtolower($stringTest),"<br>";
    echo "Longitud del string: ", strlen($stringTest),"<br>";
    echo "Posición del string: ", strpos($stringTest, $stringRecortado),"<br>";
    echo "Remplazar string: ", str_replace( $stringRecortado,"remplazado",$stringTest,$count ),"<br>";
    echo "Cantidad de repetidos: ", $count, "<br>";

//Convertir string a array
    echo "Convertir string a array: "; 
    $convertidoArray=str_split($stringTest);
    print_r($convertidoArray);
    echo "<br><br>";


//===============ARRAY================
    echo "<h1>ARRAY</h1>";
//Crear array 
    $textoUno = array("Ham", "t-bone", "pork", "belly", "flank", "shank");
    echo "<b>Array simple: </b>";
    print_r($textoUno);

//Crear array "clave"=>"valor"
    $textoDos = array("Ham" => "t-bone", 4=> "belly", "flank"=> "shank");
    echo "<br><b>Array clave-valor: </b>";
    print_r($textoDos);

//Acceder a los valores del array
    echo "<br><b>Primer valor del array1:</b> ", $textoUno[0];
    echo "<br><b>Primer valor del array2:</b> ", $textoDos["Ham"];

//Existencia de valor en array
    echo "<br><b>Existencia de clave en array:</b> ", array_key_exists("flank",$textoDos);  //1 true 0 false
    echo "<br><b>Existencia de valor en array:</b> ", in_array("shank",$textoDos);  //1 true 0 false

//Agregar nuevo valor al array  
    echo"<br><b>Agregar nuevo valor al array:</b> ";
    array_push($textoUno,"TextoNuevo");
    print_r($textoUno);

//Agregar nuevo clave-valor al array
    echo"<br><b>Agregar nuevo clave-valor al array:</b>";
    $textoDos['nuevaClave']="Nuevo Valor";
    print_r($textoDos);

//Array multidimensional
    echo"<br><b>Array multidimensional</b>";
    $cities= array('tokio'=>array(13.6, 1868,'Japan'),'dc'=>array(0.6,1790,'United States'), 'moscow'=>array(11.5,1147,'Russia'));
    $cities['london']=array(8.6,43,'England');
        
//Cantidad de elementos en array
    $a1=array(1,2,3,4 );
    echo count($a1);
//Unir elementos de un array
    $a2=array("hola", "jljkl","hkj");
    echo implode("/", $a2);

//cambia el orden del array aleatoriamente
    shuffle($a2);
    echo $a2;

//Eliminar el último valor del array
    echo"<br><b>Eliminar el último valor del array.</b> ";
    $elUltimo= array_pop($textoUno);
    echo "<b> último valor: </b> ", $elUltimo;
    echo "<b> array modificado: </b>"; print_r($textoUno);

//Eliminar valores especificos del array
    echo"<br><b>Eliminar valores del array:</b>";
    unset($textoDos["flank"]); 
    unset($textoDos[4]);
    print_r($textoDos);

//Ordenar array
    $copiaUno=$textoUno;

    echo"<br><b>Ordenar valores del array (cambiando los keys):</b> ";
    sort($copiaUno);
    print_r($copiaUno);

    echo"<br><b>Ordenar valores del array (manteniendo los keys):</b> ";
    asort($textoUno);
    print_r($textoUno);

    echo"<br><b>Ordenar por key del array: </b>";
    asort($textoDos);
    print_r($textoDos);

    echo "<br><b>Cantidad de items: </b>", count($textoUno);      

//Recorrer
    echo "<br><b>Lista de item en base al array1 </b>";
    echo "<ul>";
    foreach ($textoUno as $val)
    {
        echo "<li>",$val,"</li>";
    }
    echo "</ul><br>";

    echo "<br><b>Lista de item en base al array 2 (key+value) </b>";
    echo "<ul>";
    foreach ($textoUno as $key => $val)
    {
        echo "<li>",$key." ) ".$val,"</li>";
    }
    echo "</ul><br>";

//===============FUNCIONES================
    echo "<h1>FUNCIONES</h1>";

//Crear una función
    function miFuncion ($parametro, $otroParametro, $parametroPorDefault="LaFunción </br>")
    {
        global $varGlobal; //variable global
        echo $parametro;
        echo $otroParametro;
        echo $parametroPorDefault;
    }
    miFuncion("Estoy","Probando"); //Llamar a la función

//Crear una función con valor de retorno
    function getValor(){
        
        return "\n RetornoDeUnValor </br>";
    }
    echo getValor();

//Otra forma de llamar a función con valor de retorno
    $traerValor ="getValor";
    echo $traerValor();

//==============INCLUIR=================
    echo "<h1>INCLUIR</h1>";
    echo "<br>";
//Agregar Archivos PHP (include/require)
    include 'class.php';
    include_once 'db.php';//si el archivo ya fue incluido no lo vuelve a agregar
    //require y require_once son similares solo que muestran un error en caso de que el archivo no se cargue.
?>


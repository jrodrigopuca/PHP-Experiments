<?php
//==================Class===========================
echo "-----------CLASES-----------";
echo "<br>";
//Clase
    class Autor
    {
        //constante
        const AUT_INGRESO= 2017;

        //propiedades
        public $nombre;
        public $apellido;
        protected $lugarOrigen;

        /*
        //Constructor con valores pre-fijados
            function __construct()
            {
            $this->nombre="nombre por defecto (constructor)";
            $this->apellido="apellido por defecto";
            $this->lugarOrigen="lugar por defecto";
            }
        */
        
        //Constructor con valores modificables
        function __construct($tempNombre="", $tempApellido="", $tempLugarOrigen="")
        {
            $this->nombre=$tempNombre;
            $this->apellido=$tempApellido;
            $this->lugarOrigen=$tempLugarOrigen;
        }


        //Métodos
        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($tempNombre)
        {
            $this->nombre = $tempNombre;
        }

        public function getNombreCompleto(){
            return $this->nombre." ".$this->apellido;
        }
        public function getLugar(){
            return $this->lugarOrigen;
        }

    }

//Clase con Herencia
    class AutorDestacado extends Autor{
        //Propiedades internas
        public static $tipo= "Muy destactado";
        public $calificacion = 5;

        //Funciones propias
        public function getCalificacion()
        {
            return $this->calificacion;
        }

        public static function getTipoAD(){
            return self::$tipo;  //Para devolver un valor éstatico
        }

    }

//Instanciar
    $miObjeto= new Autor("nombre (Usando Constructor)","Apellido", "Lugar" );
    echo $miObjeto->nombre, "<br>"; //Mostrar valor por defecto del constructor

    $heredado = new AutorDestacado("Nombre AD","Apellido AD","Lugar AD"); 

//Acceder a valores de la instancia
    $miObjeto->nombre= "nombre modificado"; //Cambiar un dato de una instancia
    echo $miObjeto->nombre, "<br>"; //Mostrar una variable de una instancia
    echo "<b>Mostrar valor de constante:</b> ",$miObjeto::AUT_INGRESO, "<br/>"; //Acceder a una constante de una instancia/clase
    $miObjeto->setNombre("Juan"); //Acceder a un método
    echo "<b>Mostrar valor modificado por método:</b> ",$miObjeto->getNombre(), "<br/>"; //Mostrar dato de un método

//Acceder a valores de la instancia (de una clase heredada)
    echo "<b>Obtener Calificación </b>",$heredado->getCalificacion(),"<br/>";
    echo "<b>Obtener Nombre Completo</b>",$heredado->getNombreCompleto(),"<br/>";
    echo "<b>Obtener Lugar </b>",$heredado->getLugar(),"<br/>"; //Acceder a una propiedad privada por medio de un método

//Acceder a valores estáticos
    echo "<b>Es destacado?</b>",AutorDestacado::getTipoAD(),"<br/>";

?>
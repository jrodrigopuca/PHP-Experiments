<?php
    setlocale(LC_ALL,"es_ES@euro","es_ES","esp");

    $dia = new DateTime();
    $dia->setTimezone(new DateTimeZone('America/Argentina/Salta'));
    $dia->modify('+1 day');
    $fecha = $dia->format('Y-m-d');
    echo $fecha; # 2020-09-25
    echo "</br>";
    echo fechaGenial($fecha);

    function fechaGenial($fecha){
        $aux=new DateTime();
        $aux->setTimezone(new DateTimeZone('America/Argentina/Salta'));
        
        if (($aux->format('Y-m-d'))==$fecha) return "Hoy";
        if (($aux->modify('+1 day')->format('Y-m-d'))==$fecha) return "Mañana";

        $nuevafecha= (DateTime::createFromFormat('Y-m-d', $fecha));
        return iconv(
                'ISO-8859-2', 
                'UTF-8', 
                strftime("%A %d/%m/%y", $nuevafecha->getTimestamp()));
    }
?>
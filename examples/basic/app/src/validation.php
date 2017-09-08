<?php
/*
Validation checklist
>data/email/description exists  empty()
>remove whitespace   trim()
>sanitize output    htmlspecialchars()
>validate email/date   filter_var   strtotime
*/

//"hay que filtrar la entrada y sanitizar la salida"

//use Respect\Validation\Validator as v;
use Respect\Validation\Validator;
use Respect\Validation\Exceptions\NestedValidationException;
//use respect\validation\library\validator; //usando el namespace

$validator = new Validator();
//var_dump($validator);

//validator es una clase estática, para acceder a ella debo usar ::


function validate_date($date_raw)
{
    //usando respect validation

    $date_validator= Validator::date("d/m/Y")->notEmpty(); //validador personalizado
    
    
    try{
        $date_validator->assert($date_raw); //assert valida retornando el error o el true/false
        $timestamp = strtotime($date_raw);
        return date('d/m/Y',$timestamp);
    }
    catch(NestedValidationException $e){
        return ($e->getMessages());
    }
    
    
    
    //validación clasica con validator
    /*
    if ($date_validator->validate($date_raw)){
        $timestamp = strtotime($date_raw);
        return date('d/m/Y',$timestamp);
    }
    else{
        return $date_raw." no es válido";
    }
    */
    

    /*
    //forma clásica
    if($timestamp = strtotime($date_raw)){
        return date('d/m/Y',$timestamp); 
        //date(DATE_ATOM, $timestamp); usando el formato para MySQL
        //date('F jS Y', $timestamp); full month with ordinal suffix
        //go.codeschool.com/php-date se pueden encontrar los otros formatos
    }
    else{
        return $date_raw." no es válido";
    }
    */
}
?>
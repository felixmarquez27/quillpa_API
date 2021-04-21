<?php


class DataCleanner{
    public static function stringCleanner($cadena){
        $cadena=trim($cadena);
        $cadena=filter_var($cadena,FILTER_SANITIZE_STRING);
        $cadena=stripcslashes($cadena);
        $cadena=htmlspecialchars($cadena);
        //$cadena=strtolower($cadena);	
        return $cadena;
    }

    public static function numberCleanner($numero){
            $numero=filter_var($numero,FILTER_SANITIZE_NUMBER_INT);
            $numero=(int)$numero;
            $numero =trim($numero);
            $numero = str_replace(' ', '', $numero);
            return $numero;
    
    }

    public static function emailCleanner($mail){
        if ($mail!="") {
            $mail=trim($mail);
            $mail = str_replace(' ', '', $mail);
            $mail=filter_var($mail,FILTER_SANITIZE_EMAIL);
            $mail=filter_var($mail,FILTER_VALIDATE_EMAIL);
        }else{$mail='';}
    
    
        return $mail;
    }


    

 }


?>
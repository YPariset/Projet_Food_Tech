<?php


class Functions{
    static function dateFr($date){
        setlocale(LC_TIME, "fr_FR", "French");
        return strftime('%d-%m-%Y',strtotime($date));
    }

   static function priceFormat ($price,$dec=2){
        $formatted = number_format($price,$dec); 
        return $formatted;


    }

    static function pluriel ($string){
        $finalString = $string .'s';
        return $finalString;
    }


    static function Add0before ($number){
        $value=str_pad($number, 5, '0', STR_PAD_LEFT);
        return $value;
    }
}


?>





































<?php

class Messages{

    /*
    * génère un message d'erreur
    *
    * @param string $msg, string $Fontcolor, string $background
    *
    * @return string
    */
    static function msg(string $msg, $Fontcolor, $background){
        return '<p style=background-color:'.$background.';color:'.$Fontcolor.';text-align:center;padding:10px 0">'.$msg.'</p>';
    }
}
?>
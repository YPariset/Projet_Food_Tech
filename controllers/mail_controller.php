<?php 

session_start();
 
$result = mail($destinataire, $objet, $content, $headers);
var_dump($result);
return $result;
if( !$result ){
    echo "L'envoi du mail a échoué";
}

$header="MIME-Version: 1.0\r\n";
$header.='From:"feelinFood"<feelingfoodfrance@gmail.com>';
$header.='Content-Type:text/html; charset="utf-8"';
$header.='Content-Transfer-Encoding: 8bit';

$message='
<html>
    <body>
        <div align="center">
        J\'ai envoyé ce mail avec PHP !
        <br>
        </div>
    </body>
</html>
';
mail("paulmarechal785@hotmail.fr", "Salut test", $message, $header);
var_dump($message);

?>
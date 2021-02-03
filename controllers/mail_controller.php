<?php 

session_start();

//On recupere l'adresse mail du client


// Test 
// $sujet = 'Feeling Food';
// $message = '_includes/mail.php';
// // $destinataire = 'paul.marechal@edu.itescia.fr';
// $destinataire = 'paulmarechal785@hotmail.fr';
// $header = "From:FeelinFood<feelingfoodfrance@gmail.com>";
// $header .="reply-To:feelingfoodfrance@gmail.com";
// $header .="Content-Type:text/html; charset=\iso-8859-1";
// if (mail($destinataire, $sujet, $message, $header)){
//     echo "We send you your bill by email, enjoy your meal";
// } else {
//     echo "Echec de l'envoi";
// }

// $message = "";
// $headers = "FROM feelingfoodfrance@gmail.com";
// mail('feelingfoodfrance@gmail.com')


// Test2
// $destinataire = "paulmarechal785@hotmail.fr";
// $objet        = "Alice parle à Bob";
// $content      = "<b>Salut Bob !</b>";
 
// $headers  = "";
// $headers .= "From: feelingfoodfrance@gmail.com\n";
// $headers .= "MIME-version: 1.0\n";
// $headers .= "Content-type: text/html; charset=utf-8\n";

 
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
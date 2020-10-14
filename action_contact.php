
<?php

$title = $_GET["title"];
$message = $_GET["message"];


try
{
// envoyer un mail
    $destinataire='d.yassine2008@gmail.com';
    $objet= $title."<br><br><br>";
    $message= $message;
    $headers='Content-Type: text/html; charset=iso-8859-1';
    mail($destinataire, $objet, $message, $headers);
    echo "Thank you, we will reply you soon ;)"
    . "<a href=\"index.php\">click here to return </a>" 
    ; 
   }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
  
      

    }// fin catch

?>
<?php

include  'includes/cnx.php';

try
{
  
// vérification de l'accés a la bd

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération des paramétres 

  $email=strip_tags($_POST['email']);

                $sth = $dbco->prepare("SELECT email,pass,actif FROM  youtube_user 
                                       WHERE email=:email 
                                     ");
                    $sth->execute(array(
                    ':email' => $email
                    ));

                    $row = $sth->fetch();
  
                if (!empty($row["pass"]) )
                {
                    $destinataire = $row["email"];
                    $sujet = "Get your password" ;
                    $entete = "From: noreply_113@mhelp.com" ;
                    
                    // Le lien d'activation est composé du email(email) et de la clé(cle)
                    $message = 'Welcome ,
                    
                    your password is : '.$row["pass"]. '
                    
                    This is an automatic email, please do not reply.';
                    
                    
                    mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
                    
                    echo "an email has already been sent to your email box ". "<a href=\"login.php\"> click here </a> ";


                }// fin if



                else 
                {
                    echo "your email do not exist, you could create a new account here". "<a href=\"signup.php\"> click here </a> "; ;
                }// fin n else

                } // fin try


catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();


}

$dbco=null;
?>

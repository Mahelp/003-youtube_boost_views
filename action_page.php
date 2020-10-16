<?php

include  'includes/cnx.php';



try{
  
// vérification de l'accés a la bd

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération des paramétres 

  $login_name=strip_tags($_POST['login_name']);
  $email=strip_tags($_POST['email']);
  $pass=strip_tags($_POST['pass']);
  $pass_repeat=$_POST['pass_repeat'];
  $cle='0';//strip_tags($_POST['cle']);
  $actif='0';//strip_tags($_POST['actif']);
  $id_chaine='0';//strip_tags($_POST['id_chaine']);
  $video_banned='0';
  $coins_value=0;
// vérifier si le mail est déja insérer==> éviter d'insérer plusieur mail similaire

$sth = $dbco->prepare("SELECT email FROM  youtube_user 
WHERE email=:email 
");

$sth->execute(array(
':email' => $email
));

$row = $sth->fetch();

if (!empty($email))
{

  // vérifer si les deux mot de passes sont similaire sinon erreur
          if ($pass==$pass_repeat)
            
                {
              $sth = $dbco->prepare("INSERT INTO youtube_user (login_name, email, pass,cle,actif, id_chaine,video_banned,coins_value)
                       VALUES (:login_name, :email, :pass,:cle,:actif, :id_chaine,:video_banned,:coins_value)
                       ");
                $sth->execute(array(
                                    ':login_name' => $login_name,
                                    ':email' => $email,
                                    ':pass' => $pass,
                                    ':cle' => $cle,
                                    ':actif' => $actif,
                                    ':id_chaine' => $id_chaine,
                                    ':video_banned' => $video_banned,
                                    ':coins_value' => $coins_value
                                  ));
                                    
               // echo "Entrée ajoutée dans la table";
            
            
      // générer la clé d'authentification (UPDATE)
      $cle = md5(microtime(TRUE)*100000);
      $sth = $dbco->prepare("UPDATE youtube_user SET cle=:cle 
                       WHERE email=:email
                       ");
                $sth->execute(array(
                                    ':cle' => $cle,
                                    ':email' => $email));
                                    
               // echo "Table a été mise à jour";
        
            
                // Préparation du mail contenant le lien d'activation
                
                //echo  $email;
                $destinataire = $email;
                $sujet = "Activer votre compte" ;
                $entete = "From: noreply_113@marochelp.com" ;
                
                // Le lien d'activation est composé du email(email) et de la clé(cle)
                $message = 'Welcome ,
                
                To activate your account, please click on the link below
                or copy / paste into your internet browser.
                
                http://www.marochelp.com/youtube_boost049/activation.php?email='.urlencode($email).'&cle='.urlencode($cle).'
                
                
                ---------------
                This is an automatic email, please do not reply.';
                
                
                mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
                
                echo "Congratulation your account has been created,an email has already been sent to your email box ". "<a href=\"login.php\"> click here </a> ";
                

                }// fin if ($pass==$pass_repeat)
                else 
                {
                  echo "The two passwords are not similar,please retype password ". "<a href=\"signup.php\"> click here </a> "; 

                }// fin else


              }//fin if (!isset($row['email'])!=$email)
              else 
              {
                 echo "email is empty or is already exist, please try another". "<a href=\"signup.php\"> click here </a> ";

              }// fin elseif (!isset($row['email'])!=$email)

            
              } // fin try


            catch(PDOException $e){
                //echo "Erreur : " . $e->getMessage();
                echo "Erreur : mail already exist or empty,please try another". "<a href=\"signup.php\"> click here </a> "; 
          
        }// fin catch

        $dbco=null;
  ?>

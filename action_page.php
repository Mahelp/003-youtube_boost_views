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
  $cle='0';//strip_tags($_POST['cle']);
  $actif='0';//strip_tags($_POST['actif']);
  $id_chaine='0';//strip_tags($_POST['id_chaine']);
  $video_banned='0';
// exécution de la requête d'insertion (INSERTION)
  $sth = $dbco->prepare("INSERT INTO youtube_user (login_name, email, pass,cle,actif, id_chaine,video_banned)
                       VALUES (:login_name, :email, :pass,:cle,:actif, :id_chaine,:video_banned)
                       ");
                $sth->execute(array(
                                    ':login_name' => $login_name,
                                    ':email' => $email,
                                    ':pass' => $pass,
                                    ':cle' => $cle,
                                    ':actif' => $actif,
                                    ':id_chaine' => $id_chaine,
                                    ':video_banned' => $video_banned
                                  ));
                                    
                echo "Entrée ajoutée dans la table";
            
            
      // générer la clé d'authentification (UPDATE)
      $cle = md5(microtime(TRUE)*100000);
      $sth = $dbco->prepare("UPDATE youtube_user SET cle=:cle 
                       WHERE email=:email
                       ");
                $sth->execute(array(
                                    ':cle' => $cle,
                                    ':email' => $email));
                                    
                echo "Table a été mise à jour";
        
            
                // Préparation du mail contenant le lien d'activation
                
                echo  $email;
                $destinataire = $email;
                $sujet = "Activer votre compte" ;
                $entete = "From: noreply_113@marochelp.com" ;
                
                // Le lien d'activation est composé du email(email) et de la clé(cle)
                $message = 'Bienvenue sur VotreSite,
                
                Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
                ou copier/coller dans votre navigateur Internet.
                
                http://www.marochelp.com/youtube/activation.php?email='.urlencode($email).'&cle='.urlencode($cle).'
                
                
                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.';
                
                
                mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
                




            
              } // fin try


            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
          
        }// fin catch

        $dbco=null;
  ?>

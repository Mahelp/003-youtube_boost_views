<?php
session_start();

include  'includes/cnx.php';

function url_to_id(string $url) {
  
   $str1="https://www.youtube.com/watch?v=";
 
   $id_chaine="url erreur";
 
  $id_chaine = trim(str_replace("$str1","","$url"));
  
  return $id_chaine;
}


try{

 

// vérification de l'accés a la bd

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération des paramétres 


 $id_chaine=url_to_id($_POST['id_chaine']);
 $id = $_SESSION['id'];
  


 if (!empty(($id_chaine)))
 {

  
  // exécution de la requête d'insertion (INSERTION)
  //interdire la maj si la video est dans une compagne active=en cours ...
  $sth = $dbco->prepare("UPDATE youtube_user SET id_chaine=:id_chaine 
                       WHERE id=:id 
                       ");
                $sth->execute(array(
                                    ':id_chaine' => $id_chaine,
                                    ':id' => $id
                                  ));
                                  
                                  header("location: confirmation_page.php");       
                                
           
           
                                } // fin try
              
              }// fin if 
                                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
          
              
  
            }// fin catch

        $dbco=null;
  

 ?>

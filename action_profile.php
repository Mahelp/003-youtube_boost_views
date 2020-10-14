<?php
session_start();

include  'includes/cnx.php';

function url_to_id(string $url) {
         
  $str1="https://www.youtube.com/watch?v=";
  $id_chaine = trim(str_replace("$str1","","$url"));

 $str2=strstr("$url","$id_chaine",true);
 
 if ($str1==$str2)
   {
     return $id_chaine;
   }
   else 
   return "url_error";
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

  
              //1 vérifier que la video n'est pas en compagne active CAD IN_PROGRESS 
              $sth = $dbco->prepare("SELECT id_chaine FROM  youtube_campaign_views 
                                      WHERE id_chaine=:id_chaine AND  statut_campaign='IN_PROGRESS'
                                    ");
                
                $sth->execute(array(
                            ':id_chaine' => $id_chaine
                            
                          ));
                          
                          $row = $sth->fetch();
                          
                          if (!isset($row['id_chaine']))
                          {
  
                              //2 maj l'id de la chaine
                              $sth = $dbco->prepare("UPDATE youtube_user SET id_chaine=:id_chaine 
                                                  WHERE id=:id 
                                                  ");
                                            $sth->execute(array(
                                                                ':id_chaine' => $id_chaine,
                                                                ':id' => $id
                                                              ));
                                                              
                                                              header("location: confirmation_page.php");       
                                                            
                      
                                                            }// fin  !isset($row['id_chaine'])
                                                            else 
                                                             echo "Your video is in campaign in progress,please wait until statut : CLOSED..."
                                                             ."<a href=\"profile_todo.php\">click here  </a>"
                                                             ;
                                            } // fin try
                          
                          }// fin if 
                                catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
          
              
  
            }// fin catch

        $dbco=null;
  

 ?>

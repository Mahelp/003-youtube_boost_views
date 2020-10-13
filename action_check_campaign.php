<?php
 session_start();                            


 function url_to_id(string $url) {
  
  $str1="https://www.youtube.com/watch?v=";

  $id_chaine="url erreur";

 $id_chaine = trim(str_replace("$str1","","$url"));
 
 return $id_chaine;
}


include  'includes/cnx.php';

try{
  
// vérification de l'accés a la bd

  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération des paramétres 


 $id_chaine = url_to_id($_POST['id_chaine']);
 $id = $_SESSION['id'];
 $coins_value_user = $_POST['coins_value_user'];
 
 if (!empty(($id_chaine)))
 {
// Requête pour réasigner l'url a nouveau ou pour la premiere fois
// interdire de maj l'url si elle est en compagne active
  $sth = $dbco->prepare("UPDATE youtube_user SET id_chaine=:id_chaine 
                       WHERE id=:id  
                       ");
                $sth->execute(array(
                                    ':id_chaine' => $id_chaine,
                                    ':id' => $id
                                  ));
                                  
                                //  header("location: confirmation_page.php");       
                                
           
           
                                } // fin if
              
              
              
              // vérifier si les coins de l'utilisateur sont suffisant avant de créer une compagne.
              
              $sth2 = $dbco->prepare("SELECT coins_value FROM  youtube_user 
              WHERE id=:id
              ");

              $sth2->execute(array(
              ':id' => $id
              ));


              if($row = $sth2->fetch())
              {
              $coins_value = $row['coins_value']; // 
              }


              if ($coins_value_user > $coins_value ) 
              {
                                                     
                echo "error you do not have Enough coins..."."<a href=\"index.php#tab2\">Click her please </a>";
                 
              }
                    else 
                    {
                    
                    // 1- traitement pour la soustraction :  $coins_value - $coins_value_user = le reste des coins
                    
                     
                      
                      $sth = $dbco->prepare("UPDATE youtube_user SET coins_value =coins_value- :coins_value_user
                      WHERE id=:id
                        ");
                      $sth->execute(array(
                        ':coins_value_user' => $coins_value_user, 
                          ':id' => $id                 
                          ));
                  
                   
                    
                  // 2- creation de la ligne dans la table campaign_views
                  
                  
                              // récupération des paramétres 

              
                              //$id_chaine = $_POST['id_chaine'];//id_chaine de la compagne
                              $id = $_SESSION['id'];//id_user de la compagne
                              $statut_campaign="EN_COURS";// peut être : init ou en cours ou terminée
                              //$date_create_campaign=new DateTime();
                              $id_chaine_target='0';//id des chaines qui visualisent la video de la compagne
                              //$date_views_chaine=new DateTime();
                              $count_view_chaine=0;// le compteur des visites de chaque vidéo
                              $coins_value_user=$_POST['coins_value_user']; // la valeur des coins mis par l'utilisateur
                              $count_views_coins=($coins_value_user/100);// = valeur des coins du user/100;
                              $is_admin=0;// si la video est d'un admin 0=non admin 1=admin
                            // si count_views_coins qui est calculée au début==count_view_chaine(incrément des views des user) alors le staut de la compagne = terminée

                            




                             $sth = $dbco->prepare("INSERT INTO youtube_campaign_views (id_chaine, id_user, statut_campaign,date_create_campaign,id_chaine_target, date_views_chaine,count_view_chaine,count_views_coins,coins_value_user,is_admin)
                            VALUES (:id_chaine, :id_user, :statut_campaign,NOW(),:id_chaine_target,NOW(),:count_view_chaine,:count_views_coins,:coins_value_user,:is_admin)
                                                ");
                                          $sth->execute(array(
                                                              ':id_chaine' => $id_chaine,
                                                              ':id_user' => $id,
                                                              ':statut_campaign' => $statut_campaign,
                                                              ':id_chaine_target' => $id_chaine_target,
                                                              ':count_view_chaine' => $count_view_chaine,
                                                              ':count_views_coins' => $count_views_coins,
                                                              ':coins_value_user' => $coins_value_user,
                                                              ':is_admin' => $is_admin
                                                           
                                                            ));
                                                              
                                        
                   header("location: profile_todo.php"); 
                  
                  } // fin else
      
                     
              
              
                  
              
                }// fin try
                               
             
              
                
              
              
              catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
    
 
            }// fin catch

        $dbco=null;
  

 ?>



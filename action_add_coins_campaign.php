
 <?php
 session_start();                            
include  'includes/cnx.php';

try 
     {
  
    // vérification de l'accés a la bd
    
      $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // récupération des paramétres 
     
        //1 ajouter coins 
    
                // si ce flag=1 alors c'est que le user a bien attendu 60s par exemple 
                $flag_view_count_ok = $_GET['flag_view_count_ok'];
                //$id_chaine = strip_tags($_GET['id_chaine']); // id de la chaine visualisée
                $id_chaine = str_replace("/","",$_GET['id_chaine']); // id de la chaine visualisée
                //str_replace("/","","$id_chaine");
                $id = $_SESSION['id'];

                    $sth = $dbco->prepare("UPDATE youtube_user SET coins_value =coins_value+ 100
                                      WHERE id=:id
                                          ");
                                  $sth->execute(array(
                                  ':id' => $id                 
                                    ));
                  
        
            
        // 2 incrémenter la compagne

        $sth = $dbco->prepare("UPDATE youtube_campaign_views SET count_view_chaine =count_view_chaine + 1
                                      WHERE id_chaine=:id_chaine AND statut_campaign='IN_PROGRESS'
                                          ");
                                  $sth->execute(array(
                                  ':id_chaine' => $id_chaine             
                                    ));

                                   /*
                                    echo "ID===".$id."----------". 
                                    str_replace("/","","$id_chaine");
                                   */
                                    //$id_chaine;
                                    
                           

           // 3 CLOSED la compagne si  si count_views_coins qui est calculée au début==count_view_chaine(incrément des views des user) alors le staut de la compagne = terminée
                        
                        
                       
                       // initialisation des variables/paramétres
                       $count_view_chaine=0;
                       $count_views_coins=0;
                       
                       
                       $sth = $dbco->prepare("SELECT  count_view_chaine,count_views_coins FROM youtube_campaign_views 
                                                    WHERE id_chaine=:id_chaine AND statut_campaign='IN_PROGRESS'
                                                        ");
                                  $sth->execute(array(
                                   ':id_chaine' => $id_chaine             
                                    ));
                              
                                    if($sth->execute(array(':id_chaine' => $id_chaine)) && $row = $sth->fetch())
                                    {
                                      
                                      $count_view_chaine = $row['count_view_chaine'];    // Récupération de la clé
                                      $count_views_coins = $row['count_views_coins']; // $actif contiendra alors 0 ou 1
                                    
                                      //echo "incrément : ".$count_view_chaine;
                                      //echo "calculé au début: ".$count_views_coins;
                                    }
                        
                                if ($count_view_chaine==$count_views_coins)
                                {

                                  $sth = $dbco->prepare("UPDATE youtube_campaign_views SET statut_campaign ='CLOSED'
                                                         WHERE id_chaine=:id_chaine AND statut_campaign='IN_PROGRESS'
                                      ");
                                  $sth->execute(array(
                                      ':id_chaine' => $id_chaine             
                                        ));

                                }
                                   

                                header("location: index.php"); 

  }// fin try 
  catch(PDOException $e)
  {
    echo "Erreur : " . $e->getMessage();
 
  }// fin catch

$dbco=null;
                            
/* 
                            if (isset($_GET["var1"]) && isset($_GET["var2"])) 
                                    {
                                     echo  $_GET["var1"];
                                     echo  $_GET["var2"];
                                     }
                                 
                                 // header("location: index.php");        
*/
?>
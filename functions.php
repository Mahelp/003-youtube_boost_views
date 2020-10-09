
 <?php
 session_start();                            
include  'includes/cnx.php';

try 
     {
  
    // vérification de l'accés a la bd
    
      $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
      $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // récupération des paramétres 
    
    
    // si ce flag=1 alors c'est que le user a bien attendu 60s par exemple 
    $flag_view_count_ok = $_GET['flag_view_count_ok'];
    $id_chaine = strip_tags($_GET['id_chaine']);
    $id = $_SESSION['id'];
echo  $id."<br>";
echo  $id_chaine;


        $sth = $dbco->prepare("UPDATE youtube_user SET coins_value =coins_value+ 100
                           WHERE id=:id
                              ");
    $sth->execute(array(
                 ':id' => $id                 
               ));
                  





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
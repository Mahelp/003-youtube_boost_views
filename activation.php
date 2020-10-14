<?php
include  'includes/cnx.php';

try{
  
  // vérification de l'accés a la bd
  
    $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // récupération des paramétres 
    $email = $_GET['email'];
    $cle = $_GET['cle'];  

    // récupération de la clé BDD et du flag actif en fonction de l'email (select where)
    $sth = $dbco->prepare("SELECT cle,actif FROM  youtube_user 
                          WHERE email=:email
                        ");
    $sth->execute(array(
                ':email' => $email
              ));
       
    if($sth->execute(array(':email' => $email)) && $row = $sth->fetch())
    {
      $clebdd = $row['cle'];    // Récupération de la clé
      $actif = $row['actif']; // $actif contiendra alors 0 ou 1
    }
  
      // On teste la valeur de la variable $actif récupérée dans la BDD
if($actif == '1') // Si le compte est déjà actif on prévient
{
   echo "Your account is already active !";
}
else // Si ce n'est pas le cas on passe aux comparaisons
{
   if($cle == $clebdd) // On compare nos deux clés    
     {
        // Si elles correspondent on active le compte !    
        echo "Your account has been activated !";

        // La requête qui va passer notre champ actif de 0 à 1
        $stmt = $dbco->prepare("UPDATE youtube_user SET actif = 1 WHERE email like :email ");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
     }
   else // Si les deux clés sont différentes on provoque une erreur...
     {
        echo "Error ! Your account cannot be activated...";
     }
}

  
  } // fin try


  catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();

}// fin catch

$dbco=null;
$stmt= null;
?>
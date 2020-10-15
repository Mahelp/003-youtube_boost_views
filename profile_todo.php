<?php
include 'verif_session.php';
//session_start();
include  'includes/cnx.php';
?>
<title>Boost your Views</title>
<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script><!------ Include the
 above in your HEAD tag ---------->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


 

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->



<!-- Submitted to Feature  March 2, 2014  2:42pm  -->

<style>

.container{
padding: 30px;   
}

/*
Custom modal, you can remove all of these for default behavior
*/

.modal-content{
  background-color:#222;
  color:#ddd;
}

.modal-dialog {
  width: 400px;
  overflow: auto;
  background-color:#333;
}

/* custom animation */
.modal.fade {
  left: -50%;
  -webkit-transition: opacity 0.3s linear, left 0.3s ease-out;
     -moz-transition: opacity 0.3s linear, left 0.3s ease-out;
       -o-transition: opacity 0.3s linear, left 0.3s ease-out;
          transition: opacity 0.3s linear, left 0.3s ease-out;
}

.modal.fade.in {
  left: 100px;
}
</style>

<script>

function reload_page(){
 
  document.location.reload(true);

}
</script>



<div class="container">








<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Channel Boost Youtube</a>
        </div>



<div id="navbar" class="collapse navbar-collapse">
        
        <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="#">Home</a></li>-->
          <li><a href="Faq.php">How to </a></li>
          <li><a href="contact.php">Contact</a></li>
        </ul>
                         
        <ul class="nav navbar-nav navbar-right">
      
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

    </ul>

      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <br>
  <br>



<div class="row">

       <div class="well well-lg ">
    <h1><p class="text-center">Welcome : <?php  if (isset($_SESSION['login_name'])) echo $_SESSION['login_name']; ?> <i class='fas fa-grin' style='font-size:48px;color:red'></i></p></h1>
    <?php
                      // code sert à afficher les coins par la variable row et non pas session
                      // copier coller de la page action_login.php
                      
                            
                             try{
                               
                                 // vérification de l'accés a la bd
                                 
                                   $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
                                   $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                 
                                 // récupération des paramétres 
                                 $id = $_SESSION['id'];
                             
                                 // récupération de l'email(idf) et du mot de passe en bdd en fonction des deux param
                                 $sth = $dbco->prepare("SELECT id,coins_value FROM  youtube_user 
                                                       WHERE id=:id 
                                                     ");
                                 
                                 $sth->execute(array(
                                             
                                             ':id' => $id
                                           ));
                                 
                                                                
                                 
                                 if($sth->execute(array(':id' => $id)) && $row = $sth->fetch())
                                 {
                                   $id = $row['id'];    // Récupération de la clé
                                   $coins_value = $row['coins_value']; // $actif contiendra alors 0 ou 1
                                 
                                 }

                                } // fin try


                                catch(PDOException $e){
                                    echo "Erreur : " . $e->getMessage();
                              
                            }// fin catch
                            
                            $dbco=null;
                            



                            ?>



    <h1><p class="text-center">You have : <?php  if (isset($row['coins_value'])) echo $row['coins_value']; ?>  <img src="coins_icone.png" class="img-rounded" alt="coins"> </p></h1>
  
       </div>
<!--   
  <hr>
 
<div class="row">
  
  
          <div class="col-sm-5">
          <form action="action_profile.php" method="post">
          
          <div class="form-group">
            <input  name="id_chaine" type="text" class="form-control"  placeholder="ENTER YOUR URL VIDEO " required>
          </div>
        
           <button  type="submit" class="btn btn-primary" title="submit">
           Insert URL
          </button>
          <a href="index.php" class="btn btn-danger" title="skip" >Skip</a>
          </form>
            </div> <!--fin rcol-sm-6
  
  
      <div class="col-sm-7">
      
      <iframe width="600" height="200" src="https://www.youtube.com/embed/tgbNymZ7vqY">

      <div id="player"></div>
      </iframe>
      
      </div>
  
</div> <!--fin row-->

  

  


  
  
  
  
  <a href="" data-toggle="modal" data-target="#myModal" title="View my LinkedIn profile">
    <img src="http://m.c.lnkd.licdn.com/mpr/mpr/shrink_80_80/p/1/000/005/28a/1771ae7.jpg" alt="">
  </a>

<br><br>

<!-- Button trigger modal -->

<?php
 
 include  'includes/cnx.php';
  
  
  
    
  $dbco = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// récupération et initialisation des paramétres 

$id_user = $_SESSION['id']; // id du user
$id_chaine =0;
$statut_campaign=0;
$count_views_coins=0;
$count_view_chaine=0;

// requête 
$sth = $dbco->prepare("SELECT id,id_chaine,statut_campaign,count_views_coins,count_view_chaine	 
                       FROM  youtube_campaign_views 
                       WHERE id_user=:id_user 
                       ");

$sth->execute(array(
':id_user' => $id_user
));



/*
if($sth->execute(array(':id_user' => $id_user)) && $row = $sth->fetch())
{
  $id_chaine = $row['id_chaine']; 
  $statut_campaign =$row['statut_campaign']; 
  $count_views_coins = $row['count_views_coins']; 
  $count_view_chaine = $row['count_view_chaine']; 

}
*/

  
  
  
  ?>


<!--<hr>-->
<a href="index.php" class="btn btn-danger btn-block" >Continue : Click here to Go to Home PAGE   <span class="glyphicon glyphicon-arrow-right"></span></a>
<br><br>
<h2>Your Campaigns  </h2>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Campaign n:</th>
        <th>video</th>
        <th>status</th>
        <th>Progress</th>
        <th>Refresh</th>
        
      </tr>
    </thead>
    <tbody>
   
    
      
    <?php while($row = $sth->fetch()) { ?>
      
      <tr>
        <td><?php  echo $row['id']?></td>
        <td><?php  $str1="https://www.youtube.com/watch?v=";echo $str1.$row['id_chaine']?></td>
        <td><?php  echo $row['statut_campaign']?></td>
        <td><?php  echo "<span class=\"badge badge-secondary\">".$row['count_views_coins']."/".$row['count_view_chaine']."</span>"?></td>
            <td><?php  if ($row['statut_campaign']=="IN_PROGRESS" )
            {echo "<button class=\"btn btn-primary\" onClick=\"reload_page()\"><span class=\"glyphicon glyphicon-refresh\"></span> Refresh</button>";}
            else{ echo "<p class=\"text-center\"button type=\"button\" class=\"close\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></p>";}          
            
            ?>
            </td>
      </tr>
    <?php } ?>
      
     
    </tbody>
  
  </table>


<hr>


<!--
<hr>
<h3>Your Campaigns views: </h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>num_Campaign</th>
        <th>video</th>
        <th>status</th>
        <th>Porogress</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
        <td>john@example.com</td>
        
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>mary@example.com</td>
       
      </tr>
     
    </tbody>
  
  </table>


<hr>
 -->


</div> <!-- ./row-->
</div> <!-- ./container-->


<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright
   
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
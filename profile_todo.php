<?php
session_start();
?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script><!------ Include the
 above in your HEAD tag ---------->

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
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
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

    <h1>Welcome : <?php  if (isset($_SESSION['login_name'])) echo $_SESSION['login_name']; ?> <i class='fas fa-grin' style='font-size:48px;color:red'></i></h1>
   
    <p class="title"><h2>You have : <?php  if (isset($_SESSION['coins_value'])) echo $_SESSION['coins_value']; ?>  <img src="coins_icone.png" class="img-rounded" alt="coins"> </h2></p>
  
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
            </div> <!--fin rcol-sm-6-->
  
  
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


<hr>
<h3>Your Campaigns views: </h3>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Campaign n:</th>
        <th>video</th>
        <th>status</th>
        <th>Porogress</th>
        
      </tr>
    </thead>
    <tbody>
      
      
    <?php while($row = $sth->fetch()) { ?>

      <tr>
        <td><?php  echo $row['id']?></td>
        <td><?php  echo $row['id_chaine']?></td>
        <td><?php  echo $row['statut_campaign']?></td>
        <td><?php  echo $row['count_views_coins']."/".$row['count_view_chaine']?></td>
        
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
<?php
include 'verif_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<head>
<title>Boost your Views</title>
<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style>
    body{
      padding-top: 100px;
    }
    #content{
      padding-left: 50px;
    }
    </style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
 

</head>

  <body>
    
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
          <!--<li class="active"><a href="#">Home</a></li>-->
            
            <li><a href="contact.php">Contact</a></li>
          </ul>
        

                           


          <ul class="nav navbar-nav navbar-right">

          
          
     
      

        <li><a href="profile_todo.php"><span class="glyphicon glyphicon-user"></span> Welcome :<?php  if (isset($_SESSION['login_name'])) echo $_SESSION['login_name']; ?></a></li>
      
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

      </ul>

      



        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">
<br>

<div class="card">
  <div class="card-header">
  <div class="jumbotron">
  <h1>3 step to use this app</h1>
  
</div>
  
  </div>
  
  <div class="card-body">
  
  <div class="card bg-primary text-white">
    <div class="card-body"><h1>step : 1 - How to win coins?</h1></div>
    <img src="001-Faq.jpg" class="rounded" alt="1">
  
  </div>
  <br>
  
  <br>
  <br>
  
  <div class="card bg-warning text-white">
    <div class="card-body"><h1>step : 2- How to create campaign?</h1></div>
    <img src="002-Faq.jpg" class="rounded" alt="2">
  </div>
  </div>
  <br>



  <div class="card bg-light text-dark">
    <div class="card-body"><h1>step : 3- How to views the growth of yours videos?</h1></div>
    <img src="003-Faq.jpg" class="rounded" alt="3">
    <br>
    <br>
    <br>
    <br>
    <img src="003-1-Faq.jpg" class="rounded" alt="3-1">
  </div>


</div><!--fin card-->


  
  </div>
  
</div>
<br>
<br>
<br>
<br>
<br>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright
   
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
<script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
  
  </body>
</html>
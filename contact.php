<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
    <title>Navigation Tab</title>
    <link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    
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
            <li><a href="Faq.php">How to</a></li>
            
          </ul>
        

                           


          <ul class="nav navbar-nav navbar-right">

          
          
     
      

        <li><a href="profile_todo.php"><span class="glyphicon glyphicon-user"></span> Welcome :<?php  if (isset($_SESSION['login_name'])) echo $_SESSION['login_name']; ?></a></li>
      
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>

      </ul>

      



        </div><!--/.nav-collapse -->
      </div>
    </nav>











    <h1> Contact</h1>
    <div class="panel panel-default">
  <div class="panel-body">
 
    <form action="action_contact.php" method="get">
 
 <div class="form-group">
    <label for="Title">Title </label>
    <input type="title" class="form-control" id="title"  placeholder="Enter Title">
      </div>



<div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="message" rows="5"></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>





</div>
</div>































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
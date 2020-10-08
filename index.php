<?php
    include 'includes/cnx.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Navigation Tab</title>

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
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        

          <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
        <li><a href="profile.php"><span class="glyphicon glyphicon-log-in"></span> Your profile</a></li>

        
        
        <li>
        <a href="#" class="btn btn-danger btn-lg">
          <span class="glyphicon glyphicon-bitcoin"></span>Coins : 0 
        </a>
        </li>
      
      </ul>


        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
<br>


    <ul class="tabs">
      <li class="btn btn-primary active"><a style="color:#FFFFFF" href="#tab1"><h1> 1- View video and win coins</h1></a></li>
      <li class="btn btn-success"><a  style="color:#FFFFFF"href="#tab2"><h1> 2- Boost views by coins </h1></a></li>
      <!-- <li class="btn btn-default"><a href="#tab3">Menu 3</a></li>-->
    </ul>
    
    <div class="article" id="tab1">
    <h3>Contenu 1</h3>
    

    <?php

    $limit = 1;
    
    $db = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $s = $db->prepare("SELECT * FROM youtube_user order by ID DESC");
    $s->execute();
    $allResp = $s->fetchAll(PDO::FETCH_ASSOC);
    // echo '<pre>';
    // var_dump($allResp);
    $total_results = $s->rowCount();
    $total_pages = ceil($total_results/$limit);
    
    if (!isset($_GET['page'])) {
        $page = 1;
    } else{
        $page = $_GET['page'];
    }
    $start = ($page-1)*$limit;

    $stmt = $db->prepare("SELECT * FROM youtube_user ORDER BY id DESC LIMIT $start, $limit");
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    
    $results = $stmt->fetchAll();
       
    $conn = null;
    
    // var_dump($results);
    
    $no = $page > 1 ? $start+1 : 1;


?>

<h2 class="">total videos :  <span class="badge">Total: <?= $total_results; ?></span></h2>

<div class=row>

<div class="col-xs-12"  >    

       <?php 

      foreach($results as $result){ 
         
          echo "<input type=hidden id=variableAPasser value=".$result->id_chaine."/>";

          ?>
          
            <div id="player"></div>
          
          <?php
            }
           
           ?>
        <br>

       </div> <!-- fin div row-->

       <ul class="pagination">
        <li><a href="?page=1">Last Video</a></li>
        
        <?php for($p=1; $p<=$total_pages; $p++){?>
            
            <li class="<?= $page == $p ? 'active' : ''; ?>"><a href="<?= '?page='.$p; ?>"><?= $p; ?></a></li>
        <?php }?>
        <li><a href="?page=<?= $total_pages; ?>">Next Video</a></li>
    </ul>

    </div> <!-- fin div col-xs-12-->

    
    <div class="col-xs-2"  > <h1> <span  class="bg-primary" id="count">0</span></h1></div>
    <div class="col-xs-10"  > <h1> 100 Coins</h1></div>
    
     
    
        <script>
              
      // 2. This code loads the IFrame Player API code asynchronously.
      var tag = document.createElement('script');

      tag.src = "https://www.youtube.com/iframe_api";
      
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
     
     console.log('------00000000000-----------');
     var id_video; 
        id_video = document.getElementById("variableAPasser").value;
        //console.log(id_video);
     
     //console.log(id_video);
     //var player;
      function onYouTubeIframeAPIReady() {
      
        player = new YT.Player('player', {
          height: '500',
          width: '500',
          videoId: id_video,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
     
      
     
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
        
        event.target.playVideo();
        
        
       
        
        }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
             //setTimeout(stopVideo, 6000);
             
							 
               
               // block screen so user cant click
							 /*
                var blockDiv = $(document.createElement('videoCurrentTime'))
								.attr('id', 'blockDiv')
								.height('100%').width('100%')
								.css({'z-index':'3333', 'position' : 'absolute', 'top': '0', 'left':'0'});
								 $('body').append(blockDiv);
							 */
			 
			      setTimeout(stopVideo,10000);//36000---35 seconds
                             
                 // var myVar = setInterval(myTimer, 1000);
    
											
                        var wincoins=0;
                        console.log(wincoins);
                        var count = 10;
												var interval = setInterval(function(){
												  document.getElementById('count').innerHTML=count;
												  count--;
												  if (count === 0){
															clearInterval(interval);
													    wincoins=1;
                                            document.getElementById('count').innerHTML='Done';
													// or...
													//alert("You're out of time!");
                          
                                  
                                    $.ajax({
                                    url: 'functions.php', 
                                    type: 'GET',
                                    data: 'wincoins='+wincoins,
                                    success: function(data){
                                          // instructions
                                          console.log(wincoins);
                                          
                                    }
                                          });
                          
                        

                         
                         
                          }//fin if (count === 0)
												}, 1000);

	
			done = true;
        
	
		
		
		
		
		}
      }
    
/*
function myTimer() {
						  var d = new Date();
						  var t = d.getSeconds();
						  var currentdate=t;
						  document.getElementById("videoCurrentTime").innerHTML = t;

        								 //add  minutes to date
										var minutesToAdd=1;
										var currentDate = new Date();
										var futureDate = new Date(currentDate.getSeconds() + minutesToAdd*6000);

                                       if(currentdate==futureDate){
							            document.getElementById("bingo").innerHTML = futureDate;
	                                       }					
   
						}
						
function updateHTML(elmId, value) {
    document.getElementById(elmId).innerHTML = value;
}

*/
	function stopVideo() {
        player.stopVideo();
     
	  }
	  
	 
    
	
	
	
	
	
	</script>

















    
    </div><!-- fin <div class="article" id="tab1"> -->

    <div class="article" id="tab2">
    <h3>Contenu 2</h3>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    </div>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 Copyright
   
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


<!--
    <div class="article" id="tab3">
    <h3>Contenu 3</h3>
    <p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </p>
    </div>
   -->
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/script.js"></script>
  
  </body>
</html>

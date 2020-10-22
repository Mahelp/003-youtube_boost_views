<?php
 include 'verif_session.php';
 include 'includes/cnx.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Boost your Views</title>
<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script>

function reload_page(){
 
  document.location.reload(true);

}
</script>



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
  
  <script src="https://cdn.jsdelivr.net/gh/mathusummut/confetti.js/confetti.min.js"></script>
    <script>confetti.start(50); </script>
   
    <?php
                             include  'includes/cnx.php';
                            
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

        <div  class="collapse navbar-collapse" id="navbar">
        
          <ul class="nav navbar-nav">
          <!--<li class="active"><a href="#">Home</a></li>-->
            <li><a href="Faq.php">How to</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        




          <ul class="nav navbar-nav navbar-right">

          
          
        <li>
        <a href="#" class="btn btn-danger btn-lg">
         <img src="coins_icone_min.png" class="img-rounded" alt="coins"> <?php if (isset($coins_value)) echo $coins_value;?> 
        </a>
        </li>
        <li><a href="profile_todo.php"><span class="glyphicon glyphicon-user"></span> Welcome :<?php  if (isset($_SESSION['login_name'])) echo $_SESSION['login_name']; ?></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>



    <div class="container">
<br>


    <ul class="tabs">
      <li class="btn btn-primary active"><a style="color:#FFFFFF" href="#tab1"><h2> <span class="glyphicon glyphicon-facetime-video"></span> View videos and win coins</h2></a></li>
      <li class="btn btn-success"><a  style="color:#FFFFFF"href="#tab2"><h2> <span class="glyphicon glyphicon-bullhorn"></span>
     Campaign boost views </h2></a></li>
      <!-- <li class="btn btn-default"><a href="#tab3">Menu 3</a></li>-->
    </ul>
    
    <div class="article" id="tab1">
    <h2><ins>1-Play video and wait</ins> </h2>
    <br>
    <?php

    $limit = 1;
    
    $db = new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    //$s = $db->prepare("SELECT * FROM youtube_user order by ID DESC");
    $s = $db->prepare("SELECT * FROM youtube_campaign_views WHERE statut_campaign='IN_PROGRESS' and video_banned='0' order by ID DESC");
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

    //$stmt = $db->prepare("SELECT * FROM youtube_user ORDER BY id DESC LIMIT $start, $limit");
    $stmt = $db->prepare("SELECT * FROM youtube_campaign_views WHERE  statut_campaign='IN_PROGRESS' and video_banned='0' ORDER BY id DESC LIMIT $start, $limit");
    
    
    $stmt->execute();

    // set the resulting array to associative
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    
    $results = $stmt->fetchAll();
       
    $conn = null;
    
    // var_dump($results);
    
    $no = $page > 1 ? $start+1 : 1;


?>

<!--<h2 class="text-left"> total video :  <span class="badge">Total: //$total_results;</span></h2>-->

<div class=row>

<div class="col-xs-12"  >    

       <?php 

      foreach($results as $result){ 
         
          //echo "<input type=hidden id=variableAPasser value=".$result->id_chaine."/>";
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

    <!--
    <div class="col-xs-2"  > <h1> <span  class="btn btn-danger btn-lg" id="count">0</span></h1></div>
    -->
    <div class="col-xs-6"  > <span  class="btn btn-danger btn-block" id="count"><h2 class="display-2"><span class="glyphicon glyphicon-time"> 0 </span></h2> </span></div>

    

    <div class="col-xs-6"  > <span class="btn btn-warning btn-block"><h2 class="display-2"> wait...and win : 100 <img src="coins_icone_min.png" class="img-rounded" alt="coins"></span></h2> </div>
    
    
    




    
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
          width: '900',
          videoId: id_video,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange,
            
          }
        });
     
      
     
      }

      // 4. The API will call this function when the video player is ready.
    
      function onPlayerReady(event) {
        
        // my maj interdire la lecture auto
        //event.target.playVideo();
        
        }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false;
      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
             //setTimeout(stopVideo, 6000);
             
							 
               
               // block screen so user cant click
							 
                var blockDiv = $(document.createElement('videoCurrentTime'))
								.attr('id', 'blockDiv')
								.height('300%').width('300%')
								.css({'z-index':'3333', 'position' : 'absolute', 'top': '0', 'left':'0' });
                document.documentElement.requestFullscreen(); 
                document.oncontextmenu = new Function("return false");
                $('body').append(blockDiv);
                 

          
			 
			      //setTimeout(stopVideo,10000);//36000---35 seconds
                             
                 // var myVar = setInterval(myTimer, 1000);
    
											
                        var wincoins=0;
                        console.log(wincoins);
                        var count = 70//10;
												var interval = setInterval(function(){
												  document.getElementById('count').innerHTML="<h2 class=\"display-2\"> <span class=\"glyphicon glyphicon-time\">" +count+ " </h2></span>";
												  count--;
												  if (count === 0){
															clearInterval(interval);
													    wincoins=1;
                                            document.getElementById('count').innerHTML='Done';
													// or...
													//alert("You're out of time!");
                          
                                  
                                    $.ajax({
                                    url: '#', 
                                    type: 'POST',
                                    data: 'wincoins='+wincoins,
                                    success: function(data){
                                          // instructions
                                          console.log(wincoins);
                                         // document.getElementById('wincoins').innerHTML=wincoins; 
                                          //wincoins=document.getElementById('mycoins_60').value; 
                                          window.location.href = "action_add_coins_campaign.php?flag_view_count_ok="+wincoins+"&id_chaine="+id_video ;
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
    <h2> <ins>2- Create campaign</ins></h2>
    <br>
    <div class="row">
            <div class="col-sm-4">
                <form class="form-group" action="action_check_campaign.php" method="post">
                      <div class="form-group">
                        <label for="url">Url video:</label>
                        <input type="text" class="form-control" name="id_chaine"  placeholder=" ENTER URL VIDEO" required>
                          <label for="url">insert coins</label>
                          <input type="text" class="form-control" name="coins_value_user" required placeholder="example :100">

                      </div>
                      <button type="submit" class="btn btn-success btn-block">Create campaign</button>
             </form>
                 
        <hr>
               
             <table class="table">
    <thead>
      <tr class="success">
        <th><h3>Coins value<h3></th>
        <th><h3>nbr of views<h3></th>
        <th><h3>nbr of seconds<h3></th>
        
      </tr>
    </thead>
    <tbody>
      <tr class="active">
        <td><h4>100 coins</h4></td>
        <td><h4>1 Vue</h4></td>
        <td><h4>70 s</h4></td>
        
      </tr>
    </tbody>

    <tbody>
      <tr class="active">
        <td><h4>200 coins</h4></td>
        <td><h4>2 vues</h4></td>
        <td><h4>140 s</h4></td>
        
      </tr>
    </tbody>


    <tbody>
      <tr class="active">
        <td><h4>300 coins</h4></td>
        <td><h4>3 vues</h4> </td>
        <td><h4>210 s</h4></td>
        
      </tr>
    </tbody>


    <tbody>
      <tr class="active">
        <td><h4>400...</h4></td>
        <td><h4>4... </h4></td>
        <td><h4>240...</h4></td>
        
      </tr>
    </tbody>

  </table>
                 
                 
                 
                 
                 </div><!--col-sm-4-->
                      <div class="col-sm-8">
                      
                      <div class="container alert alert-success" style="padding-top: 100px;">
                      <h1>You have :  <?php if (isset($coins_value)) echo $coins_value ?>  <img src="coins_icone_min.png" class="img-rounded" alt="coins"></h1>
                      </div>

<hr>
    



<?php
  
  
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
                       order by id desc
                       ");

$sth->execute(array(
':id_user' => $id_user
));

?>


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
        <td>
        <?php  $url_finale="https://www.youtube.com/watch?v=".$row['id_chaine'];
       
       echo  "<a href=".$url_finale.">Views Video</a>";
        
       $url_Embded = "https://www.youtube.com/embed/".$row['id_chaine'];
       
            echo"<div class=\"embed-responsive embed-responsive-16by9\">
               <iframe class=\"embed-responsive-item\" src=".$url_Embded."></iframe>
               </div>  "
        ?>
        
        
        </td>
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
















                      </div><!--col-sm-8-->    
         
          
   
   
   </div><!--fin <div class="row">-->
                          

    </div> <!-- fin <div class="article" id="tab2"> -->


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!--
    <div class="page-header ">
    <h1> <p class="text-primary" >sponsored videos</p> </h1>   
     </div>
  <div class=row>
    <div class="col-xs-2"> ----- </div>
    <div class="col-xs-2"> +++++ </div>
    <div class="col-xs-2">////// </div>
    <div class="col-xs-2"> ......</div>
    <div class="col-xs-2"> 11222 </div>
    <div class="col-xs-2"> 989898 </div>

    </div>
-->



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

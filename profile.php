<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

<link rel="icon" href="favicon.png" type="image/gif" sizes="16x16">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 1000px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>

<h2 style="text-align:center">User Profile Card</h2>

<div class="card">
  <!--<img src="/w3images/team2.jpg" alt="John" style="width:100%">-->
  <h1>Welcome : <?php  if (isset($_SESSION['login_name'])) echo $_SESSION['login_name']; ?></h1>
  <p class="title"><i class='fas fa-grin' style='font-size:48px;color:red'></i></p>
  
  <form action="action_profile.php" method="post">
  <div class="form-group">
    <input  name="id_chaine" type="text" class="form-control"  placeholder="ENTER YOUR URL VIDEO " required>
  </div>

  <br>
  <button type="submit" class="btn btn-default">Submit</button>
  <a href="index.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Skip</a>
  </form>
  
<br>
  <iframe width="200" height="200" src="https://www.youtube.com/embed/tgbNymZ7vqY">

<div id="player"></div>
</iframe>

<h2>Your campaign list : </h2>
      <ul>
      <li>Campaign | detail </li>
      <li>11111 | xxxxxx </li>
      <li>22222 | xxxxxx </li>
      </ul>

  
  <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
  <!--<p><button>Contact</button></p>-->
</div>




<!--

<script>
var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '360',
    width: '640',
    videoId: 'M7lc1UVf-VE',
    events: {
      'onReady': onPlayerReady,
      'onStateChange': onPlayerStateChange
    }
  });
}

</script>
-->
</body>
</html>

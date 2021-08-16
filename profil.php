
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <meta charset="UTF-8">
  <nav class="menu1">
				<ul>
			<li class="btn" >
				<a href="http://localhost:8080/tp/anagramme/main.php" target="_self"><h3><span>Accueil</span></h3></a>
			</li>
			<li class="btn">
      <a href="http://localhost:8080/tp/anagramme/login.php?logout=1" onclick="basicPopup(this.href);return false"><span><h3>Changer de compte</h3></span></a>
			</li>
			
			<li class="btn">
				<a href="http://localhost:8080/tp/anagramme/main.php?logout=1" target="_Blank"><h3><span>Déconnexion</span></h3></a>
			</li>
		</ul>
    </nav>
    <style>
body {
  background-image: url("img/background_anagramme.jpg");
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size: 100% 100%;
}
</style>
    <body>
    <?php 
session_start();
if(isset($_SESSION['nom']))
{
  echo "<script>console.log('bonjour1');</script>";
  if("" == trim($_SESSION['score']))
{
  $mail=$_SESSION['mail'];
  echo "<script>console.log('bonjour2');</script>";
  $score=$_POST['score'];
  $lastscore=$_SESSION['score'];
  echo "<script>console.log('Votre ancien score est : " . $lastscore . "' );</script>";
  echo "<script>console.log('Votre nouveau score est : " . $score . "' );</script>";
    if($lastscore<$score)
  $sql="UPDATE utilisateur SET score=$score where  mail=$mail ";
}

  echo'<blockquote><blockquote><blockquote><blockquote><br><br></blockquote>';
  echo '<p><span class="red">B','ienvenue  ',$_SESSION['prenom'],' !</p>';
  echo'<blockquote><blockquote><br><br><b>NOM</b> : ',$_SESSION['nom'];
  echo'<br><br><br><b>PRENOM</b> : ',$_SESSION['prenom'];
  echo'<br><br><br><b>ADRESSE MAIL</b> : ',$_SESSION['mail'];
  echo'<br><br><br><b>DATE DE NAISSANCE</b> : ',$_SESSION['d_naissance'];
  echo'<br><br><br><b>SCORE</b> : ',$_SESSION['score'];
}
else {
  header("Location: http://localhost:8080/tp/anagramme/login.php");
}
 ?>          
    </body>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v9.0" nonce="EALHscqV"></script>
<div class="fb-share-button" data-href="http://localhost:8080/tp/anagramme/profil.php" data-layout="button" data-size="small">
    <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fzack.ac.58%2F&amp;src=sdkpreparse"
      class="fb-xfbml-parse-ignore">Share</a></div>
      <a href="https://twitter.com/ACHOURZakaria2?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @ACHOURZakaria2</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</html>
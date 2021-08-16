<?php
session_start();
if(isset($_GET['logout']))
{   session_unset();
  }
if(isset($_SESSION['nom']))
{
echo '<Bienvenue ',$_SESSION['nom'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Anagramme</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<script src="js/script.js"></script>
</head>
<body >
	</div>
		<nav class="menu1">
				<ul>
			<li class="btn" >
				<a href="http://localhost:8080/tp/anagramme/profil.php" ><h3><span>Mon Profile</span></h3></a>
			</li>
			<li class="btn">
      <a href="http://localhost:8080/tp/anagramme/login.php" onclick="basicPopup(this.href);return false"><span><h3>Se connecter</h3></span></a>
			</li>
			<li class="btn">
				<a href="http://localhost:8080/tp/anagramme/inscription.php" onclick="basicPopup(this.href);return false"><h3><span>S'inscrire</span></h3></a>
			</li>
		</ul>
	</nav>
<p class="titre"> <h2>  <u> Anagramme:</u></h2>   
    </p>
	<p class="intro">	
    <p><blockquote> Anagramme est un jeu de société qui consiste à former un mot à partir de lettres données d'un autre mot.</blockquote></p>
<p> Le jeu de poche Anagramme propose à deux joueurs ou deux équipes de trouver avant l'adversaire l'anagramme qui se trouve devant lui, chacun ayant en lecture une anagramme différente composée des mêmes lettres.</p>
<p class="titre"> <h2>  <u> Principe du jeu:</u></h2>   
<blockquote>Lorsqu'un joueur lance une partie sur le serveur, le serveur choisit 8 lettres aléatoirement.</blockquote><blockquote><blockquote> - Le joueur a alors 60 secondes pour trouver un maximum d'anagrammes utilisant ces lettres.</blockquote><blockquote> - À chaque fois que le joueur pense trouver un mot, il doit être correct et valide d'après un dictionnaire embarqué.</blockquote> <blockquote>- La partie se terminera lorsque le joueur n'aura plus de temps.</blockquote>
<style>
body {
  background-image: url("img/background_anagramme.jpg");
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size: 100% 100%;
}
.container {
  position: relative;
  width: 100%;
  max-width: 400px;
}
.container img {
  width: 100%;
  height: auto;
  text-align: center;
  margin-left: 470px; 
}
.container .btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  margin-left: 470px; 
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
.container .btn:hover {
  background-color: black;
}
</style>
</head>
<body >
<div class="container">
  <img src="https://favtutor.com/resources/images/uploads/Anagram_python_project.jpg" alt="Anagram" style="width:100%">
  <button   onclick="location.href = 'http://localhost:8080/tp/anagramme/index.php';" class="btn" >Jouer</button>
</div>
<p>L'objectif est d'être plus rapide et réactif en jouant. Typiquement, à chaque fois que le joueur trouve un mot, son compteur de temps restant doit être augmenté. Ensuite, il doit être possible de demander un nouveau tirage de lettres.</p>
		   Pour en savoir plus, n'hésitez pas à consulter la page suivante,cliquez
		<a href="https://fr.wikipedia.org/wiki/Anagramme" target="_Blank"> içi:</a>
 <img src="data:image/png;base64,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" width="40" >
 	<footer>Copyright &copy; A.Z 2020-2021. All rights reserved.</footer>
</body>
</html>
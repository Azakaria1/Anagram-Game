<?php
try{
$connexion = new PDO("mysql:host=127.0.0.1;dbname=anagramme php", 'root', '');
// gestion des erreurs potentielles :
$connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connexion->query("SELECT * FROM utilisateur WHERE mail = '$_POST[email]' AND pwd='$_POST[password]'");
$rows = $request->rowCount();
if ($rows>=1)
{
	session_start();
	$donnees=$request->fetch();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$_SESSION['mail']=secure($donnees['mail']) ;
	$_SESSION['nom']=secure($donnees['nom']);
	$_SESSION['prenom']=secure($donnees['prenom']);
	$_SESSION['d_naissance']=secure($donnees['d_naissance']);
	$_SESSION['score']=secure($donnees['score']);
	}
	  header("Location: http://localhost:8080/tp/anagramme/index.php");
      } 
else
{
	header("Location: http://localhost:8080/tp/anagramme/login.php");
}}
 catch(PDOException $e){
   echo 'Echec de connexion:' ,$e->getMessage();
                       }
function secure($donnee)
{
    trim($donnee); 
    stripslashes($donnee);
    strip_tags($donnee);
return $donnee ;
}
//Les cookies permettent de garder en mémoire les identifiants afin que les utlisateurs puissent se connecter facilement
    ?>
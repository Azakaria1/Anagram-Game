<?php
session_start();
  $newscore= $_POST['score'];
 if($newscore>$_SESSION['score']){
 try{
$connexion = new PDO("mysql:host=127.0.0.1;dbname=anagramme php", 'root', '');
 $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connexion->query("UPDATE utilisateur SET score='$newscore'  WHERE mail='$_SESSION[mail]' ;");
  $request->execute();
  //$_SESSION['score']=$newscore;
    header("Location: http://localhost:8080/tp/anagramme/index.php?newhighscore=$newscore"); 
} 
 catch(PDOException $e){
   echo 'Echec de connexion:' ,$e->getMessage();
 }}
?>

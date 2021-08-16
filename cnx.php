<?php
 try{
$connexion = new PDO("mysql:host=127.0.0.1;dbname=anagramme php", 'root', '');
// gestion des erreurs potentielles :
 $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connexion->query("SELECT * FROM utilisateur WHERE mail='$_POST[mail]'");
$rows = $request->rowCount();
if ($rows>=1){       
     header("Location: http://localhost:8080/tp/anagramme/inscription.php");
      }
else{    
 if($_POST['pwd']!=$_POST['c_pwd'] ){
     header("Location: http://localhost:8080/tp/anagramme/inscription.php");
}
else{
  session_start();
  $request = $connexion->prepare("INSERT INTO utilisateur(nom,prenom, mail , d_naissance, pwd)
                   VALUES(:nom,:prenom,:mail,CAST(:d_naissance AS DATE),:pwd)");
  $request->bindParam(':nom', $_POST['name']);
  $request->bindParam(':prenom', $_POST['prenom']);
  $request->bindParam(':mail', $_POST['mail']);
  $request->bindParam(':d_naissance', $_POST['d_naissance']);
  $request->bindParam(':pwd', $_POST['pwd']);
  $request->execute();
  header("Location: http://localhost:8080/tp/anagramme/login.php");
}}}
 catch(PDOException $e){
   echo 'Echec de connexion:' ,$e->getMessage();
 }
?>
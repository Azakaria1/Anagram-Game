<?php
session_start();
if(isset($_GET['logout']))
  {     session_unset();  }
?>
<!DOCTYPE html>
<html>
    <meta charset="UTF-8" >
    <head>
        <style>
body {
  background-image: url("img/bg_login.jpg");
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size: 100% 100%;
}</style>
    <title>S'inscrire</title>
		<nav class="menu1">
				<ul>
			<li class="btn" >
				<a href="http://localhost:8080/tp/anagramme/main.php" target="_self"><h3><span>Accueil</span></h3></a>
			</li>
			<li class="btn">
				<a href="login.php" target="_self"><h3><span>Se connecter</span></h3></a>
			</li>
		</ul>
	</nav>
    <script >
    function validateform() {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email=document.getElementById('mail').value;
    var  result=re.test(String(email).toLowerCase());
    if(!result){ alert('Mail invalidé');}
    return result;
}
function validateDate()
        {
            var birthday= new Date(document.getElementById('d_naissance').value);
            var today= new Date();
            var ageDifMs = today.getFullYear() - birthday.getFullYear();
 //   var ageDate = new Date(ageDifMs); // miliseconds from epoch
console.log('age='+ageDifMs); 
          if(ageDifMs>=18 )
        {
            document.getElementById('envoyer').disabled =false  ;   
            document.getElementById('errormessage').innerHTML =""; 
        }
        else 
   {     document.getElementById('envoyer').disabled =true ;   
    document.getElementById('errormessage').innerHTML ="Date de naissance invalide ";   }
    }
</script>
    <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
    <div class="container">
    <div class="main">
    <div id="errormessage"></div>
    <form   action="cnx.php" onsubmit="return validateform()" class="box" method="post" name="myform">
                                <h3>Create your account</h3>
                             <label for="name" >Nom :</label>
                            <input type="text" name="name" id="name"/>
                            <label for="prenom">Prénom :</label>
                            <input type="text" name="prenom"  id="prenom"   />
                        <label for="mail" >Adresse mail :</label> <br>
                            <input type="mail" name="mail" id="mail"/><br>
                        <label for="d_naissance" >Date naissance :</label><br>
                            <input type="date" onchange="validateDate()" name="d_naissance" id="d_naissance"/><br>
                            <br> <label for="pwd">Mot de passe :</label>
                            <input type="password" name="pwd"  id="pwd"   />                      
                            <label for="c_pwd">Confirmer Mot de passe :</label>
                            <input type="password" name="c_pwd"  id="c_pwd"   />
                            <input type="submit"id="envoyer" name="envoyer" value="Sign up" />
    
    </form>
    </div>
    </div>
    </body>
    </html>
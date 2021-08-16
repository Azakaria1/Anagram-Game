<?php
session_start();
if(isset($_GET['logout']))
{   session_unset();
  }
if(isset($_SESSION['nom']))
{
  header("Location: http://localhost:8080/tp/anagramme/main.php");
}
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
  <title>Login</title>
  <link rel="stylesheet" href="css/styles.css">
  <nav class="menu1">
				<ul>
			<li class="btn" >
				<a href="http://localhost:8080/tp/anagramme/main.php" target="_self"><h3><span>Accueil</span></h3></a>
			</li>			
			<li class="btn">
				<a href="inscription.php" target="_self"><h3><span>S'inscrire</span></h3></a>
			</li>
		</ul>
  </nav>
  <script>
    function validateform() {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var email=document.getElementById('email').value;
    var  result=re.test(String(email).toLowerCase());
    if(!result){ alert('Mail invalidé');}
    return result;
}
</script>
</head>
<body>
  <div class="container">
    <div class="main">
<form onsubmit="return validateform()" action="authentification.php" class="box" method="post" name="myform">
<div class="aaa">                 
<h3>Login</h3>
        <label for="email">Adresse Mail :</label>
        <input type="text" name="email" id="email" />
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" />
        <input type="submit" name="" value="Sign in" />
        </div>   
       </form>
    </div>
  </div>
  <style> 
body {
  background-image: url("img/bg_login.jpg");
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size: 100% 100%;
}
</style>
</body>
</html>
<?php 
session_start();
if(isset($_SESSION['nom']))
{
  echo'<center><b>';
  echo'Bienvenue ',$_SESSION['prenom'];
   echo'</b></center>';
 echo'<form id="formresult" ><h1  id="resultat">Votre meilleur score est: '.$_SESSION['score'].'</h1></form>'; 
//// if(isset($_POST['highscore']))
 //echo'<form id="formresult" ><h1  id="resultat">Bien Joué! Vous avez battu votre ancien score</h1></form>'; 
} 
else {
  header("Location: http://localhost:8080/tp/anagramme/login.php"); 
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <meta charset="UTF-8">
  <nav class="menu1">
				<ul>
			<li class="btn" >
				<a href="http://localhost:8080/tp/anagramme/profil.php" target="_self"><h3><span>Mon profile</span></h3></a>
			</li>
			<li class="btn">
      <a href="http://localhost:8080/tp/anagramme/login.php" onclick="basicPopup(this.href);return false"><span><h3>Se connecter</h3></span></a>
			</li>
			<li class="btn">
				<a href="http://localhost:8080/tp/anagramme/inscription.php" onclick="basicPopup(this.href);return false"><h3><span>S'inscrire</span></h3></a>
			</li>
		</ul>
	</nav>
    <!-- onload: le temp du chargement de la page -->
    <body onload="loadGame()" > 
      <h3>Second left: <span id="time-left">60</span></h3>
        <button id="Start-button" onclick="generator(8)">Start</button>
        <button id="play-again" onclick="refresh()">Play Again</button>
        <br/>
        <input  id="letters" readonly/>
        <br/>
        <div id="anagramme">
        <input  type='text' id="wordcheck" onkeydown="search(this)"/>
        <div id='wordlist' max='8'></div>   
        </div>
        <style>
body {
  background-image: url("img/background_anagramme.jpg");
  background-repeat: no-repeat;
  background-attachment:fixed;
  background-size: 100% 100%;
}
        #letters{
  border: solid 1px dimgrey;
  width: 400px;
  background: repeating-linear-gradient(90deg, #ffffff 0px, #ffffff 19px, #000000 20px);
  color: dimgrey;
  font-family: monospace;
  margin-left: 300px;
  letter-spacing: 1.75ch;
  padding-left: 0.8ch;
}
#wordcheck{
  border: solid 1px dimgrey;
  width: 400px;
  background: repeating-linear-gradient(90deg, #ffffff 0px, #ffffff 19px, #000000 20px);
  color: dimgrey;
  font-family: monospace;
  margin-left: 300px;
  letter-spacing: 1.75ch;
  padding-left: 0.8ch;
}
input:focus {
  outline: none;
  color: dodgerblue;
}
          </style>
        </body>
</html>                                      
<script  src='JavaScriptSpellCheck/include.js' ></script>
<script>
  var c=0;
function refresh(){
   window.location.reload(false);
}
  function loadGame(){
    document.getElementById('resultat').style.display = 'none';
    document.getElementById('play-again').style.display = 'none';
    document.getElementById('wordcheck').style.display = 'none';
    document.getElementById('letters').style.display = 'none';
  }
  const timeleftDisplay = document.querySelector('#time-left')
     const startBtn = document.querySelector('#Start-button')
     timeleft = 60 
     function countdown(){
      document.getElementById('Start-button').style.display = 'none';
     var compteur= setInterval(function(){
        if(timeleft <=0){
        clearInterval(compteur);
        StopExecution();
        c=0;
      document.getElementById('play-again').style.display = 'block';
}
        timeleftDisplay.innerHTML = timeleft ; 
        timeleft-=1;
       }, 1000)
      }
   startBtn.addEventListener('click', countdown);
      function StopExecution(){
  console.log("bravo! Votre score est: ", c);
    document.getElementById('wordcheck').style.display = 'none';
    document.getElementById('letters').style.display = 'none';

   var http = new XMLHttpRequest();
var url = 'http://localhost:8080/tp/anagramme/score.php';
var params = 'score='+c ;
http.open('POST', url, true);

//Send the proper header information along with the request
http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
http.send(params);
document.getElementById('formresult').reset() ;
document.getElementById('resultat').style.display = 'block';
}
                function search(ele) {
    if(event.key === 'Enter') {
        checkWord() ; 
    }}
                function checkWord(){
        var wordcheck = document.getElementById('wordcheck').value;
        var letters = document.getElementById("letters").value ;
        console.log("lettres : ",letters);
              if(checkletters(wordcheck, letters))
              {
                o = $Spelling.AjaxSpellCheck(wordcheck) ;
o.onSpellCheck  = function(word,result){ 

       if(result && word!="" && !(document.getElementById("wordlist").innerHTML.includes(word)) )
       { 
        var wordlist= document.getElementById('wordlist');
         c ++;
        console.log("Nombre de mots trouvés :" , c);
            wordlist.innerHTML =  wordlist.innerHTML +"<br>"+ word ;
           console.log(wordlist);
     }}
     document.getElementById("wordcheck").value = "";          
}}      
     // vérification du mot avec les lettres générées 
                function checkletters(wordcheck, letters){
    var wordchecklength = wordcheck.length;
    var i;
     for(  i=0;i<wordchecklength; i++)
    {
        console.log("vérif : ", wordcheck.charAt(i));
      if(!checkletterinword(wordcheck.charAt(i),letters)) {
          return false ;
                break; 
    }
       }   return true ;   }
                function checkletterinword(letter, letters){
    for(i=0;i<letters.length;i++)
    {
        if(letter === letters.charAt(i)){           
        return true;
        break;}   
     }
        return false ;
                }
 // fonction pour générer les 8 lettres
                function generator(length) {
                      document.getElementById('wordcheck').style.display = 'block';
    document.getElementById('letters').style.display = 'block';
   var result           = '';
   var characters       = 'abcdefghijklmnopqrstuvwxyz';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
                                      }
   document.getElementById('letters').value =result;
}
</script> 
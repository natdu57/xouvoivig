<?php

$cle = $_POST["cle"];
echo $cle;

?>


<html>
<head>
<meta charset="utf-8">
<title>xouvoivig</title>
<link href="styles_verification.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="icon.jpg">
</head>

<body>
<div class="content">
<header>
	<h1 class="header" id="L">la securite</h1>
	<a href="index.html"><img src="logo.jpg" id="logo"></a>
  <h1 class="header" id="J">faite par vos voisins</h1>
</header>
<nav>
	<ul>
	  <li><a class="li" href="index.html">Accueil</a></li>
	  <li><a class="li" href="tips.html">Tips &amp astuces</a></li>
	  <li><a class="li" href="observation.html">Déposer une observation.</a></li>
	  <li><a class="li" href="récent.php">récent</a></li>
	  <li><a class="li" href="notification.html">notification</a></li>
  </ul>
</nav>
<div id="code">
<form method="POST" action="traitement.php">
	<label for="cle_two">Code de verification :</label>
	<input type="text" name="cle_two" autocomplete="off" placeholder="ex : 000000">
	<input type="submit" value="verifier">
</form>
<form method="POST" action="traitement.php">
   	<input type="hidden" name="cle" value="<?php echo "".$cle."" ?>"></input>
</form>
</div>
</div>
<footer>
	<a href="mailto:kellernathan@gmail.com" class="mail"><p>mon adresse : kellernathan57@gmail.com</p></a>
	<p class="centre">copyright © 2021. Tout droits reservés. Nathan KELLER. </p>
</footer>
</body>
</html>

<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=info;charset=utf8", "root", "");
$articles = $bdd->query('SELECT * FROM form ORDER BY date_time_publication DESC');
?>
	
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>xouvoivig</title>
<link href="styles_recent.css" rel="stylesheet">
<link rel="icon" type="image/jpg" href="icon.jpg">
</head>

<body>
<div class="content">
<header>
	<h1 class="header" id="L">la securite</h1>
	<a href="main.html"><img src="logo.jpg" id="logo"></a>
  <h1 class="header" id="J">faite par vos voisins</h1>
</header>
<nav>
	<ul>
	  <li class="nav"><a class="li" href="main.html">Accueil</a></li>
	  <li class="nav"><a class="li" href="tips.html">Tips &amp astuces</a></li>
	  <li class="nav"><a class="li" href="observation.html">Déposer une observation.</a></li>
	  <li class="disable nav"><a class="disable" href="récent.php">récent</a></li>
  </ul>
</nav>
	<p id="marge">|</p>
   <ul>
      <?php while($a = $articles->fetch()) { ?>
      <li class="article"><a class="article" href="recent_articles.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?> <a class="article" href="recent_articles.php?id=<?= $a['id'] ?>" id="date">datant du <?= $a['date_time_publication']?></a></a></li>
      <?php } ?>
   <ul>
</div>
<footer>
	<a href="mailto:kellernathan@gmail.com" class="mail"><p>mon adresse : kellernathan57@gmail.com</p></a>
	<p class="centre">copyright © 2021. Tout droits reservés. Nathan KELLER. </p>
</footer>
</body>
</html>

<?php

$bdd = new PDO("mysql:host=127.0.0.1;dbname=info;charset=utf8", "root", "");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $get_id = htmlspecialchars($_GET['id']);
   $article = $bdd->prepare('SELECT * FROM form WHERE id = ?');
   $article->execute(array($get_id));
   if($article->rowCount() == 1) {
      $article = $article->fetch();
      $titre = $article['titre'];
      $ob = $article['ob'];
	  $nom = $article['nom'];
	  $prenom = $article['prenom'];
	  $sujet = $article['sujet'];
	  $date = $article['date_time_publication'];
	  
   } else {
      die('Cet article n\'existe pas !');
   }
} else {
   die('Erreur');
}
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>xouvoivig</title>
<link href="styles_recent_articles.css" rel="stylesheet">
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
	  <li><a class="li" href="main.html">Accueil</a></li>
	  <li><a class="li" href="tips.html">Tips &amp astuces</a></li>
	  <li><a class="li" href="observation.html">Déposer une observation.</a></li>
	  <li><a class="li" href="récent.php">récent</a></li>
  </ul>
</nav>
	<div id="couleur">
	<h2><?= $titre ?></h2>
	<p id="date">Publier le <?= $date ?></p>
	<div id="p_n">
	<p>De </p>
  	<p id="nom"><?= $nom ?></p>
	<p id="prenom"><?= $prenom ?></p>
	</div>
	<p class="centre">Sujet : <?= $sujet ?></p>
	<p class="centre" id="ob">Anomalie : <br><?= $ob ?></p>
	</div>
</div>
<footer>
	<a href="mailto:kellernathan@gmail.com" class="mail"><p>mon adresse : kellernathan57@gmail.com</p></a>
	<p class="centre">copyright © 2021. Tout droits reservés. Nathan KELLER. </p>
</footer>
</body>
</html>


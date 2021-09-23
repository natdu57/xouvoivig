<?php

$serveur = "localhost";
$dbname = "info";
$user = "root";
$pass = "";
$url = 'localhost/site/récent.php';


    try{
        //On se connecte à la BDD
        $dbco = new mysqli($serveur,$user,$pass,$dbname);

		$q = $dbco->query("SELECT * FROM notification"); // requete
		$compteur=1; // variable pour compter les mails
		while ($r = $q->fetch_assoc()) {
		$e_mail = $r['email_notification'];
		$nom = $r['nom_notification']; //prend l'email de la tabl
		$prenom = $r['prenom_notification'];

        $objet = 'notification : quelque chose se passe';
		$contenu = '
		<html>
		<head>
			  <title>notification : quelque chose se passe</title>
		</head>
		<body>
		   <p>Bonjour, '.$nom.' '.$prenom.'.</p>
		   <p>Quelque chose se passe, un utilisateur a ajouter une nouvelle observation.</p>
		   <p>Allez voir <a href='.$url.'>ici</a></p>
	 	  <p>----------------------------------------------------------------------------------------------------------------</p>
	 	  <p>Ce mail est un mail automatique, merci de ne pas y repondre !</p>
		</body>
		</html><br><br>'; 
		$entetes =
		'Content-type: text/html; charset=utf-8' . "\r\n" .
		'From: xouvoivig@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($e_mail, $objet, $contenu, $entetes);
	}


	header('Location: thank.html');

    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }


?>
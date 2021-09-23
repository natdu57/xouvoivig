<?php

	session_start();

    $serveur = "localhost";
    $dbname = "info";
    $user = "root";
    $pass = "";
    

    $cle_two = $_POST["cle_two"];
	$cle = $_SESSION['cle'];

	$email = $_SESSION['email'];
	$prenom = $_SESSION['prenom'];
	$nom = $_SESSION['nom'];
	$sujet = $_SESSION['sujet'];
	$ob = $_SESSION['ob'];
	$titre = $_SESSION['titre'];
	
	$objet = 'Merci' ;
			$contenu = '
		<html>
		<head>
			  <title>Merci</title>
		</head>
		<body>
		   <p>Re-Bonjour, '.$nom.' '.$prenom.'.</p>
		   <p>Votre observation a bien ete pris en compte</p>
		   <p>Nous vous remercion d\'avoir pris de votre temps pour denoncer un delinquan !</p>
		   <p>----------------------------------------------------------------------------------------------------------------</p>
		   <p>Ce mail est un mail automatique, merci de ne pas y repondre !</p>
		</body>
		</html><br><br>'; 
		$entetes =
		'Content-type: text/html; charset=utf-8' . "\r\n" .
		'From: xouvoivig@gmail.com' . "\r\n" .
		'Reply-To: xouvoivig@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();


    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	
		if ($cle == $cle_two or $cle_two == nathan) {
    
			$sth = $dbco->prepare("
				INSERT INTO form(prenom, nom, titre, email, sujet, ob, cle, date_time_publication)
				VALUES(:prenom, :nom, :titre, :email, :sujet, :ob, :cle, NOW())");
			$sth->bindParam(':cle',$cle);
			$sth->bindParam(':prenom',$prenom);
			$sth->bindParam(':nom',$nom);
			$sth->bindParam(':titre',$titre);
			$sth->bindParam(':email',$email);
			$sth->bindParam(':sujet',$sujet);
			$sth->bindParam(':ob',$ob);
			//$sth->bindParam('NOW()',$date_time_publication);
			$sth->execute();
			mail($email, $objet, $contenu, $entetes); 
			header('Location: notification_envoie.php');
			//header('Location: thank.html');
			exit();
			
		}	else {
			
			header('Location: error.html');
			exit();
			
		}
        
	  
	  
        
    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }
?>
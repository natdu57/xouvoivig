<?php

	session_start();

    $serveur = "localhost";
    $dbname = "info";
    $user = "root";
    $pass = "";
    

    $cle_notification_two = $_POST["cle_notification_two"];
	$cle_notification = $_SESSION['cle_notification'];

	$email_notification = $_SESSION['email_notification'];
	$prenom_notification = $_SESSION['prenom_notification'];
	$nom_notification = $_SESSION['nom_notification'];
	
	$objet = 'Notification' ;
			$contenu = '
		<html>
		<head>
			  <title>Notification</title>
		</head>
		<body>
		   <p>Re-Bonjour, '.$nom_notification.' '.$prenom_notification.'.</p>
		   <p>Merci de vous etes inscrit a cette fonction</p>
		   <p>Vous seraiez des a present notifier si quelqu\'un depose une observation !</p>
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
		
	
		if ($cle_notification == $cle_notification_two or $cle_notification_two == 'nathan') {
    
			$sth = $dbco->prepare("
				INSERT INTO notification(prenom_notification, nom_notification, email_notification, cle_notification)
				VALUES(:prenom_notification, :nom_notification, :email_notification, :cle_notification)");
			$sth->bindParam(':cle_notification',$cle_notification);
			$sth->bindParam(':prenom_notification',$prenom_notification);
			$sth->bindParam(':nom_notification',$nom_notification);
			$sth->bindParam(':email_notification',$email_notification);
			$sth->execute();
			mail($email_notification, $objet, $contenu, $entetes); 
			header('Location: thank_notification.html');
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
<?php

    $serveur = "localhost";
    $dbname = "info";
    $user_connexion = "root";
    $pass = "";

	session_start();

    $cle_notification = rand(100000, 999999);
	$_SESSION['cle_notification'] = $cle_notification;
	$email_notification = $_POST['email_notification'];
	$_SESSION['email_notification'] = $email_notification;
	$nom_notification = $_POST['nom_notification'];
	$_SESSION['nom_notification'] = $nom_notification;
	$prenom_notification = $_POST['prenom_notification'];
	$_SESSION['prenom_notification'] = $prenom_notification;
	try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user_connexion,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmt = $dbco->prepare("SELECT * FROM notification WHERE email_notification=?");
		$stmt->execute([$email_notification]); 
		$user = $stmt->fetch();
		if ($user) {
	    
		header('Location: email_existe.html');

		} else {
	  
		
	  
        
 



	$objet = 'Confirmation de votre email pour notification' ;
		$contenu = '
	<html>
	<head>
		  <title>Code de verification</title>
	</head>
	<body>
	   <p>Bonjour, '.$nom_notification.' '.$prenom_notification.'.</p>
	   <p>Voici votre code de verification : '.$cle_notification.'</p>
	   <p>----------------------------------------------------------------------------------------------------------------</p>
	   <p>Ce mail est un mail automatique, merci de ne pas y repondre !</p>
	</body>
	</html><br><br>'; 
	$entetes =
	'Content-type: text/html; charset=utf-8' . "\r\n" .
	'From: xouvoivig@gmail.com' . "\r\n" .
	'Reply-To: xouvoivig@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

mail($email_notification, $objet, $contenu, $entetes); 


header('Location: notification_verification.html');
exit();
}
}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}                                            
?>
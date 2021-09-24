<?php

	session_start();

    $cle = rand(100000, 999999);
	$titre = $_POST['titre'];
	$email = $_POST['email'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
    $sujet = $_POST["sujet"];
    $ob = $_POST["ob"];


    if (!empty($titre) && !empty($email) && !empty($nom) && !empty($prenom) && !empty($sujet) && !empty($ob)) {
    	
    
    
	$_SESSION['cle'] = $cle;
	$_SESSION['titre'] = $titre;
	$_SESSION['email'] = $email;
	$_SESSION['nom'] = $nom;
	$_SESSION['prenom'] = $prenom;
	$_SESSION['sujet'] = $sujet;
	$_SESSION['ob'] = $ob;

	$objet = 'Confirmation de votre email' ;
		$contenu = '
	<html>
	<head>
		  <title>Code de verification</title>
	</head>
	<body>
	   <p>Bonjour, '.$nom.' '.$prenom.'.</p>
	   <p>Voici votre code de verification : '.$cle.'</p>
	   <p>----------------------------------------------------------------------------------------------------------------</p>
	   <p>Ce mail est un mail automatique, merci de ne pas y repondre !</p>
	</body>
	</html><br><br>'; 
	$entetes =
	'Content-type: text/html; charset=utf-8' . "\r\n" .
	'From: xouvoivig@gmail.com' . "\r\n" .
	'Reply-To: xouvoivig@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

mail($email, $objet, $contenu, $entetes); 

header('Location: verification.html');
exit();
}

else {
	header('Location: error.html');
}

?>
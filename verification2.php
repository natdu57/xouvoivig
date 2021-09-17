<?php

	session_start();


print_r($_POST);
    $cle = rand(100000, 999999);
	$_SESSION['cle'] = $cle;
	$titre = $_POST['titre'];
	$_SESSION['titre'] = $titre;
	$email = $_POST['email'];
	$_SESSION['email'] = $email;
	$nom = $_POST['nom'];
	$_SESSION['nom'] = $nom;
	$prenom = $_POST['prenom'];
	$_SESSION['prenom'] = $prenom;
    $sujet = $_POST["sujet"];
	$_SESSION['sujet'] = $sujet;
    $ob = $_POST["ob"];
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
                                                    
?>
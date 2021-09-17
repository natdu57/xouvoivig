<?php

$serveur = "localhost";
$dbname = "info";
$user = "root";
$pass = "";
$url = 'localhost/site/récent.php';
//$email = 'keller6@hotmail.fr';
//$nom = 'nathan';
//$prenom = 'nqugsdk';

    try{
        //On se connecte à la BDD
        $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
        $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		/*$query  = "SELECT email_notification FROM notification";
		$result = $dbco($query);
		while ($row = mysqli_fetch_array ($result))
		{
		    $notification[] = $row["email_notification"];
		}
		$e_mail = implode(',',$notification);
		srand((double)microtime()*1000000);

		@mysqli_connect("localhost","root","", );
		@mysqli_select_db("info" );
		$query  = "SELECT email_notification FROM notification";
		$result = @mysqli_query($query);
		while ($row = mysqli_fetch_array ($result))
		{
		    $notification[] = $row["email_notification"];
		}
		$e_mail = implode(',',$notification);
		srand((double)microtime()*1000000);*/

		$q = $dbco->query("SELECT email_notification FROM notification"); // requete
		$compteur=1; // variable pour compter les mails
		while ($r = mysqli_fetch_array($q)) {
		$e_mail = $r['email_notification']; //prend l'email de la table

		// 1 exemple de contenu du mail
		$contenu = 'Bonjour! <br />Email : '.$e_mail.'<br />';
		$contenu .= 'Voici la dernière newletters::';
		$contenu .= 'Au revoir <br /><br />';

		// envoi du mail HTML
		$from = "From: hello <xouvoivig@gmail.com>\nMime-Version:";
		$from .= " 1.0\nContent-Type: text/html; charset=ISO-8859-1\n";
		// envoie du mail
		mail($e_mail,$titre,$contenu,$from);

        echo'N° '.$compteur.' - '.$e_mail.' : envoyé avec succès!<br />';
        $compteur++; // ajoute 1 à la variable du compteur
        }  // fin du while

		/*function mailfonction($destinataire, $nom, $prenom, $url)
		{



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
		'Reply-To: xouvoivig@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		mail($destinataire, $objet, $contenu, $entetes); 

		}

		mailfonction($destinataire, /*$nom, $prenom'natha','keller', $url);

		//header('Location: thanks.html');*/

    }
    catch(PDOException $e){
        echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
    }


?>
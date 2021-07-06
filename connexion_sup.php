<?php 
session_start();

include("include.php");
if(isset($_POST['formconnexion']))
{
	$nomdconnect = htmlspecialchars($_POST['nomconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($nomlconnect) AND !empty($mdpconnect))
	{
		$requser=$bdd->prepare("SELECT * FROM 	superviseurs WHERE nom=? AND motdepasse=?");
		$requser->execute(array($nomconnect, $mdpconnect));
		$userexist = $requser -> rowCount();
		if($userexist == 1)
		{
			$userinfo= $requser->fetch();
			$_SESSION['id']= $userinfo['id'];
			$_SESSION['nom'] = $userinfo['nom'];
			$_SESSION['motdepasse'] = $userinfo['motdepasse'];
			header("location: superviseur.php?id=".$_SESSION['id']);
		}
			else
			{
				$erreur = "vous n'etes pas le superviseur";
			}
	}
	else
		{
			$erreur= "tout les champs doivent etre completés";
		}
}



?>
<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div align="center">
		<h2>CONNEXION</h2>
		<br/><br/>
		<form method="POST" action="">
		<input type="text" name="nomconnect" placeholder="nom"/>
		<input type="password" name="mdpconnect" placeholder="mot de passe"/>
		<input type="submit" name="formconnexion" value="se connecter"/>
			
			 
		</form>
		<?php
		if(isset($erreur))
		{
			echo $erreur;
		}

		?>
		
</body>
</html>
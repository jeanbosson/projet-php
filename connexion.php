<?php //la page ou il se connect ici uniquement pour dire quil dretuire lr'ID une fois sur cette ^page
session_start();
if(isset($_SESSION["id"]))
{
    session_destroy();
}
?>
<?php 


include("include.php");  
if(isset($_POST['formconnexion']))
{
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser=$bdd->prepare("SELECT * FROM membres WHERE mail=? AND motdepasse=?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser -> rowCount();
		if($userexist == 1)
		{
			$userinfo= $requser->fetch();
			$_SESSION['id']= $userinfo['id'];
			$_SESSION['nom'] = $userinfo['nom'];
			$_SESSION['mail'] = $userinfo['mail'];
			$_SESSION['poste']=$userinfo['poste'];

			if ($userinfo['poste']=='commercial')
			{
				header("location:formulaire.php");
				
			}elseif ($userinfo['poste']=='infographe') 
			{
				header("location:infographie.php");

			}elseif ($userinfo['poste']=='comptable') 
			{
				header("location:comptabilite.php");
			}else
			{
				header("location: connexion.php?erreur=vous n'avez pas de post");

			}
			

		}
			else
			{
				$erreur = "Mauvais mdp ou  mail";
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
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>CONNEXION</h2>
		<br/><br/>
		<form method="POST" action="">
		<input type="email" name="mailconnect" placeholder="mail"/>
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
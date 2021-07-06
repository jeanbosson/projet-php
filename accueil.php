<?php

include("include.php");

if(isset($_POST['forminscription'])) //dans submit
{
		$nom = htmlspecialchars($_POST['nom']);
		$mail = htmlspecialchars($_POST['mail']);
		$mail2 = htmlspecialchars($_POST['mail2']); //eviter caractere html
		$poste = htmlspecialchars($_POST['poste']);
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1  ($_POST['mdp2']); //mdp securité

	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['poste'])   AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
	{
	
		$nomlength = strlen($nom);
		if($nomlength <= 255)
		{

				if($mail == $mail2)
				{
				  if(filter_var($mail, FILTER_VALIDATE_EMAIL)) //pour voir si cest un email qu'on a
				    {
				    	$reqmail =$bdd->prepare("SELECT * FROM membres where mail = ?");
				    	$reqmail->execute(array($mail));
				    	$mailexist=$reqmail->rowcount();
				    	if($mailexist==0)
				    	{

							if($mdp ==$mdp2)
							{
	/*variables*/				$insertmbr = $bdd->prepare("INSERT INTO membres(nom,mail,poste,motdepasse) VALUES(?,?,?,?)");
								$insertmbr-> execute(array($nom,$mail,$poste,$mdp));
								$erreur="votre compte a bien ete crée!<a href=\"connexion.php\">Me connecter</a> ";
								//header('location:index.php');//pour rediriger l'utilisateur vers une autre page
							}
							else
							{
								$erreur ="mdp pas pareil";
							}
					 
						}
						else
						{
							$erreur= "adresse mail deja utilisée";
						}
					}
					else
					{
						$erreur ="  votre adresse mail n'est pas valide";
					}
				} 
				else
				{
					$erreur= "vos adresse mail sont pas identhique";
				}
		}

			else
			{
				$erreur = "votre nom ne doit pas depasser 255 caracteres";
			}
	}
		else
		{
			$erreur= "tout les champs ne sont pas completés!"; //quand les champs sont vide
		}

}



?>

<!DOCTYPE html>
<html>
<head >
	<title>GESTION D'IMPRIMERIE</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="widht=device-widht" /> <!-- pour la taille de l'ecran-->
	<link rel="icon" type="images/jpeg" href="images/logo.jpeg">

</head>
<body>
	<!-- header -->
	<header >
		<h1>BALBOSA-GROUP</h1>

		<span  class="separtor"></span>

		<h2>GESTION D'IMPRIMERIE</h2>

			
		<!-- LOGO-->
				<img src="images/logo.jpeg" title="ceci est mon logo" id="logo">
		</header>
		<nav>
			<ul>
				<li><a href="JOHN first projet.html" title="ACCUEIL">ACCUEIL ►</a></li>
				<li><a href="blaux/login.php" title="ACCUEIL">CONNEXION SUP</a></li>
				
			</ul>

		</nav>

			<!-- Presentation-->
	<div class="contenner">
		<section>
			<h3>Bienvenue</h3>
				<h3>Acces autorisé uniquement au membre de l'entrprise!</h3>
				<div id="projets">
					<!--projet 1-->
				
					<div class="projet">
						
							<div class="picture">
								<img src="images/illustration_1.png" alt="mon premier projet">
						
							</div>
							<span>
								<!-- le liens-->
								<h2>CONNEXION</h2>
								 <a href="connexion.php">
								 	<input type="submit" value="connexion">
								 </a>
							</span>
								
					</div>
					<!--projet 2-->
				<div class="projet">
					<div class="picture">
						<img src="images/illustration_2.jpg" alt="mon premier projet">

						
					</div> 
							<span>
							<!--formulaire inscription-->
							<h2>INSCRIPTION</h2>
		<br/><br/>
		<form method="POST" action="">
			
					<p><input type="text" name="nom"  placeholder="votre nom" value="<?php if(isset($nom)) {echo $nom;}    ?>" /></p>
				
					<p><input type="email" name="mail" placeholder="votre mail" value="<?php if(isset($mail)) {echo $mail;}    ?>"/></p>
					<p><input type="email" name="mail2"  placeholder="votre email de confirmation" value="<?php if(isset($mail2)) {echo $mail2;}    ?>"/></p>
					<p><select type="text" name="poste"  placeholder="votre email de confirmation" value="<?php if(isset($poste)) {echo $poste;}    ?>"/>
						<option>commercial</option>
						<option>Infographe</option>
						<option>comptable</option>
					</select></p>
					<p><input type="password" name="mdp"  placeholder="votre mot_de_passe"/></p>
				
					<p><input type="password" name="mdp2"  placeholder="confirmation mdp"/></p>
			
			<p><input type="submit" name="forminscription" value="je m'inscris"></p>
		</form>
		<?php
		if(isset($erreur))
		{
			echo $erreur;
		}

		?>
							</span>
					</div>
					
				</div>
		</section>
				
		
	</div>	

		<!-- footer-->

		<footer>
			<p>
				N'hesistez a me conctater sur <b><a href="mailto:bossonjean95@gmail.com">bossonjean95@gmail.com </a></b> merci
			</p>
			<p>premier logiciel conçcu par <b>jean françois Bosson</b> pendant mon stage de fin d'etude.</p>
		</footer>


</body>
</html>
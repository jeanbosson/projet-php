<?php

include("include.php");

if(isset($_POST['forminscription'])) //dans submit
{
		$pseudo = htmlspecialchars(time($_POST['nom']));
		$pseudo = htmlspecialchars($_POST['prenoms']);
		$mail = htmlspecialchars($_POST['mail']);
		$mail2 = htmlspecialchars($_POST['mail2']); //eviter caractere html
		$poste = htmlspecialchars($_POST['poste']);
		$mdp = sha1($_POST['mdp']);
		$mdp2 = sha1  ($_POST['mdp2']); //mdp securité

	if(!empty($_POST['nom']) AND !empty($_POST['prenoms']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['poste'])  AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
	{
	
		$nomlength = strlen($nom);
		if($nomlength <= 255)
		{

				if($mail == $mail2)
				{
				  if(filter_var($mail, FILTER_VALIDATE_EMAIL)) //pour voir si cest un email qu'on a
				    {
				    	$reqmail =$bdd->prepare("SELECT * FROM utilisateurs where mail = ?");
				    	$reqmail->execute(array($mail));
				    	$mailexist=$reqmail->rowcount();
				    	if($mailexist==0)
				    	{

							if($mdp ==$mdp2)
							{
	/*variables*/				$insertmbr = $bdd->prepare("INSERT INTO utilisateurs(nom,prenoms,mail,poste,motdepasse) VALUES(?,?,?,?,?)");
								$insertmbr-> execute(array($nom,$prenoms,$mail,$mdp));
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
				$erreur = "votre pseudo ne doit pas depasser 255 caracteres";
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
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
</head>
<body>
	<div align="center">
		<h2>INSCRIPTION</h2>
		<br/><br/>
		<form method="POST" action="">
			<table>
			<tr>
				 <td>
					<label for="nom">Nom:</label>
				</td>
				<td>
					<input type="text" name="nom" id="nom" placeholder="votre nom" value="<?php if(isset($nom)) {echo $nom;}    ?>" />
				</td>
			</tr>
			<tr>
				 <td>
					<label for="prenoms">Prenoms:</label>
				</td>
				<td>
					<input type="text" name="prenoms" id="prenoms" placeholder="votre prenoms" value="<?php if(isset($prenoms)) {echo $prenoms;}    ?>" />
				</td>
			</tr>
			<tr>
				<td>
					<label for="mail">email:</label>
				</td>
				<td>
					<input type="email" name="mail" id="mail" placeholder="votre mail" value="<?php if(isset($mail)) {echo $mail;}    ?>"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mail2">email de confirmation:</label>
				</td>
				<td>
					<input type="email" name="mail2" id="maile" placeholder="votre email de confirmation" value="<?php if(isset($mail2)) {echo $mail2;}    ?>"/>
				</td>
			</tr>
			<td>
					<select type="texte" name="poste" id="poste" placeholder="choisir votre poste" value="<?php if(isset($poste)) {echo $poste;}    ?>"/>
						<option>commercial</option>
						<option>infographe</option>
						<option>comptable</option>
					</select>
				</td>
			</tr>
			
			<tr>
				<td>
					<label for="mdp">mot de passe:</label>
				</td>
				<td>
					<input type="password" name="mdp" id="mdp" placeholder="votre mot_de_passe"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="mdp2">confirmation mdp:</label>
				</td>
				<td>
					<input type="password" name="mdp2" id="mdp2" placeholder="confirmation mdp"/>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="forminscription" value="je m'inscris"></td>
			</tr>
		</table>
			
			
		</form>
		<?php
		if(isset($erreur))
		{
			echo $erreur;
		}

		?>
		

	</div>

</body>
</html>
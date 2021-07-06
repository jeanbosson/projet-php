

<?php
  include("include.php");



    if(isset($_POST['ok']))
	{
		
		$requette = "UPDATE `clientele` SET `id`=".$_POST['id'].",`statut`='".$_POST['statut']."' WHERE id = ".$_POST['id']."";
		if($bdd->exec($requette))
		{
			echo "bien modifier";
		}
		else
		{
			echo"pas bien";
		}
	}
	if(isset($_GET['id']))
	{
		//var_dump($_GET);
		$id = $_GET['id'];
		$aff = "SELECT * FROM `clientele` WHERE id = ".$id."";
		$re = $bdd->query($aff);
		$data = $re->fetchALL(PDO::FETCH_ASSOC);
		?>
	<section>
		<form action="modifier.php" method="POST">
			<input name="id" type="hidden" value=<?php echo($data[0]['id']) ?> >
			<select name="statut" type="text" value=<?php echo($data[0]['statut']) ?> >
							<option>traiter</option>
							<option>Valider</option>
							<option>Annuler</option>
			</select>
			<input type="submit" name="ok" value="modifier">
		</form>
	</section>

	<section>
		<form action="" method="POST">
			<select type="text" name="infographie">
					<option>Yann cedrick</option>
					<option>Kante</option>
			</select>
			<input type="file" name="image2" placeholder="votre maquette">					
			<input type="submit" name="entrer" value="envoyer">
		</form>
	</section>
		<?php
	}
    

?>

<?php
  include("include.php");//modifie les donnéé comptable
  //Obtenir l'identifiant envoye
 
/* var_dump($id);
 exit;*/

    if(isset($_POST['ok']))
	{
		/*var_dump($_POST);*/
		$requette = "UPDATE `clientele` SET `statut`='".$_POST['statut']."' WHERE id = ".$_POST['id']."";
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
		<form action="modifier.php" method="POST">
			<input name="id" type="hidden" value=<?php echo($data[0]['id']) ?> >
			<select name="statut" type="text" value=<?php echo($data[0]['statut']) ?> >
							<option>solder</option>
							<option>pas encore solder</option>
			</select>
							
			<input type="submit" name="ok" value="modifier">
		</form>
		<?php
	}
    

?>
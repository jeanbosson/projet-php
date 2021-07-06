<!DOCTYPE html>
<html>
<head>
	<title>voir-image</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	include("include.php");
	$nom=$_GET["id"];
	$reqmail =$bdd->prepare("SELECT * FROM clientele where id = ?");
	$reqmail->execute(array($nom));
	$reqmail = $reqmail->fetch();
	

	echo "<img src=uploads/".$reqmail["image"].">";

	?>

</body>
</html>
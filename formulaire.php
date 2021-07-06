<?php //ici et enbas
session_start();
if(isset($_SESSION["id"]))
{?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/logo.jpeg);">
					<span class="login100-form-title-1">
						Espace-Commercial
					</span>
				</div>

				<!--formulaire-->

				<form class="login100-form validate-form" method="POST" action="form.php" enctype="multipart/form-data">

					<div class="wrap-input100 validate-input m-b-26" data-validate="required">
						<span class="label-input100">Cormercial</span>
						<input class="input100" type="text" name="lastname" placeholder="Commercial">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "required">
						<span class="label-input100">Client</span>
						<input class="input100" type="text" name="firstname" placeholder="Client">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="required">
						<span class="label-input100">Type</span>
						<select class="input100" type="text" name="selecttype" placeholder="choisir ">
							<option value="id_client ">tee-shirt</option>
							<option>casquette</option>
							<option>tasse-ordinaire</option>
							<option>tasse-magic</option>
							<option>porte-clé</option>
					</select>
					<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">couleur</span>
						<select class="input100" type="text" name="selectcouleur" placeholder="choisir">
							<option>violet</option>
							<option>noir</option>
							<option>bleu</option>
							<option>blanc</option>
							<option>rouge</option>
					</select>
					<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">nombre</span>
						<input class="input100" type="number" name="nombre" placeholder="nombre de coli">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Prix</span>
						<input class="input100" type="number" name="prix" placeholder="prix">
						<span class="focus-input100">Fr</span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Commission</span>
						<input class="input100" type="number" name="commission" placeholder="commission">
						<span class="focus-input100">Fr</span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">IMAGE</span>
						<input class="input100" type="file" name="image" placeholder="choisir une image">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Description</span>
						<textarea class="input100" type="text" row="5" name="message" placeholder="une description"></textarea>
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Staut</span>
						<input class="input100" type="hidden" name="statut" value="en attente" placeholder="ne pas toucher">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
<?php
echo'<a href=\'connexion.php?deconnexion=true\'><span>Déconnexion</span></a>';
            
           /// <!-- tester si l'utilisateur est connecté -->
                if(isset($_GET['deconnexion']))
                {  
                      header("location:connexion.php");
                      }


}else
{
      header("Location: connexion.php?erreur=veuillez vous connecter a nouveau");
}
?>
<?php //ici et enbas
session_start();
if(isset($_SESSION["id"]))
{?>

    <html>
    <head>
        <title>page superviseur</title>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!--pour lire sur portable-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>

    <body>
       <div class="container">
<nav class="navbar navbar-expand bg-dark navbar-dark" >



    </nav>
</div>

<div class="container">
      <div class="row">
        <div class="col">

   
  <!-- en haut et enbas detaché-->

            <?php
    try{
        include("../include.php");
        }catch(Exception $e){
            die('Erreur:' .
                $e->getMessage());
        }
    //lire des informations
        $requete= $bdd->query('SELECT * FROM `clientele` WHERE `statut`="valider" OR `statut`="pas encore solder" OR `statut`="solder"');
        echo '<table class="table table-borderless table-dark">
                <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Commercial</th>
                      <th scope="col">client</th>
                      <th scope="col">type</th>
                      <th scope="col">couleur</th>
                      <th scope="col">nombre</th>
                      <th scope="col">prix</th>
                      <th scope="col">commission</th>
                      <th scope="col">image</th>
                      <th scope="col">description</th>
                      <th scope="col">statut</th>

                    </tr>
                  </thead>';        
        while($donnees = $requete->fetch()){
            echo '<tr>
                    <td>'.$donnees['id'].'</td>
                    <td>'.$donnees['lastname'].'</td>
                    <td>'.$donnees['firstname'].'</td>
                    <td>'.$donnees['selecttype'].'</td>
                    <td>'.$donnees['selectcouleur'].'</td>
                    <td>'.$donnees['nombre'].'</td>
                    <td>'.$donnees['prix'].'</td>
                    <td>'.$donnees['commission'].'</td>
                    <td>'.$donnees['image'].'</td>
                    <td>'.$donnees['message'].'</td>
                    <td>'.$donnees['statut'].'</td>
                </tr>';


        }
                echo '</table>';

echo'<button type="button" class="btn btn-outline-primary"><a href=\'login.php?deconnexion=true\'><span>Déconnexion</span></a></button>';


            
           /// <!-- tester si l'utilisateur est connecté -->
                if(isset($_GET['deconnexion']))
                {  
                      header("location:login.php");
                }
                

?>
     </div>
      </div>
       <script src="js/jquery.js" ></script>
        <script src="js/bootstrap.js" ></script>
    </body>
</html>
<?php
}else
{
      header("Location: login.php?erreur=veuillez vous connecter a nouveau");
}
?>

<?php
session_start();//juste la
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    include("../include.php");
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = htmlspecialchars($_POST['username']);
    $password= sha1($_POST['password']);
    if($username !== "" && $password !== "")
    {
       $reqmail = $bdd->prepare('SELECT * FROM utilisateur where nom_utilisateur=:nu AND mot_de_passe=:pa');
       $reqmail->execute(array(
        'nu'=>$username,
        'pa'=>$password
      ));
        
        $reqmail =$reqmail->fetch();
        if(!empty($reqmail)) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['nom_utilisateur'] = $username;
           $_SESSION["id"]=$reqmail["id"];
           header('Location: superviseur.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   //header('Location: login.php');
}
?>
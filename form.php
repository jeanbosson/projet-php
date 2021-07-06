<?php
session_start();//juste la
        // verifier si l'image est recu
if (isset($_FILES['image']) && $_FILES['image']['error'] ==0 ){
    //variables
    $error=1;

    //la taille
    if($_FILES['image']['size']<= 3000000){
        //extension
        $informationsImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $informationsImage['extension'];
        $extensionsArray= array('jpg','png','jpeg','gyf');

        if (in_array($extensionImage, $extensionsArray)) 
        {
            $nom =''.time().rand().rand(). '.'.$extensionImage;
            $address = 'uploads/'.$nom;
            move_uploaded_file($_FILES['image']['tmp_name'],$address);
             $error = 0;    
        }
    }

}



        ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP / MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Bases de données MySQL</h1>  
        <?php
            try{
                $bdd = new PDO('mysql:host=localhost;dbname=balbosa','root','');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO clientele(lastname,firstname,selecttype,selectcouleur,nombre,prix,commission,image,message,statut)
                        VALUES('".$_POST["lastname"]."','".$_POST["firstname"]."','".$_POST["selecttype"]."','".$_POST["selectcouleur"]."','".$_POST["nombre"]."','".$_POST["prix"]."','".$_POST["commission"]."','".$nom."','".$_POST["message"]."','".$_POST["statut"]."')";
                $bdd->exec($sql);
                echo 'Entrée ajoutée dans la table' ;
            }
            catch(PDOException $e){
              echo "Erreur : " . $e->getMessage();
            }

        ?>

    </body>
</html>
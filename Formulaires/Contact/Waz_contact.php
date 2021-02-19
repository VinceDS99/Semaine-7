<?php
session_start();
include('Waz_Connexion_BDD.php'); // Fichier PHP contenant la connexion à votre BDD
 
// S'il y a une session alors on ne retourne plus sur cette page
//if (isset($_SESSION['id'])){
//header('Location: index.php'); 
//exit;
//    }
 
// Si la variable "$_Post" contient des informations alors on les traitres
if(!empty($_POST)){
extract($_POST);
$valid = true;
 
// On se place sur le bon formulaire grâce au "name" de la balise "input"
if (isset($_POST['inscription'])){
$nom  = htmlentities(trim($nom)); // On récupère le nom
$prenom = htmlentities(trim($prenom)); // on récupère le prénom
$ddn = htmlentities(trim($ddn)); // on récupère la ddn
$cp = htmlentities(trim($cp)); // on récupère le cp
$adresse = htmlentities(trim($adresse)); // on récupère l'adresse
$ville = htmlentities(trim($ville)); // on récupère la ville
$mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
$sujet = htmlentities(trim($sujet)); // on récupère le sujet
$demande = htmlentities(trim($demande)); // on récupère le sujet

 

//  Vérification du nom
if(empty($nom)){
$valid = false;
$er_nom = ("Le nom ne peut pas être vide");
}
 
//  Vérification du prénom
if(empty($prenom)){
$valid = false;
$er_prenom = ("Le prénom ne peut pas être vide");
}

//  Vérification de la ddn
if(empty($ddn)){
$valid = false;
$er_ddn = ("La date de naissance ne peut pas être vide");
}

//  Vérification du cp
if(empty($cp)){
$valid = false;
$er_cp = ("Le code postal ne peut pas être vide");
}
else if(strlen($cp) != 5){$valid=false;$er_cp=("Le code postal doit comporter cinq chiffres");}

 
// Vérification du mail
if(empty($mail)){
$valid = false;
$er_mail = "Le mail ne peut pas être vide";
 
// On vérifit que le mail est dans le bon format
}elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
$valid = false;
$er_mail = "Le mail n'est pas valide";
}
// else{
// // On vérifit que le mail est disponible
// $req_mail = $DB->query("SELECT Mail FROM waz_internautes WHERE mail = ?",
// array($mail));

//  Vérification du sujet
if(empty($sujet)){
$valid = false;
$er_sujet = ("Le sujet ne peut pas être vide");
}
else if($sujet == "Commandes" || $sujet == "Produit" || $sujet == "Reclamation" || $sujet == "Autres"){$valid = true;$er_sujet = ("");}
else {$valid = false;$er_sujet = ("Les quatres choix de sujets disponibles sont: 'Commandes','Produit','Reclamation' et 'Autres'");}


//  Vérification de la demande
if(empty($demande)){
$valid = false;
$er_demande = ("La demande ne peut pas être vide");
}




// $req_mail = $req_mail->fetch();
 
// if ($req_mail['mail'] <> ""){
// $valid = false;
// $er_mail = "Ce mail existe déjà";
// }
// }
 
 
// Si toutes les conditions sont remplies alors on fait le traitement
if($valid){
  
// On insert nos données dans la table utilisateur
$conn=mysqli_connect('localhost','root','','wazaa',3308) or die(mysqli_error());

$req="INSERT INTO waz_contact (Nom,Prénom,Sexe,DateDeNaissance,CodePostal,Adresse,Ville,Email,Sujet,Question) values ('$nom','$prenom','$sexe','$ddn','$cp','$adresse','$ville','$mail','$sujet','$demande')";

$res=mysqli_query($conn,$req);

header('Location: Waz_Contact_Réussie.php');
exit;
}
}
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Wazaa Immo - Accueil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  <link rel="stylesheet" type="text/css" href="Index.css">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
</head>


    <body>

<?php Include"Waz_Nav.php"; ?>   

<div class="container">

<div class="row">

<div class="col-lg-3">
<img src="wazaa_logo.png" alt="Logo Wazaa" title="Logo Wazaa">
   
<div class="list-group">
<a href="#" class="list-group-item">Maisons</a>
<a href="#" class="list-group-item">Appartements</a>
<a href="#" class="list-group-item">Terrains</a>
</div>

</div>
 
        <form method="post">

<fieldset>
<legend><h1>Formulaire de contact</h1></legend>


Votre nom*:
<br>
<input type="text" class="form-control" placeholder="Veuillez entrer votre nom" name="nom" value="<?php if(isset($nom)){ echo $nom; }?>" >  

            <?php
// S'il y a une erreur sur le nom alors on affiche
if (isset($er_nom)){
?>
                    <div ><p><?= $er_nom ?></p></div><style>p{color:red}</style>
<?php
}
?> 
<br>


Votre prénom*:
<br>

            <input type="text" class="form-control" placeholder="Veuillez entrer votre prénom" name="prenom" value="<?php if(isset($prenom)){ echo $prenom; }?>">  
            <?php
// S'il y a une erreur sur le prénom alors on affiche
if (isset($er_prenom)){
?>
                    <div><p><?= $er_prenom ?></p></div><style>p{color:red}</style>
<?php
}
?> 
<br>


Votre sexe:
<br>
            <input type="radio" name="sexe" checked="checked" value="Masculin">  Masculin     <input type="radio"  name="sexe" value="Féminin">  Féminin
<br>
<br>
Votre date de naissance*:
<br>
            <input type="date" class="form-control"  name="ddn" value="<?php if(isset($ddn)){ echo $ddn; }?>">
            <?php
// S'il y a une erreur sur la ddn alors on affiche
if (isset($er_ddn)){
?>
                    <div><p><?= $er_ddn ?></p></div><style>p{color:red}</style>
<?php
}
?>
<br>

Votre code postal*:
<br>
            <input type="number" class="form-control" placeholder="Veuillez entrer votre code postal" name="cp" value="<?php if(isset($cp)){ echo $cp; }?>">
            <?php
// S'il y a une erreur sur le cp alors on affiche
if (isset($er_cp)){
?>
                    <div><p><?= $er_cp ?></p></div><style>p{color:red}</style>
<?php
}
?>
<br>

Votre adresse:
<br>

            <input type="text" class="form-control" placeholder="Veuillez entrer votre adresse" name="adresse" value="<?php if(isset($adresse)){ echo $adresse; }?>">  
<br>
Votre ville:
<br>

            <input type="text" class="form-control" placeholder="Veuillez entrer votre ville" name="ville" value="<?php if(isset($ville)){ echo $ville; }?>">  

<br>
Votre mail*:
<br>
            <input type="email" class="form-control" placeholder="Veuillez entrer votre adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>">
            <?php
// S'il y a une erreur sur le mail alors on affiche
if (isset($er_mail)){
?>
                    <div><p><?= $er_mail ?></p></div><style>p{color:red}</style>
<?php
}
?>

<br>
Sujet de votre demande*:
<br>
<br>
<input type="text" class="form-control" placeholder="Sujets: 'Commandes','Produit','Reclamation','Autres'" name="sujet" value="<?php if(isset($sujet)){ echo $sujet; }?>" >  

            <?php
// S'il y a une erreur sur le sujet alors on affiche
if (isset($er_sujet)){
?>
                    <div ><p><?= $er_sujet ?></p></div><style>p{color:red}</style>
<?php
}
?> 
<br>


Votre demande*:
<br>

            <textarea rows="3" class="form-control" placeholder="Veuillez entrer votre demande" name="demande"><?php if(isset($demande)){ echo $demande; }?></textarea> 
            <?php
// S'il y a une erreur sur la demande alors on affiche
if (isset($er_demande)){
?>
                    <div><p><?= $er_demande ?></p></div><style>p{color:red}</style>
<?php
}
?> 

<br>




</fieldset>
<br>
            <button type="submit" class="btn btn-dark" name="inscription">Envoyer</button>
        </form>
    </body>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>
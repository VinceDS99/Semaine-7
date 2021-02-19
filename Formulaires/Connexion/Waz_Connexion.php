<?php
session_start();
include('Waz_Connexion_BDD.php'); // Fichier PHP contenant la connexion à votre BDD
 
// S'il y a une session alors on ne retourne plus sur cette page  
//if (isset($_SESSION['id'])){
//header('Location: Waz_Index.php');
//exit;
//}
 
// Si la variable "$_Post" contient des informations alors on les traitres
if(!empty($_POST)){
extract($_POST);
$valid = true;
 
if (isset($_POST['connexion'])){
$mail = htmlentities(strtolower(trim($mail)));
$mdp = trim($mdp);
 
if(empty($mail)){ // Vérification qu'il y est bien un mail de renseigné
$valid = false;
$er_mail = "Il faut mettre un mail";
}
 
if(empty($mdp)){ // Vérification qu'il y est bien un mot de passe de renseigné
$valid = false;
$er_mdp = "Il faut mettre un mot de passe";
}
 


// On fait une requête pour savoir si le couple mail / mot de passe existe bien car le mail est unique !
//$conn=mysqli_connect('localhost','root','','wazaa',3308) or die(mysqli_error());
//$req="SELECT id,Nom,Prénom,Mail,Password FROM waz_internautes WHERE Mail=$mail AND Password=$mdp";
//$res=mysqli_query($conn,$req);
//var_dump($req);
//echo $req->Mail;


$requete = "SELECT * FROM waz_internautes WHERE Mail='$mail' AND Password='$mdp'";
$result = $db->query($requete);
$co = $result->fetch(PDO::FETCH_OBJ);
$result->closeCursor();  

//if($mail == "" || $mdp == ""){}
//else{echo "Maison ".$co->Nom;}


// Si on a pas de résultat alors c'est qu'il n'y a pas d'utilisateur correspondant au couple mail / mot de passe
if($mail == "" || $mdp == ""){;}
else if ($co->id == ""){
$valid = false;
$er_mail = "Le mail ou le mot de passe est incorrecte";
}
 
// Si le token n'est pas vide alors on ne l'autorise pas à accéder au site
//if($req['token'] <> NULL){
//$valid = false;
//$er_mail = "Le compte n'a pas été validé";	
//}
 
// S'il y a un résultat alors on va charger la SESSION de l'utilisateur en utilisateur les variables $_SESSION
if ($valid){
$_SESSION['id'] = $co->id; // id de l'utilisateur unique pour les requêtes futures
$_SESSION['nom'] = $co->Nom;
$_SESSION['prenom'] = $co->Prénom;
$_SESSION['mail'] = $co->Mail;
 
header('Location:  Waz_Index.php');
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
   

        <div></div>
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="Waz_Index.php">Accueil</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="Waz_Index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Waz_Contact.php">Contact</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Waz_Administration.php">Administration</a>
            <span class="sr-only">(current)</span>         
          </li>

        </ul>
      </div>
    </div>
  </nav>

    <!-- Page Content -->
  <div class="container">


  <div class="col-lg-3">
  <img src="wazaa_logo.png" alt="Logo Wazaa" title="Logo Wazaa">
   
  <div class="list-group">
          <a href="#" class="list-group-item">Maisons</a>
          <a href="#" class="list-group-item">Appartements</a>
          <a href="#" class="list-group-item">Terrains</a>
        </div>

  </div>
        <form method="post" >
<div class="form-group">
<fieldset>
<legend><h1>Connexion</h1></legend>
            <input type="email" class= "form-control" placeholder="Adresse mail" name="mail" value="<?php if(isset($mail)){ echo $mail; }?>">

<?php
if (isset($er_mail)){
?>
                <div><p><?= $er_mail ?></p></div><style>p{color:red}</style>
<?php
}
?>





            <input type="password" class= "form-control" placeholder="Mot de passe" name="mdp" value="<?php if(isset($mdp)){ echo $mdp; }?>">
<?php
if (isset($er_mdp)){
?>
                <div><p><?= $er_mdp ?></p></div><style>p{color:red}</style>
<?php
}
?>
</fieldset>
</div>
<br>
            <button type="submit" class="btn btn-dark" name="connexion">Se connecter</button>
<a href="Waz_Inscription.php">Vous n'avez pas de compte ? Inscrivez-vous en cliquant ici !</a>
        </form>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Waz_Formu.js"></script>

    </body>
</html>
<?php session_start();?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Wazaa Immo - Accueil</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="Index.css">
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
       
              <form method="post" action="Waz_Inscription_Script.php">


        <fieldset>
          <legend>
            <h1>Formulaire d'inscription</h1>
          </legend>


                      <input type="text" class="form-control" placeholder="Votre nom" name="nom"
            value="<?php if(isset($_SESSION['EcritNom'])){ echo $_SESSION['EcritNom'];unset($_SESSION['EcritNom']); }?>"> 
                      <?php
// S'il y a une erreur sur le nom alors on affiche
if (isset($_SESSION['ErreurNom'])){
?>
                              <div>
            <p><?php echo $_SESSION['ErreurNom'];unset($_SESSION['ErreurNom']); ?></p>
          </div>
          <style>
            p {
              color: red
            }
          </style>
          <?php
}
?> 



                      <input type="text" class="form-control" placeholder="Votre prénom" name="prenom"
            value="<?php if(isset($_SESSION['EcritPrenom'])){ echo $_SESSION['EcritPrenom'];unset($_SESSION['EcritPrenom']); }?>"> 
                      <?php
// S'il y a une erreur sur le prénom alors on affiche
if (isset($_SESSION['ErreurPrenom'])){
?>
                              <div>
            <p><?php echo $_SESSION['ErreurPrenom'];unset($_SESSION['ErreurPrenom']); ?></p>
          </div>
          <style>
            p {
              color: red
            }
          </style>
          <?php
}
?> 



                      <input type="email" class="form-control" placeholder="Adresse mail" name="mail"
            value="<?php if(isset($_SESSION['EcritMail'])){ echo $_SESSION['EcritMail'];unset($_SESSION['EcritMail']); }?>">
                      <?php
// S'il y a une erreur sur le mail alors on affiche
if (isset($_SESSION['ErreurMail'])){
?>
                              <div>
            <p><?php echo $_SESSION['ErreurMail'];unset($_SESSION['ErreurMail']); ?></p>
          </div>
          <style>
            p {
              color: red
            }
          </style>
          <?php
}
?>



                      <input type="password" class="form-control" placeholder="Mot de passe" name="mdp"
            value="<?php if(isset($_SESSION['EcritMdp'])){ echo $_SESSION['EcritMdp'];unset($_SESSION['EcritMdp']); }?>">
                      <?php
// S'il y a une erreur sur le mdp alors on affiche
if (isset($_SESSION['ErreurMdp'])){
?>
                              <div>
            <p><?php echo $_SESSION['ErreurMdp'];unset($_SESSION['ErreurMdp']); ?></p>
          </div>
          <style>
            p {
              color: red
            }
          </style>
          <?php
}
?>

                      <input type="password" class="form-control" placeholder="Confirmer le mot de passe"
            name="confmdp">
        </fieldset>
        <br>
                    <button type="submit" class="btn btn-dark" name="inscription">Envoyer</button>
               
      </form>
          </body>






<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
  integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
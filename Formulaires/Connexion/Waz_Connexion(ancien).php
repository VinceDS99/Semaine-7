<?php Include"Waz_Entete.php"; ?>

<body>
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

<div class="row">

  <div class="col-lg-3">
  <img src="wazaa_logo.png" alt="Logo Wazaa" title="Logo Wazaa">
   
  <div class="list-group">
          <a href="#" class="list-group-item">Maisons</a>
          <a href="#" class="list-group-item">Appartements</a>
          <a href="#" class="list-group-item">Terrains</a>
        </div>

  </div>
        
    
        
        <form method="post" action="Waz_Administration2.php" id="Connex">
            <div class="form-group">

            <br>

         <fieldset>
            <legend><h1>Connexion</h1></legend>
            <label for="courriel">Email </label><input  class= "form-control" name="courriel" id="log" placeholder="Adresse mail"><br>
            <label for="Nom">Mot de passe</label><input type="password" class="form-control" name="nom" id="motdpasse"  placeholder="Mot de passe"><br>

         </fieldset>
         <button type="submit" class="btn btn-dark" onClick="Connexion">Connexion </button>

    
        </form>
        <a href="Waz_Inscription.php">Vous n'avez pas de compte ? Inscrivez-vous en cliquant ici !</a>
        
     
 </section>

 

 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Waz_Formu.js"></script>







</body>

</html>
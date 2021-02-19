<?php Include"Waz_Entete.php"; ?>
<?php Include"Waz_Connexion_BDD.php"; ?>

<body>
    <div class="container">

    <?php $ID=$_GET['id'];?>
  
    <header class="navbar navbar-expand-sm bg-dark navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
            </button>   
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="Accueil.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Moncompte.html">Mon compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contact.html">Contact</a>
                    </li>
                </ul>
            </div> 
    </header>

<h4>Modification<h4>

    <?php   


        $requete = "SELECT * FROM waz_internautes WHERE id = $ID";
        $result = $db->query($requete);
        $internaute = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor(); 
         ?>
 

    <section>


        <br>
        
    
        
        <form method=GET action="modif.php">
            <div class="form-group">

        <fieldset>
        <label for="ID">ID:</label><input type="text" class="form-control" name="ID" id="ID" value= <?php echo $internaute->id; ?>><br>
          <label for="Nom">Nom:</label><input type="text" class="form-control" name="Nom" id="Nom" value= <?php echo $internaute->Nom; ?> ><br>
          <label for="Prénom">Prénom: </label><input type="text" class="form-control" name="Prénom" id="Prénom" value=  <?php echo $internaute->Prénom; ?>><br>
          <label for="Mail">Mail: </label><input type="text" class="form-control" name="Mail" id=Mail value= <?php echo $internaute->Mail; ?>><br>
          <label for="Password">Password: </label><input type="text" class="form-control" name="Password" id=Password value= <?php echo $internaute->Password; ?>><br>
         </fieldset>


         <br>
       
         <a href="modif.php"><button>Modifier</button></a>

         <?php // On modifie nos données dans la table waz_internautes
        $req=$db->prepare("UPDATE INTO waz_internautes (Nom,Prénom,Mail,Password) values (:nom,:prenom,:mail,:mdp)");
        $req->bindParam(':nom',$nom);
        $req->bindParam(':prenom',$prenom);
        $req->bindParam(':mail',$mail);
        $req->bindParam(':mdp',$mdp);
        $req->execute();
        //$res=mysqli_query($conn,$req);
        $req->closeCursor(); ?>
    
        </form>
        
        <hr>
 </section>


 


    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>

<?php Include"Waz_Entete.php"; ?>
<?php Include"Waz_Connexion_BDD.php"; ?>


  

<?php   
        
        $requete = "SELECT * FROM waz_internautes WHERE id = 1";
        $result = $db->query($requete);
        $internaute1 = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor(); 
        
        $requete = "SELECT * FROM waz_internautes WHERE id = 2";
        $result = $db->query($requete);
        $internaute2 = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor(); 

        $requete = "SELECT * FROM waz_internautes WHERE id = 3";
        $result = $db->query($requete);
        $internaute3 = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor(); 

        ?>



  <div class="container">

    <header>  
    <style type="text/css">
h1 {
  text-align:center;
}
</style><h1><strong>LISTE DES INTERNAUTES</strong></h1>
    </header>

    

    <section>
       


        <hr>
          <div class="table responsive">
            <table class="table table-striped">
              <tr>
              <td> <strong>ID</strong> </td>
                <td> <strong>Nom</strong> </td>
                <td><strong> Prénom</strong></td>
                <td><strong>Mail</strong></td>
                <td><strong>Mdp</strong></td>
              </tr>
              <tr>
                <td><?php echo $internaute1->id; ?></td>
                <td>  <?php echo $internaute1->Nom; ?></td>
                <td> <a href="Waz_modif2.php?id=1" title="Infos"><?php echo $internaute1->Prénom; ?></a> 
                <td> <?php echo $internaute1->Mail; ?></td>
                <td><?php echo $internaute1->Password; ?></td>
              </tr>
              <tr>
                <td><?php echo $internaute2->id; ?></td>
                <td>  <?php echo $internaute2->Nom; ?></td>
                <td> <a href="Waz_modif2.php?id=2" title="Infos"><?php echo $internaute2->Prénom; ?></a> 
                <td> <?php echo $internaute2->Mail; ?></td>
                <td><?php echo $internaute2->Password; ?></td>
              </tr>
              <tr>
                <td><?php echo $internaute3->id; ?></td>
                <td>  <?php echo $internaute3->Nom; ?></td>
                <td> <a href="Waz_modif2.php?id=3" title="Infos"><?php echo $internaute3->Prénom; ?></a> 
                <td> <?php echo $internaute3->Mail; ?></td>
                <td><?php echo $internaute3->Password; ?></td>
              </tr>  
            </table>
</div>
    </section>

  



  </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

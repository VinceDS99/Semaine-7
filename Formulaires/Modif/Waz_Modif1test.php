<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Jarditou</title>
  <link rel="stylesheet" type="text/css" href="Tableau.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  <link rel="stylesheet" type="text/css" href="Index.css">
</head>

<body>


  

<?php     
        
          $Chiffre=1;
          $tabid = array("id1", "id2", "id3","id4","id5","id6","id7","id8","id9","id10","id11","id12","id13","id14","id15","id16","id17","id18","id19","id20");

          while($Chiffre != 100){
        $requete = "SELECT * FROM waz_internautes WHERE id = $Chiffre";
        if ($requete == "null"){
        $result = $db->query($requete);
        $tabid[$Chiffre] = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor();} 
        $Chiffre=$Chiffre+1;
      }
      var_dump($tabid);
        ?>



  <div class="container">

    <header>  
    <style type="text/css">
h1 {
  text-align:center;
}
</style><h1><strong>LISTE DES PRODUITS</strong></h1>
    </header>

    

    <section>
       


        <hr>
          <div class="table responsive">
            <table class="table table-striped">
              


              
                <?php echo 'ee'; ?>
                <br>
                  <?php echo $tabid[15]->id; ?>
                  <br>
                <?php echo 'e'; ?>
             
          

            </table>
         </div>
    </section>

  
    <!-- <tr>
                <td><?php echo $produit7->pro_id; ?></td>
                <td>  <?php echo $produit7->pro_ref; ?></td>
                <td> <?php echo $produit7->pro_prix.'€'; ?></td>
              </tr> -->



  </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>

<?php
session_start();
include('Waz_Connexion_BDD.php'); // Fichier PHP contenant la connexion à votre BDD

// S'il y a une session alors on ne retourne plus sur cette page
//if (isset($_SESSION['id'])){
//header('Location: index.php'); 
//exit;
//    }

// Si la variable "$_Post" contient des informations alors on les traites
if(!empty($_POST)){
    extract($_POST);
    $valid = true;
    var_dump($_POST);//test
    
    $nom  = htmlentities(trim($nom)); // On récupère le nom
    $prenom = htmlentities(trim($prenom)); // on récupère le prénom
    $mail = htmlentities(strtolower(trim($mail))); // On récupère le mail
    $mdp = trim($mdp); // On récupère le mot de passe 
    $confmdp = trim($confmdp); //  On récupère la confirmation du mot de passe
    var_dump($nom);//test  
    
    $erreurs=[];
    //  Vérification du nom
    if(empty($nom)){
        $valid = false;
        $erreurs['er_nom']="Le nom ne peut pas être vide";
    }
    
    //  Vérification du prénom
    if(empty($prenom)){
        $valid = false;
        $erreurs['er_prenom']="Le prénom ne peut pas être vide";

    }
    
    // Vérification du mail
    if(empty($mail)){
        $valid = false;
        $erreurs['er_mail']="Le mail ne peut pas être vide";
    }
    // On vérifit que le mail est dans le bon format
    elseif(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $mail)){
        $valid = false;
        $erreurs['er_mail']="Le mail n'est pas valide";
    }

    else{
        $requete = "SELECT Mail FROM waz_internautes WHERE Mail='$mail'";
        $result = $db->query($requete);
        $co = $result->fetch(PDO::FETCH_OBJ);
        $result->closeCursor();  
        //Précision que valid=true pour être sûr
        if($co->Mail == ""){
            $valid=true;
        }
        else{
            $valid=false;
            $erreurs['er_mail']="Ce mail existe déjà !";

        }
    }

    
    // Vérification du mot de passe
    if(empty($mdp)) {
        $valid = false;
        $erreurs['er_mdp']="Le mot de passe ne peut pas être vide";
    }
    
    elseif($mdp != $confmdp){
        $valid = false;
        $erreurs['er_mdp']="La confirmation du mot de passe ne correspond pas";
    }
    
    var_dump($erreurs);//test

    // Si toutes les conditions sont remplies alors on fait le traitement
    if($valid){
    
        //$mdp = crypt($mdp, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
        //$date_creation_compte = date('Y-m-d H:i:s');
        

        // On insert nos données dans la table waz_internautes
        $req=$db->prepare("INSERT INTO waz_internautes (Nom,Prénom,Mail,Password) values (:nom,:prenom,:mail,:mdp)");
        $req->bindParam(':nom',$nom);
        $req->bindParam(':prenom',$prenom);
        $req->bindParam(':mail',$mail);
        $req->bindParam(':mdp',$mdp);
        $req->execute();
        //$res=mysqli_query($conn,$req);
        $req->closeCursor();

        header('Location: Waz_connexion.php');

        exit;
    }
    else{
        $_SESSION['ErreurNom']=$erreurs['er_nom'];
        $_SESSION['ErreurPrenom']=$erreurs['er_prenom'];
        $_SESSION['ErreurMail']=$erreurs['er_mail'];
        $_SESSION['ErreurMdp']=$erreurs['er_mdp'];
        $_SESSION['erreurs'] = $erreurs;
        $_SESSION['EcritNom']=$nom;
        $_SESSION['EcritPrenom']=$prenom;
        $_SESSION['EcritMail']=$mail;
        $_SESSION['EcritMdp']=$mdp;
        header('Location: Waz_inscription.php');
    }
    var_dump($_SESSION);//test


}
?>
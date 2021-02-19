<?php

class Agence 
{   
    public $_Nom;
    public $_Adresse;
    public $_CodePostal;
    public $_Ville;
    public $_Restauration;
} 

$AgenceIDF = new Agence();
$AgenceIDF->_Nom = "AgenceIDF";
$AgenceIDF->_Adresse = "5 rue Victor Hugo";
$AgenceIDF->_CodePostal = "75000";
$AgenceIDF->_Ville = "Paris";
$AgenceIDF->_Restauration = "Tickets";

$AgenceHDF = new Agence();
$AgenceHDF->_Nom = "AgenceHDF";
$AgenceHDF->_Adresse = "7 rue Jacques Rousseau";
$AgenceHDF->_CodePostal = "80000";
$AgenceHDF->_Ville = "Amiens";
$AgenceHDF->_Restauration = "Restaurant";


class Employe 
{   
    public $_Nom;
    public $_Prenom;
    public $_DateEmbauche;
    public $_Poste;								   
    public $_SalaireAn;		
    public $_Service;
    public $_Agence;
    public function Anciennete(){

        $now = time();
        var_dump($this->_DateEmbauche);
        $DateE = strtotime($this->_DateEmbauche);

        $diff = ($now - $DateE)/31536000;

        $diff=round ($diff,0,PHP_ROUND_HALF_DOWN);

        if($diff>0)
        {if($diff==1){echo "Cet employé est la depuis au moins un an";}
        else{echo $this->_Prenom." ".$this->_Nom." est la depuis au moins ".$diff." ans.";}}
        else{echo "Cet employé est la depuis moins d'un an";}
    }	

    public function Prime(){

        $now = time();
        var_dump($this->_DateEmbauche);
        $DateE = strtotime($this->_DateEmbauche);
    
        $diff = ($now - $DateE)/31536000;
    
        $diff = round ($diff,0,PHP_ROUND_HALF_DOWN);
    
        $PourcentageP = ($diff*2)+5;
        $Prime = ($this->_SalaireAn*1000)*$PourcentageP/100;
        echo'Montant de la prime de '.$this->_Nom." ".$this->_Prenom." = ".$Prime."€";

        //$date = date("30/11");    ~Date de l'envoi de la prime
        $date = date("d/m");


        if($date=="30/11"){
        echo "<script>console.log('Ordre de transfert envoyé. Montant: ".$Prime."' );</script>";}
    }	

    public function Restauration(){
        $vAgence = ($this->_Agence);
       echo "asasasas"."$Agence";

       // if($this->_Agence=="30/11"){
        //echo "<script>console.log('Ordre de transfert envoyé. Montant: ".$Prime."' );</script>";}

        //if($date=="30/11"){
          //  echo "<script>console.log('Ordre de transfert envoyé. Montant: ".$Prime."' );</script>";}
    }	
} 

$JackD = new Employe();
$JackD->_Prenom = "Jack";
$JackD->_Nom = "Dubois";
$JackD->_DateEmbauche = "21 March 2012";
$JackD->_Poste = "Comptable";
$JackD->_SalaireAn = 43;
$JackD->_Service = "Comptabilité";
$JackD->_Agence = $AgenceHDF;
var_dump($JackD);

$FranckI = new Employe();
$FranckI->_Prenom = "Franck";
$FranckI->_Nom = "Izard";
$FranckI->_DateEmbauche = "12 July 2014";
$FranckI->_Poste = "Vendeur";
$FranckI->_SalaireAn = 54;
$FranckI->_Service = "Commercial";
$FranckI->_Agence = $AgenceHDF;
var_dump($FranckI);

$AlainP = new Employe();
$AlainP->_Prenom = "Alain";
$AlainP->_Nom = "Proviste";
$AlainP->_DateEmbauche = "15 June 2017";
$AlainP->_Poste = "Développeur";
$AlainP->_SalaireAn = 42;
$AlainP->_Service = "Informatique";
$AlainP->_Agence = $AgenceHDF;
var_dump($AlainP);

$SarahD = new Employe();
$SarahD->_Prenom = "Sarah";
$SarahD->_Nom = "Darjo";
$SarahD->_DateEmbauche = "22 November 2018";
$SarahD->_Poste = "Assistant Comptable";
$SarahD->_SalaireAn = 24;
$SarahD->_Service = "Comptabilité";
$SarahD->_Agence = $AgenceIDF;
var_dump($SarahD);

$RyanG = new Employe();
$RyanG->_Prenom = "Ryan";
$RyanG->_Nom = "Greenwood";
$RyanG->_DateEmbauche = "10 December 2020";
$RyanG->_Poste = "Homme de ménage";
$RyanG->_SalaireAn = 15;
$RyanG->_Service = "Ménager";
$RyanG->_Agence = $AgenceIDF;
var_dump($RyanG);

var_dump($JackD->Anciennete());
var_dump($FranckI->Anciennete());
var_dump($AlainP->Anciennete());
var_dump($SarahD->Anciennete());
var_dump($RyanG->Anciennete());

var_dump($JackD->Prime());
var_dump($FranckI->Prime());
var_dump($AlainP->Prime());
var_dump($SarahD->Prime());
var_dump($RyanG->Prime());

var_dump($JackD->Restauration());
var_dump($FranckI->Restauration());
var_dump($AlainP->Restauration());
var_dump($SarahD->Restauration());
var_dump($RyanG->Restauration());

$Employes = array($JackD, $FranckI, $AlainP,$SarahD,$RyanG);

list($a[0], $a[1], $a[2], $a[3], $a[4]) = $Employes;
sort($a);
var_dump($a);
var_dump(count($a));




?>
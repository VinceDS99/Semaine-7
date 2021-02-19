<?php
/* Charger impérativement avec 'require_once', ne fonctionne dans certains cas avec 'require' */
require_once "./employes/Employe.class.php";

use PHPUnit\Framework\TestCase; // Charge le framework PhpUnit

class EmployeTest extends TestCase
{
    // Teste la valeur du champ nom à l'instanciation
    public function testPersonnageChampNomDefault() {
        $JackD = new Employe();
        $this->assertNull($JackD->getNom());
    
    }}
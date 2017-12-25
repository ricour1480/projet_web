<?php

require '../lib/php/dbconnect.php';
require '../lib/php/classes/Connexion.class.php';
require '../lib/php/classes/Vue_Commande.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

//récup des données
$obj = new Vue_Commande($cnx);
$liste = $obj->getPanierCommande();
$nbrG = count($liste);

require '../lib/fpdf181/fpdf.php';

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->SetFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->SetX(1);
$pdf->cell(3, 1, utf8_decode('Fiche de Commande'), 0, 0, 'L');
//header premier
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(1, 2); // coordonnées bord supérieur gauche
$pdf->cell(25, .7,"Toutes les commandes", 0, 0, 'L', 1);


$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);

$x = 1;
$y = 3;
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial', 'B', 10);
$pdf->cell(2, 1, 'client', 1, 0, 'L');
$pdf->cell(4, 1, 'Adresse Client', 1, 0, 'L');
$pdf->cell(3, 1, 'Titre', 1, 0, 'L');
$pdf->cell(6, 1, 'Auteur', 1, 0, 'L');
$pdf->cell(11, 1, 'Prix', 1, 0, 'L');
$pdf->SetFont('Arial', '', 12);

$y++;
for ($i = 0; $i < $nbrG; $i++) {
    $pdf->SetXY($x, $y); // $x vaut 3, $y vaut 4
    $pdf->SetFontSize(8);
    $pdf->cell(5, 1, utf8_decode($liste[$i]['nom_client']), 0, 0, 'L');
    $pdf->SetXY($x + 2, $y);
    $pdf->cell(5, 1, utf8_decode($liste[$i]['ADRESSE']), 0, 0, 'L');
    $pdf->SetXY($x + 6, $y);
    $pdf->cell(5, 1, utf8_decode($liste[$i]['TITRE']), 0, 0, 'L');
    $pdf->SetXY($x + 11, $y);
    $pdf->cell(5, 1, utf8_decode($liste[$i]['auteur']), 0, 0, 'L');
    $pdf->SetXY($x + 16, $y);
    $pdf->cell(5, 1, utf8_decode($liste[$i]['SOMME_LIVRE']), 0, 0, 'L');
    $y+=2;
    if (($i + 1) % 10 == 0) {
        $pdf->AddPage();
        $x = 3;
        $y = 3;
        $pdf->SetXY($x, $y);
        $pdf->SetFont('Arial','B',12);
        $pdf->cell(2, 1, 'client', 1, 0, 'L');
        $pdf->cell(4, 1, 'Adresse Client', 1, 0, 'L');
        $pdf->cell(3, 1, 'Titre', 1, 0, 'L');
        $pdf->cell(6, 1, 'Auteur', 1, 0, 'L');
        $pdf->cell(11, 1, 'Prix', 1, 0, 'L');
        $y++;
    }
    
}



$pdf->Output();

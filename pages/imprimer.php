<?php

require './admin/lib/php/dbconnect.php';
require './admin/lib/php/classes/Connexion.class.php';
require './admin/lib/php/classes/Vue_Commande.class.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);

//récup des données
$obj = new Vue_Commande($cnx);
$liste = $obj->getPanierCommande();
$nbrG = count($liste);

require '../lib/fpdf181/fpdf.php';

$pdf = new FPDF('P', 'cm', 'A4');
$pdf->SetFont('Arial', 'B', 14);
$pdf->AddPage();
$pdf->SetX(3);
$pdf->cell(3.5, 1, utf8_decode('Fiche de Commande'), 0, 0, 'L');
//header premier
$pdf->SetFillColor(200, 10, 10);
$pdf->SetDrawColor(0, 0, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(3, 2); // coordonnées bord supérieur gauche
$pdf->cell(15, .7, utf8_decode('Pour tout événement'), 0, 0, 'L', 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetTextColor(0, 0, 0);

$x = 3;
$y = 3;
$pdf->SetXY($x, $y);
$pdf->SetFont('Arial', 'B', 12);
$pdf->cell(12, 1, utf8_decode('Dénomination'), 0, 0, 'L');
$pdf->cell(2, 1, 'Prix', 0, 0, 'L');
$pdf->cell(5, 1, 'Image', 0, 0, 'C');
$pdf->cell(8, 1, 'Prix', 0, 0, 'L');
$pdf->cell(11, 1, 'Image', 0, 0, 'C');

$pdf->SetFont('Arial', '', 12);
$y++;
for ($i = 0; $i < $nbrG; $i++) {
    $pdf->SetXY($x, $y); // $x vaut 3, $y vaut 4
    $pdf->cell(5, 1, utf8_decode($liste[$i]['nom_client']), 0, 0, 'L');
    $pdf->SetXY($x + 8, $y);
     $pdf->cell(5, 1, utf8_decode($liste[$i]['TITRE']), 0, 0, 'L');
    $pdf->SetXY($x + 10, $y);
     $pdf->cell(5, 1, utf8_decode($liste[$i]['auteur']), 0, 0, 'L');
    $pdf->SetXY($x + 12, $y);
     $pdf->cell(5, 1, utf8_decode($liste[$i]['SOMME_LIVRE']), 0, 0, 'L');
    $pdf->SetXY($x + 14, $y);
    $y+=2;
    if (($i + 1) % 10 == 0) {
        $pdf->AddPage();
        $x = 3;
        $y = 3;
        $pdf->SetXY($x, $y);
        $pdf->SetFont('Arial', 'B', 12);
        $den = utf8_decode('Dénomination');
        $pdf->cell(8, 1, $den, 0, 'C', 1, 1);
        $pdf->SetXY($x + 8, $y);
        $pdf->cell(2, 1, 'NOM_CLIENT', 0, 'C', 1, 1);
        $pdf->SetXY($x + 10, $y);
        $pdf->cell(5, 1, 'TITRE', 0, 'C', 1, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY($x + 12, $y);
        $pdf->cell(5, 1, 'AUTEUR', 0, 'C', 1, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY($x + 14, $y);
        $pdf->cell(5, 1, 'PRIX', 0, 'C', 1, 1);
        $pdf->SetFont('Arial', '', 12);
        $y++;
    }
}



$pdf->Output();

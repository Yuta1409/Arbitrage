<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{


function Header()
{
	

    $this->SetFont('Arial','B',8);      // permet de saisir la taille du texte et la police.

    $this->Cell(60);            // permet d'affecter une taille à la cellulle

    $this->Cell(150,10,'Liste des arbitres ',0,0,'C');      // Permet d'ajouter un titre

    $this->Ln(20);              // permet de faire des sauts de lignes

    
    $this->Cell(15,10,'Numero',1,0,'C',0);
	$this->Cell(25,10,'Nom',1,0,'C',0);
	$this->Cell(20,10,'Prenom',1,0,'C',0);
    $this->Cell(25,10,'Adresse',1,0,'C',0);
	$this->Cell(20,10,'Code Postal',1,0,'C',0);
	$this->Cell(20,10,'Ville',1,0,'C',0);
    $this->Cell(30,10,'Date de naissance',1,0,'C',0);
	$this->Cell(20,10,'Tel fixe',1,0,'C',0);
	$this->Cell(20,10,'Tel portable',1,0,'C',0);
    $this->Cell(45,10,'Mail',1,0,'C',0);
	$this->Cell(20,10,'Nom club',1,0,'C',0);
	$this->Cell(20,10,'Nom equipe',1,1,'C',0);
  
}


function Footer()
{

    $this->SetY(-15);

    $this->SetFont('Arial','I',8);

    $this->Cell(0,10,utf8_decode('Page ') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("cn.php");         //
$req = "SELECT * FROM arbitre ar INNER JOIN equipe eq ON eq.num_equipe = ar.num_equipe INNER JOIN club cl ON cl.num_club = ar.num_club";
$resultat = mysqli_query($connexion, $req);

$pdf = new PDF();
$pdf->AliasNbPages();               // Compter le nombre de pages
$pdf->AddPage("L");                 // Créer la page / (L) est le format paysage
$pdf->SetFont('Arial','B',8);       // permet de saisir la taille du texte et la police.

while ($row=$resultat->fetch_assoc()) {
	$pdf->Cell(15,10,$row['num_arbitre'],1,0,'C',0);
	$pdf->Cell(25,10,$row['nom_arbitre'],1,0,'C',0);
	$pdf->Cell(20,10,$row['prenom_arbitre'],1,0,'C',0);
    $pdf->Cell(25,10,$row['adresse_arbitre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['cp_arbitre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['ville_arbitre'],1,0,'C',0);
    $pdf->Cell(30,10,$row['date_naiss_arbitre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['tel_fixe_arbitre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['tel_port_arbitre'],1,0,'C',0);
    $pdf->Cell(45,10,$row['mail_arbitre'],1,0,'C',0);
    $pdf->Cell(20,10,$row['nom_club'],1,0,'C',0);
    $pdf->Cell(20,10,$row['nom_equipe'],1,1,'C',0);
} 


	$pdf->Output();
?>
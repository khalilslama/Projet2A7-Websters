<?php
include('../core/database_connection.php');

require "fpdf.php";
/**
 * 
 */

class MyPDF extends FPDF
{
	function Header(){
     $this->Image('logoc.png',14,0);
     $this->SetFont('Arial','B',18);
     $this->Cell(276,20,'Fiche des Mesures',0,0,'C');
     $this->Ln();
     $this->SetFont('Times','',12);
     $this->Cell(276,0,'Mesures personnelles',0,0,'C');
     $this->Ln();
	}
	function Footer(){
     $this->SetY(-15);
     $this->SetFont('Arial','',8);
     $this->Cell(0,10,'Page'. $this->PageNo().'/{nb}',0,0,'C');
	}
	function headertable(){
	 $this->Ln(30);
	 $this->SetX(55);
     $this->SetFont('Times','B',12);
     $this->Cell(35,10,'Nom',1,0,'C');
     $this->Cell(50,10,'Prenom',1,0,'C');
     $this->Cell(70,10,'Email',1,0,'C');
     $this->Cell(35,10,'Numero',1,0,'C');
	}
	function viewTable1($connect){
		$this->Ln();
		$this->SetX(55);
       $this->SetFont('Times','',12);
       $stmt = $connect->query("select Nom,Prenom,Email,Numero from client where Id='".$_POST["genererpdf"]."'");
       while ($data=$stmt->fetch(PDO::FETCH_OBJ)){
       	 $this->Cell(35,10,$data->Nom,1,0,'C');
         $this->Cell(50,10,$data->Prenom,1,0,'C');
         $this->Cell(70,10,$data->Email,1,0,'C');
         $this->Cell(35,10,$data->Numero,1,0,'C');
       }
   }
       
       function viewMtable1($connect){

        $this->SetFont('Times','',12);
        $stmt = $connect->query("select Tourpoitrine,tourtaille,tourbassin,L_taille,H_poitrine,E_poitrine,L_epaule from client where Id='".$_POST["genererpdf"]."'");
         while ($data=$stmt->fetch(PDO::FETCH_OBJ)){
              $this->Ln(30);
              $this->SetX(40);
              $this->SetFont('Times','B',12);
              $this->Cell(35,12,'TourPoitrine',1,0,'C');
              $this->Cell(35,12,$data->Tourpoitrine,1,1,'C');
              $this->SetX(40);
              $this->Cell(35,12,'TourTaille',1,0,'C');
              $this->Cell(35,12,$data->tourtaille,1,1,'C');
              $this->SetX(40);
              $this->Cell(35,12,'TourBassin',1,0,'C');
              $this->Cell(35,12,$data->tourbassin,1,1,'C');
              $this->SetX(40);
              $this->Cell(35,12,'L.Taille',1,0,'C');
              $this->Cell(35,12,$data->L_taille,1,1,'C');
              $this->SetX(40);
              $this->Cell(35,12,'H.Poitrine',1,0,'C');
              $this->Cell(35,12,$data->H_poitrine,1,1,'C');
              $this->SetX(40);
              $this->Cell(35,12,'E.Poitrine',1,0,'C');
              $this->Cell(35,12,$data->E_poitrine,1,1,'C');
              $this->SetX(40);
              $this->Cell(35,12,'L.Epaule',1,0,'C');
              $this->Cell(35,12,$data->L_epaule,1,1,'C');
       }
       
       }

       




       function viewMtable2($connect){

        $this->SetFont('Times','',12);
        $stmt = $connect->query("select Carruredos,Carruredevant,Grosseurbras,Tourpoignet,Hauteurgenou,L_taille_terre,Longeurtotale from client where Id='".$_POST["genererpdf"]."'");
         while ($data=$stmt->fetch(PDO::FETCH_OBJ)){
              $this->SetY(-110);
              $this->SetX(190);
              $this->SetFont('Times','B',12);
              $this->Cell(35,12,'Carruredos',1,0,'C');
              $this->Cell(35,12,$data->Carruredos,1,1,'C');
              $this->SetX(190);
              $this->Cell(35,12,'Carruredevant',1,0,'C');
              $this->Cell(35,12,$data->Carruredevant,1,1,'C');
              $this->SetX(190);
              $this->Cell(35,12,'Grosseurbras',1,0,'C');
              $this->Cell(35,12,$data->Grosseurbras,1,1,'C');
              $this->SetX(190);
              $this->Cell(35,12,'Tourpoignet',1,0,'C');
              $this->Cell(35,12,$data->Tourpoignet,1,1,'C');
              $this->SetX(190);
              $this->Cell(35,12,'Hauteurgenou',1,0,'C');
              $this->Cell(35,12,$data->Hauteurgenou,1,1,'C');
              $this->SetX(190);
              $this->Cell(35,12,'L_taille/terre',1,0,'C');
              $this->Cell(35,12,$data->L_taille_terre,1,1,'C');
              $this->SetX(190);
              $this->Cell(35,12,'Longeurtotale',1,0,'C');
              $this->Cell(35,12,$data->Longeurtotale,1,1,'C');
       }
       
       }


	
	
}
$pdf = new MyPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headertable();
$pdf->viewTable1($connect);
$pdf->viewMtable1($connect);
$pdf->viewMtable2($connect);
$pdf->Output();



?>
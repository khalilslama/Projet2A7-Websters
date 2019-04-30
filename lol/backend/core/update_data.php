<?php

//update_data.php

include('database_connection.php');

if(isset($_POST["Tourpoitrine"]))
{
 $error = '';
 $success = '';
  
 
 $Tourpoitrine ='';
 $tourtaille ='';
 $tourbassin = '';
 $L_taille = '';
 $H_poitrine = '';
 $E_poitrine = '';
 $Carruredos = '';
 $Carruredevant ='';
 $L_epaule ='';
 $Grosseurbras = '';
 $Tourpoignet = '';
 $Hauteurgenou = '';
 $L_taille_terre = '';
 $Longeurtotale = '';

 
 if(empty($_POST["Tourpoitrine"]))
 {
  //$error .= '<p>Vérifiez Tourpoitrine</p>';
  $Tourpoitrine='0';
 }
 else
 {
  $Tourpoitrine = $_POST["Tourpoitrine"];
 }

 if(empty($_POST["tourtaille"]))
 {
  //$error .= '<p>Vérifiez tourtaille</p>';
  $tourtaille=0;
 }
 else
 {
  $tourtaille = $_POST["tourtaille"];
 }
 
 if(empty($_POST["tourbassin"]))
 {
  //$error .= '<p>Vérifiez tourbassin</p>';
  $tourbassin=0;
 }
 else
 {
  $tourbassin = $_POST["tourbassin"];
 }
 if(empty($_POST["L_taille"]))
 {
  //$error .= '<p>Vérifiez tourbassin</p>';
  $L_taille=0;
 }
 else
 {
  $L_taille = $_POST["L_taille"];
 }
 if(empty($_POST["H_poitrine"]))
 {
  //$error .= '<p>Vérifiez H_poitrine</p>';
  $H_poitrine=0;
 }
 else
 {
  $H_poitrine = $_POST["H_poitrine"];
 }
 if(empty($_POST["E_poitrine"]))
 {
  //$error .= '<p>Vérifiez E_poitrine</p>';
  $E_poitrine=0;
 }
 else
 {
  $E_poitrine = $_POST["E_poitrine"];
 }
 if(empty($_POST["Carruredos"]))
 {
  //$error .= '<p>Vérifiez Carruredos</p>';
  $Carruredos=0;
 }
 else
 {
  $Carruredos = $_POST["Carruredos"];
 }
 if(empty($_POST["Carruredevant"]))
 {
  //$error .= '<p>Vérifiez Carruredevant</p>';
  $Carruredevant=0;
 }
 else
 {
  $Carruredevant = $_POST["Carruredevant"];
 }
 if(empty($_POST["L_epaule"]))
 {
  //$error .= '<p>Vérifiez L_epaule</p>';
  $L_epaule=0;
 }
 else
 {
  $L_epaule = $_POST["L_epaule"];
 }
 if(empty($_POST["Grosseurbras"]))
 {
  //$error .= '<p>Vérifiez Grosseurbras</p>';
  $Grosseurbras=0;
 }
 else
 {
  $Grosseurbras = $_POST["Grosseurbras"];
 }
 if(empty($_POST["Tourpoignet"]))
 {
  //$error .= '<p>Vérifiez Tourpoignet</p>';
  $Tourpoignet=0;
 }
 else
 {
  $Tourpoignet = $_POST["Tourpoignet"];
 }
 if(empty($_POST["Hauteurgenou"]))
 {
  //$error .= '<p>Vérifiez Hauteurgenou</p>';
  $Hauteurgenou=0;
 }
 else
 {
  $Hauteurgenou = $_POST["Hauteurgenou"];
 }
 if(empty($_POST["L_taille_terre"]))
 {
  //$error .= '<p>Vérifiez L_taille_terre</p>';
  $L_taille_terre=0;
 }
 else
 {
  $L_taille_terre = $_POST["L_taille_terre"];
 }
 if(empty($_POST["Longeurtotale"]))
 {
  //$error .= '<p>Vérifiez Longeurtotale</p>';
  $Longeurtotale=0;
 }
 else
 {
  $Longeurtotale = $_POST["Longeurtotale"];
 }
 

 
 if($error == '')
 {
  $data = array(
   ':Tourpoitrine'   => $Tourpoitrine,
   ':tourtaille'  => $tourtaille,
   ':tourbassin'  => $tourbassin,
   ':L_taille' => $L_taille,
   ':H_poitrine'   => $H_poitrine,
   ':E_poitrine'  => $E_poitrine,
   ':Carruredos'   => $Carruredos,
   ':Carruredevant'  => $Carruredevant,
   ':L_epaule'  => $L_epaule,
   ':Grosseurbras' => $Grosseurbras,
   ':Tourpoignet'   => $Tourpoignet,
   ':Hauteurgenou'  => $Hauteurgenou,
   ':L_taille_terre'   => $L_taille_terre,
   ':Longeurtotale'  => $Longeurtotale,
   ':id'   => $_POST["id"]
  );

  $query = "
  UPDATE client 
  SET Tourpoitrine = :Tourpoitrine,
  tourtaille = :tourtaille,
  tourbassin = :tourbassin, 
  L_taille = :L_taille, 
  H_poitrine = :H_poitrine, 
  E_poitrine = :E_poitrine,
  Carruredos = :Carruredos,
  Carruredevant = :Carruredevant, 
  L_epaule = :L_epaule, 
  Grosseurbras = :Grosseurbras, 
  Tourpoignet = :Tourpoignet,
  Hauteurgenou = :Hauteurgenou, 
  L_taille_terre = :L_taille_terre, 
  Longeurtotale = :Longeurtotale 
  WHERE id = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'La fiche client est à jour';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>
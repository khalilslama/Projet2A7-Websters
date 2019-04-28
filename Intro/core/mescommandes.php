<?php
include "config.php";
$bdd = config::getConnexion();
  $requser = $bdd->prepare("SELECT nom,prenom,adresse,date_ev,date_prise,etat FROM commandes WHERE email='mohamed_aizderbel@outlook.fr'");
   $requser->execute();
   $user = $requser->fetchAll();
   
   $out=json_encode($user);
   
   
   
   
   
   
   


?>
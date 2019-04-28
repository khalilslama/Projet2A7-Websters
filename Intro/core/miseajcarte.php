<?php
include "config.php";
session_start();
$bdd = config::getConnexion();


   /*$verif = $bdd->prepare('SELECT * FROM carte WHERE Idclient=?');
   $verif->execute(array($_SESSION['Id']));
   $cart = $verif->fetch();
   if(empty($cart))
   	exit("cartenonactive");*/
   
   

   $requser = $bdd->prepare("SELECT email,etat,COUNT(id_cmd)'commande' FROM commandes WHERE etat='ok'  GROUP BY email HAVING email=?");
   $requser->execute(array($_SESSION['Email']));
   $user = $requser->fetch();
   if(empty($user))
    exit('aucunecommande');
   else
   { /*$points=$user['commande']*10;
     $verif = $bdd->prepare('SELECT * FROM carte WHERE Idclient=?');
     $verif->execute(array($_SESSION['Id']));
     $cart = $verif->fetch();
      if(!empty($cart))
      {$req = $bdd->prepare("UPDATE carte SET point = :p WHERE Idclient = :id");
                 $req->bindValue(':p',$points);
                 $req->bindValue(':id',$_SESSION['Id']);
                 $req->execute();
                 exit($points);}

       else 
       {
        exit('0');
       }*/

        $points=$user['commande']*10;
        exit(strval($points));



               }





   
?>
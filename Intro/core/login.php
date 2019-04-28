<?php
include "config.php";
   if(isset($_POST['Logi']))
  {
    session_start();
 
   $mail = htmlspecialchars($_POST['emaill_num']);
   $mdp = htmlspecialchars($_POST['mdpl']);
   

      
   if(!empty($_POST)) {
            $bdd = config::getConnexion();
        if(!ctype_digit($_POST['emaill_num']))
        { //*********************************Login par email
              $verif = $bdd->prepare('SELECT Id,Email,Nom,Prenom,Numero,avatar FROM client WHERE Email=? AND Mdp=?');
              $verif->execute(array($mail,$mdp));
              $user = $verif->fetch();
              if($user)
              {  
                $_SESSION['Id']=$user['Id'];
                $_SESSION['Email']=$user['Email'];
                $_SESSION['Nom']=$user['Nom'];
                $_SESSION['Prenom']=$user['Prenom'];
                $_SESSION['Numero']=$user['Numero'];
                $_SESSION['Avatar']=$user['avatar'];
                $erreur = array();
                exit('success');
              }
              else
              {
               $verif = $bdd->prepare('SELECT Email,Numero,Mdp FROM admin WHERE Email=? AND Mdp=?');
              $verif->execute(array($mail,$mdp));
              $admin = $verif->fetch();
                 if($admin)
               { $_SESSION['ad']='co'; 
                exit('back');
               }
              else
              {
                $erreur="Vérifiez vos Coordonnées";
              }
              }

            if(!empty($erreur))
              exit('erreur');
        }   
        else
        { //*******************************Login par numero

            $verif = $bdd->prepare('SELECT Id,Email,Nom,Prenom,Numero,avatar FROM client WHERE Numero=? AND Mdp=?');
              $verif->execute(array($mail,$mdp));
              $user = $verif->fetch();
              if($user)
              {
                $_SESSION['Id']=$user['Id'];
                $_SESSION['Email']=$user['Email'];
                $_SESSION['Nom']=$user['Nom'];
                $_SESSION['Prenom']=$user['Prenom'];
                $_SESSION['Numero']=$user['Numero'];
                $_SESSION['Avatar']=$user['avatar'];
                
                $erreur = array();
                exit('success');
                
              }
              else
              {
               $verif = $bdd->prepare('SELECT Email,Numero,Mdp FROM admin WHERE Numero=? AND Mdp=?');
              $verif->execute(array($mail,$mdp));
              $admin = $verif->fetch();
                 if($admin)
              { $_SESSION['ad']='co';
                $erreur = array();
                
                exit('back');

              }
              else
              {
                $erreur="Vérifiez vos Coordonnées";
              }

              }
              if(!empty($erreur))
              exit('erreur'); 
           }  

   }
   
 }
?>
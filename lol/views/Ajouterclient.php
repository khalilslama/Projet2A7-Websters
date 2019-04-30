<?php
include "../entities/client.php";
include "../core/clientR.php";

if(isset($_POST['Inscrip']))
{//$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '');
   $errors = array();
   $pseudo = htmlspecialchars($_POST['nom']);
   $pseudo2 = htmlspecialchars($_POST['prenom']);
   $mail = htmlspecialchars($_POST['email']);
   $num =  htmlspecialchars($_POST['numero']);
   $mdp = htmlspecialchars($_POST['mdp']);
   $mdp2 = htmlspecialchars($_POST['cmdp']);
   $mdplenght=strlen($mdp);
   $mdp2lenght=strlen($mdp2);
   $test = new ClientR();
   

   if(!empty($_POST)) {
             if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
             {
              $errors['email']="Votre Email n'est pas valide";

             }
             else{
              if(!$test->verifieremail($mail))
              	$errors['email']="Cet Email existe deja";
             }
             if(!ctype_digit($_POST['numero']))
             {
                $errors['numero']="Verifier votre numero";
             }
               else{
              if(!$test->verfiernumero($num))
              	$errors['numero']="Ce Numero existe deja";
               }
               if(!ctype_alpha($pseudo) OR strlen($pseudo)>20)
               {
                  $errors['nom']="votre nom est invalide";
               }
               if(!ctype_alpha($pseudo2) OR strlen($pseudo2)>30)
               {
                  $errors['prenom']="votre prenom est invalide";

               }
               if($mdplenght!=$mdp2lenght)
               {
                   $errors['pwd']="votre mot de passe de confirmation est incorrect";
               }
               else
               {
                   if($mdplenght<5)
                    $errors['pwd']="Il faut que votre mot de passe contient au moins 6 caractéres";
               }
               if(empty($errors))  
               {
                $Monclient = new Client($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['mdp'],$_POST['numero']);
                      $Monclientr = new ClientR();
                     //$Monclientr->ajouterClient($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['numero'],$_POST['mdp']);
                          $Monclientr->ajouter2($Monclient); 
                        
                          exit('success00');
                        	
                }
                      else
                        exit('eror');
   }
 }
?>
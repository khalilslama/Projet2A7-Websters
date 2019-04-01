<?php
 include "../core/clientR.php";
 session_start();
 $idclient=$_SESSION['Id'];
 $numero1=$_SESSION['Numero'];
 $email1=$_SESSION['Email'];
 $test = new ClientR();
 if(isset($_POST['bout']))
 {
    $name=$_POST['n'];
    $lastname=$_POST['p'];
    $numero=$_POST['Nu'];
    $email=$_POST['Em'];
             if( $email!=$_SESSION['Email'])
      { if(!filter_var($email,FILTER_VALIDATE_EMAIL))
             {
              $errors['email']="Votre Email n'est pas valide";
             }
             else{
              if(!$test->verifieremail($email))
                $errors['email']="Cet Email existe deja";
             }
           }
           if ($numero!=$_SESSION['Numero']) {
            
           
             if(!ctype_digit($numero))
             {
                $errors['numero']="Verifier votre numero";
             }
               else{
                 if(!$test->verfiernumero($numero))
                 $errors['numero']="Ce Numero existe deja";
                 }
             }
               if(!ctype_alpha($name) OR strlen($name)>20)
               {
                  $errors['nom']="votre nom est invalide";
               }
               if(!ctype_alpha($lastname) OR strlen($lastname)>30)
               {
                  $errors['prenom']="votre prenom est invalide";
               }

  // ************* debut update photo *****************
    if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])) {
   $tailleMax = 2097152;
   $extensionsValides = array('jpg', 'jpeg', 'png');
   if($_FILES['photo']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "Membreimg/".$idclient.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
         if($resultat) {
            $test->updateimg($idclient,$extensionUpload);
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
  }

   //**********************FIN****************************
                

                if(empty($errors) AND empty($msg)) {
                  $test->updateclient($name,$lastname,$email,$numero,$idclient);
                  header("Location:Profil.php");
               }
               else
               {
                  if(isset($msg)) {
                    
                    echo '<script language="javascript">';
                    echo 'alert("photo de profile incompatible")';
                    echo '</script>';
                    header("Location:Profil.php");
                  }
                  if(!empty($errors))
                  { 
                    echo '<script language="javascript">';
                    echo 'alert("Vérifiez vos coordonnées")';
                    echo '</script>';
                    header("Location:Profil.php");
                  }

                  
               }
               

 }

?>
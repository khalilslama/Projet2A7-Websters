<?php 
include "../../entities/collection-classe.php";
include "../../core/Collections.php";
 	if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
      $an=htmlspecialchars($_POST['an']);
      $nomcollection=htmlspecialchars($_POST['nomcollection']);
      $nomstyliste=htmlspecialchars($_POST['nomstyliste']);
   $tailleMax = 2097152;
   $extensionsValides = array('jpg','jpeg','png');
   if($_FILES['image']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "image/".$an.".".$extensionUpload;
         $image=$an.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
         if($resultat) {
               $newCollection = new Collection_classe($nomcollection,$nomstyliste,$an,$image);
               CollectionR::ajouterCollection($newCollection);
         } else {
            echo '<script>alert("Erreur durant l importation de votre photo de profil")</script>';
         }
      } else {
         echo '<script>alert("Votre photo de profil doit être au format jpg, jpeg, gif ou png")</script>';
      }
   } else {
      echo '<script>alert("Votre photo de profil ne doit pas dépasser 2Mo")';
   }
	}
   header("location:Collection-edit.php");
 ?>
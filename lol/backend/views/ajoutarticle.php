<?php
include "../../entities/article_classe.php";
include "../../core/Article.php";
include "PHPMailer/src/PHPMailer.php";
include "PHPMailer/src/Exception.php";
include "PHPMailer/src/SMTP.php";
 	if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
      if(isset($_POST['nouvellecollection']))
      {
         $nouvellecollection=1;
      }
      else
      {
         $nouvellecollection=0;
      }
      echo $nouvellecollection;
      $reference=htmlspecialchars($_POST['reference']);
      $nomarticle=htmlspecialchars($_POST['nomarticle']);
      $margedeprix=htmlspecialchars($_POST['margedeprix']);
      $margedage=htmlspecialchars($_POST['margedage']);
      $description=htmlspecialchars($_POST['description']);
      $idco=htmlspecialchars($_POST['select']);
   $tailleMax = 2097152;
   $extensionsValides = array('jpg','jpeg','png');
   if($_FILES['image']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "image/".$reference.".".$extensionUpload;
         $image=$reference.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
         if($resultat) {
               $newArticle = new article_classe($reference,$idco,$nomarticle,$description,$margedage,$margedeprix,$image,$nouvellecollection);
               ArticleR::ajouterArticle($newArticle);
               $increment=1;
               $sql='UPDATE collection set nbarticle=nbarticle + :increment WHERE idcollection=:id';
               $db = config::getConnexion();
        		$req=$db->prepare($sql);
        		$req->bindValue(':increment',$increment);
				$req->bindValue(':id',$idco);
            $req->execute();
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port= '465';
            $mail->SMTPAuth = true;
            $mail->Username = 'AKSWEBDEV@gmail.com';
            $mail->Password = 'd3zeeac6';
            $mail->SMTPSecure = 'ssl';
            $mail->From = 'AKSWEBDEV@gmail.com';
            $mail->FromName = 'Web Develloper Senior CEO Khalil';
            $mail->addAddress('ahmedkhalil.slama@esprit.tn', 'Clients');
            $mail->WordWrap = 50;
            $mail->IsHtml(true);
            $mail->Subject = 'Nouvel Article dans notre catalogue';
            $mail->Body = 'Chér client,<br>Nous avons désormais un nouvel article désingé '.$nomarticle.'.<br>Vous pouvez consulter notre catalogue dans <a href="http://localhost/site/front-end/website/Collection.php">ce lien</a>.';
            if($mail->Send())
            {
               echo 'Email sent!';
            }
         else
         {
            echo 'Error sending mail : '.$mail->ErrorInfo;
         }
         } else {
            echo '<script>alert("Erreur durant l importation de la photo")</script>';
         }
      } else {
         echo '<script>alert("la photo doit être au format jpg, jpeg, gif ou png")</script>';
      }
   } else {
      echo '<script>alert("la photo ne doit pas dépasser 2Mo")';
   }
	}
	header("location:product-edit.php");
?>
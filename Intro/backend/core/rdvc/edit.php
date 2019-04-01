<?php  
	require "../../PHPMailer/src/PHPMailer.php";
	require "../../PHPMailer/src/Exception.php";
	require "../../PHPMailer/src/SMTP.php";
	$connect = mysqli_connect("localhost", "root", "", "test");
	if(!empty($_POST["id"])&&(!empty($_POST["text"]))&&(!empty($_POST["column_name"])))
	{
		$id = $_POST["id"];  
		$text = $_POST["text"];  
		$column_name = $_POST["column_name"];  
		$sql = "UPDATE rdvc SET ".$column_name."='".$text."' WHERE idrdvc='".$id."'";  
		if(mysqli_query($connect, $sql))  
		{  
			echo 'Data Updated, ';
			try {
				$mail = new PHPMailer\PHPMailer\PHPMailer();
				$mail->IsSMTP();
				$mail->Host = 'smtp.gmail.com';
				$mail->Port= '465';
				$mail->SMTPAuth = true;
				$mail->Username = 'fares.amirhassan@esprit.tn';
				$mail->Password = 'YASSMINE14a';
				$mail->SMTPSecure = 'ssl';
				$mail->From = 'fares.amirhassan@esprit.tn';
				$mail->FromName = 'Web Develloper Fares';
				$mail->WordWrap = 50;
				$mail->IsHtml(true);
				$mail->Subject = 'Changement à propos de votre rendez vous';
				$mail->Body = 'La/Le '.$column_name.' de votre rendez-vous est désormais '.$text.' , si ce changement ne vous plais pas, veuillez nous le reporter via l`interface d`utilisateur dans notre site.<br>Merci pour votre comprehension.';
				$sql="SELECT idclient from rdvc where idrdvc='".$id."'";
				$result=mysqli_query($connect, $sql);  
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$idc=$row['idclient'];
				$sql="SELECT email from client WHERE id='".$idc."'";
				$result=mysqli_query($connect, $sql);  
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
				$email=$row['email'];
				echo $email;
				$mail->addAddress($email, 'Client');
				if($mail->Send())
				{
					echo 'Email sent!';
					if($column_name!='status')
					{
						$sql="UPDATE rdvc SET status = 'Non confirmé' WHERE idrdvc='".$id."'";
						$result=mysqli_query($connect, $sql);
					}
					
				}
				else
				{
					echo 'Error sending mail : '.$mail->ErrorInfo;
				}
			}
			catch (phpmailerException $e) {
  				echo $e->errorMessage(); //Pretty error messages from PHPMailer
			} catch (Exception $e) {
				echo $e->getMessage(); //Boring error messages from anything else!
			}
		}
		else
		{
			echo 'Failed to update data';
		}
	}
	else
	{
		echo 'Failed to update data';
	}
	
 ?>
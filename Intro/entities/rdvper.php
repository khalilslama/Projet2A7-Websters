<?php
	include "../../../core/config.php";
	require "../../../PHPMailer/src/PHPMailer.php";
	require "../../../PHPMailer/src/Exception.php";
	require "../../../PHPMailer/src/SMTP.php";
	class rdvprof{
		private $nom;
		private $prenom;
		private $telephone;
		private $email;
		private $region;
		private $localite;
		private $nivetud;
		private $daterdvprof;
		private $diplome;
		private $spec;
		private $adresse;
		private $piccv;
		private $status;
	
	function __construct($nom,$prenom,$telephone,$email,$region,$localite,$nivetud,$date,$diplome,$spec,$adresse,$piccv,$status)
	{
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->telephone=$telephone;
		$this->email=$email;
		$this->region=$region;
		$this->localite=$localite;
		$this->nivetud=$nivetud;
		$this->daterdvprof=$date;
		$this->diplome=$diplome;
		$this->spec=$spec;
		$this->adresse=$adresse;
		$this->piccv=$piccv;
		$this->status=$status;
	}
		
	function addrdvper()
	{
		$sql="insert into rdvprof(nom,prenom,telephone,email,region,localite,nivetud,date,diplome,spec,adresse,piccv,status)
			values(:nom,:prenom,:telephone,:email,:region,:localite,:nivetud,:date,:diplome,:spec,:adresse,:piccv,:status)";
		$db=config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			$nom=$this->nom;
			$prenom=$this->prenom;
			$telephone=$this->telephone;
			$email=$this->email;
			$region=$this->region;
			$localite=$this->localite;
			$nivetud=$this->nivetud;
			$date=$this->daterdvprof;
			$diplome=$this->diplome;
			$spec=$this->spec;
			$adresse=$this->adresse;
			$piccv=$this->piccv;
			$status=$this->status;
			$req->bindValue(':nom',$nom);
			$req->bindValue(':prenom',$prenom);
			$req->bindValue(':telephone',$telephone);
			$req->bindValue(':email',$email);
			$req->bindValue(':region',$region);
			$req->bindValue(':localite',$localite);
			$req->bindValue(':nivetud',$nivetud);
			$req->bindValue(':date',$date);
			$req->bindValue(':diplome',$diplome);
			$req->bindValue(':spec',$spec);
			$req->bindValue(':adresse',$adresse);
			$req->bindValue(':piccv',$piccv);
			$req->bindValue(':status',$status);
			$req->execute();
		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
	}
		
	function embauche($id,$email,$mdp)
	{
		$sql="UPDATE rdvprof SET status = 'Embauché' where idrdvprof = '".$id."'";
		$db=config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			$req->execute();
		}
		catch(Exception $e)
		{
			echo 'Erreur' .$e->getMessage();
		}
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
			$mail->addAddress($email, 'Employé');
			$mail->WordWrap = 50;
			$mail->IsHtml(true);
			$mail->Subject = 'Resultat du rendez-vous Professionel';
			$mail->Body = 'Vous avez étés embauchés! Votre mot de passe est : '.$mdp.' , Bienvenue!';
			if($mail->Send())
			{
				echo 'Email sent!';
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
	}
?>
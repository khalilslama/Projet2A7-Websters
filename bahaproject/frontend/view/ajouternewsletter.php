
<?php
include "../core/newsletterc.php";

if (isset($_GET['email']))
{
$email=$_GET['email'];



if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)){
   
    header('Location: index.html');

}
else{

$newsletter1=new newsletter($email,new \DateTime());

$newsletter1C=new newsletterc();
	$mes=$newsletter1C->ajouternewsletter($newsletter1);
	if($mes==true)
	{
		header('Location: index.html');
	}
}
}
else 
{
header('Location: index.html');

}












?>


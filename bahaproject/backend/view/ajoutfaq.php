<?php
include "../core/faqc.php";

if ((isset($_GET['reponse'])) and (isset($_GET['question']))) 
{

$reponse=$_GET['reponse'];
$question=$_GET['question'];

if ((!empty($_GET['reponse'])) and (!empty($_GET['question']))) 
{



$faq1=new faq($question,$reponse);

$faq1C=new faqc();
	$mes=$faq1C->ajouterfaq($faq1);
	if($mes==true)
	{
		header('Location: faqsback.php');
	}



}
else 
{
$message = "Vérifiez vos champs";
echo "<script type='text/javascript'>alert('$message');</script>";

}
}

?>
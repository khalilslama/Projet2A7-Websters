<?PHP
include "../core/faqc.php";
if (isset($_POST['modifier'])){
  $faqC=new faqC();
	$faqC->modifierfaq($_POST['question'],$_POST['reponse'],$_POST['id']);
	   header('Location: faqsback.php');

}
?>
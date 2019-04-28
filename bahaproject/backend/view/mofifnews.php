<?PHP
include "../core/newsletterc.php";
if (isset($_POST['modifier'])){
  $newsletterC=new newsletterc();
	$newsletterC->modifiernewsletter($_POST['email'],$_POST['id']);
	   header('Location: newsletterback.php');

}
?>
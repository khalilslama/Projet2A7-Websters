<?PHP
include "../core/blogc.php";
if (isset($_POST['modifier'])){
  $blogC=new blogC();
	$blogC->modifierblog($_POST['surnom'],$_POST['commentaire'],$_POST['id']);
	   header('Location: backblog.php');

}
?>
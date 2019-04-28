<?php 

include "../core/faqc.php";
$faq1C=new faqc();
if (isset($_POST["id"])){
$faq1C->supprimerfaq($_POST["id"]);
header('Location: faqsback.php');
}
?>
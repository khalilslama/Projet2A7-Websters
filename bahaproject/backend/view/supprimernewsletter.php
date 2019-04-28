<?php 

include "../core/newsletterc.php";
$newsletter1C=new newsletterc();
if (isset($_POST["id"])){
$newsletter1C->supprimernewsletter($_POST["id"]);
header('Location: newsletterback.php');
}
?>
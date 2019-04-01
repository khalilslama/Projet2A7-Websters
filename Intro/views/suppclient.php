<?php
include "../core/clientR.php";
if(isset($_POST['desa']))
{session_start();
$idsupp=$_SESSION['Id'];
$test = new ClientR();
$test->supprimerclient($idsupp);
session_destroy();
header("Location:../index.html");}
?>
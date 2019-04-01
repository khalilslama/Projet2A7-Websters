<?php
include "../entities/carte.php";
include "../core/carteR.php";
session_start();
$idclient=$_SESSION['Id'];
if (isset($_POST['act'])) {
	$test = new CarteR();
    $Myclient = new Carte($idclient);
    $test->ajoutercaret($Myclient);
    exit("activer");
}

?>
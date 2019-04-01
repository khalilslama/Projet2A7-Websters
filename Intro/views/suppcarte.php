<?php
include "../entities/carte.php";
include "../core/carteR.php";
session_start();
$idclient=$_SESSION['Id'];
if(isset($_POST['des'])) {
$test = new CarteR();
$Myclient = new Carte($idclient);
$test->suppcarte($Myclient);
exit("desactiver");
}
?>
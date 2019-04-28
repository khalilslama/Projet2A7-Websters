<?php
include "config.php";
session_start();
$bdd = config::getConnexion();
var_dump($_POST);
$req = $bdd->prepare("UPDATE carte SET point = :p WHERE Idclient = :id");
                 $req->bindValue(':p',$_POST['mise']);
                 $req->bindValue(':id',$_SESSION['Id']);
                 $req->execute();

?>
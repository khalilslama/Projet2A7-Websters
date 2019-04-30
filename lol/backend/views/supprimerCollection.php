<?php
	include "../../core/Collections.php";
	CollectionR::supprimerCollection($_POST['id']);
	header("location:Collection-list.php");
?>
<?php
	include "../../core/Collections.php";
	include "../../entities/collection-classe.php";
	
	$updatecol= new Collection_classe($_POST['nomcollection'],$_POST['nomstyliste'],$_POST['an'],"");
	$id=$_POST['id'];
	CollectionR::modifiercollection($updatecol,$id);
	header("location:Collection-list.php");
	
	
?>
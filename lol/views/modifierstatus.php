<?php
	include "../../core/Article.php";
	include "../../entities/article_classe.php";
	
	$updateArticle = new article_classe($_POST['reference'],"","","","","","",$_POST['collection']);
	$id=$_POST['id'];
	ArticleR::modifierstatus($updateArticle,$id);
	header("location:product-list.php");
?>
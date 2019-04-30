<?php
	include "../../core/Article.php";
	include "../../entities/article_classe.php";
	
	$updateArticle = new article_classe($_POST['reference'],$_POST['select'],$_POST['nomarticle'],$_POST['description'],$_POST['margedage'],$_POST['margedeprix'],"","");
	$id=$_POST['id'];
	ArticleR::modifierArticle($updateArticle,$id);
	header("location:product-list.php");
?>
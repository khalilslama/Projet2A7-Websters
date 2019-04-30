<?php
	include "../../core/Article.php";
	$query='';
	$query .= "SELECT * FROM article ";
if(isset($_POST["search"]["value"]))
{
 $query .= 'WHERE reference LIKE "%'.$_POST["search"]["value"].'%" OR nomarticle LIKE "%'.$_POST["search"]["value"].'%" OR margedeprix LIKE "%'.$_POST["search"]["value"].'%" OR margedage LIKE "%'.$_POST["search"]["value"].'%" OR description LIKE "%'.$_POST["search"]["value"].'%" ';
}
    $hi = new ArticleR();
    $hi->afficherArticleB($query);
?>
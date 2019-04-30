<?php
	include "../../core/Article.php";
	ArticleR::supprimerArticle($_POST['reference']);
	$id=$_POST['id'];
			   $increment=1;
               $sql='UPDATE collection set nbarticle=nbarticle - :increment WHERE idcollection=:id';
               $db = config::getConnexion();
        		$req=$db->prepare($sql);
        		$req->bindValue(':increment',$increment);
				$req->bindValue(':id',$id);
            $req->execute();
?>
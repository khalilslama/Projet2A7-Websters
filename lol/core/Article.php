<?PHP
require_once "../views/config.php";

class ArticleR {
	
	public static function ajouterArticle ($article_classe)
	{
        $reference=$article_classe->getRef();
        $idco=$article_classe->getIdco();
        $nomarticle=$article_classe->getNomArticle();
        $description=$article_classe->getDescription();
        $margedage=$article_classe->getMargeDage();
        $margedeprix=$article_classe->getMargedeprix();
        $image=$article_classe->getImage();
        $nouvellecollection=$article_classe->getnouvelle();
      	$bdd = config::getConnexion();
        $insertmbr = $bdd->prepare('INSERT INTO article (reference,idco,nomarticle,description,margedage,margedeprix,image,nouvellecollection) VALUES(?,?,?,?,?,?,?,?)');
        $insertmbr->execute(array($reference,$idco,$nomarticle,$description,$margedage,$margedeprix,$image,$nouvellecollection));
	}
	function affichernouvelleArticleF()
	{
		$path=$_SERVER['DOCUMENT_ROOT']."/site/core/MonPanier.php";
		$sql =  'SELECT * FROM article WHERE nouvellecollection = 1';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<div class="card">
				<div class="left">
					<img src="views/image/'.$row['image'].'">
				</div>
				<div class="right">
				<h2>'.$row['nomarticle'].'</h2>
					<div class="details">
					<h2>'.$row['nomarticle'].'</h2>
					<p>'.$row['description'].'</p>
					<button path="'.$path.'" pid="'.$row['reference'].'" id="product" style="float:right;"><i class="fas fa-cart-plus"></i></button>
				</div>
				</div>
			</div>'; 			
				}	
	}
	function afficherArticleF($idco)
	{
				$path=$_SERVER['DOCUMENT_ROOT']."/site/core/MonPanier.php";

		$sql =  'SELECT * FROM article WHERE idco = '.$idco.'';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<div class="card">
				<div class="left">
					<img src="../backend/views/image/'.$row['image'].'">
				</div>
				<div class="right">
				<h2>'.$row['nomarticle'].'</h2>
					<div class="details">
					<h2>'.$row['nomarticle'].'</h2>
					<p>'.$row['description'].'</p>
					<button path="'.$path.'" pid="'.$row['reference'].'" id="product" style="float:right;"><i class="fas fa-cart-plus"></i></button>
				</div>
				</div>
			</div>'; 			
				}	
	}
	function afficherArticleB()
	{
		$sql='SELECT * FROM article';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{ if($row['nouvellecollection']== 1)
                  {$row['nouvellecollection']='<button  value="'.$row['reference'].'" id="'.$row['reference'].'" class="pd-setting">Nouvelle Collection</button>';}
              else{$row['nouvellecollection']='<button value="'.$row['reference'].'" id="'.$row['reference'].'" class="ps-setting">Ancienne Collection</button>';}
					echo'<tr>
                                    <td><img src="image/'.$row['image'].'"></td>
                                    <td>'.$row['reference'].'</td>
                                    <td>
                                        '.$row['nomarticle'].'
                                    </td>
                                    <td>
                                    	'.$row['description'].'
                                    </td>
                                    <td>'.$row['margedage'].'</td>
                                    <td>'.$row['margedeprix'].'</td>
                                    <td>'.$row['nouvellecollection'].'</td>
                                    <td>
                                    <form method="POST" action="product-edit.php">
                                        <button type="submit" name="id" value="'.$row['reference'].'" id="'.$row['reference'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>    
                                    </td>
                                    <td>
                                    
                                    <button data-toggle="tooltip" name="'.$row['idco'].'" id="'.$row['reference'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    
                                    </td>	
                                    
                                        
                                </tr>';			
				}
				
	}
	public static function recupererArticle($id) 
	{
		$sql="SELECT * from article where reference=?";
		$db = config::getConnexion();
		try{
			$verif=$db->prepare($sql);
			$verif->execute(array($id));
		$liste=$verif->fetch();
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public static function supprimerArticle($id){
		$sql="DELETE FROM article where reference=:id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public static function modifierArticle($article_classe,$id){
		$sql="UPDATE article SET nomarticle = :nomarticle,description = :description, margedeprix = :margedeprix, margedage=:margedage,idco=:idco,reference=:reference WHERE reference = :id";
		
		$db = config::getConnexion();
	try{		
        $req=$db->prepare($sql);
        $reference=$article_classe->getRef();
        $idco=$article_classe->getIdco();
        $nomarticle=$article_classe->getNomArticle();
        $description=$article_classe->getDescription();
        $margedage=$article_classe->getMargeDage();
        $margedeprix=$article_classe->getMargedeprix();
		$req->bindValue(':nomarticle',$nomarticle);
		$req->bindValue(':id',$id);
		$req->bindValue(':margedeprix',$margedeprix);
		$req->bindValue(':margedage',$margedage);
		$req->bindValue(':idco',$idco);
		$req->bindValue(':description',$description);
		$req->bindValue(':reference',$reference);
		
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	public static function modifierstatus($article_classe,$id){
		$sql="UPDATE article SET nouvellecollection = :num WHERE reference = :id";
		
		$db = config::getConnexion();
	try{		
        $req=$db->prepare($sql);
        $num=$article_classe->getnouvelle();
		$req->bindValue(':id',$id);
		$req->bindValue(':num',$num);
		
            $s=$req->execute();
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
}
?>
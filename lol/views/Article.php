<?PHP
include "config.php";

class ArticleR {
	
	function ajouterArticle ($article_classe)
	{
        $nomcollection=$Collection_classe->getNomCollection();
		$nomstyliste=$Collection_classe->getNomStyliste();
		$an=$Collection_classe->getAn();
      	$image=$Collection_classe->getImage();
      	$bdd = config::getConnexion();
        $insertmbr = $bdd->prepare('INSERT INTO collection(nomcollection,nomstyliste,an,image) VALUES(?,?,?,?)');
        $insertmbr->execute(array($nomcollection,$nomstyliste,$an,$image));
	}
	function afficherArticleF($idco)
	{
		$sql =  'SELECT * FROM article WHERE idco = '.$idco.'';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<div class="card">
				<div class="left">
					<img src="image/'.$row['image'].'">
				</div>
				<div class="right">
				<h2>'.$row['nomarticle'].'</h2>
					<div class="details">
					<h2>'.$row['nomarticle'].'</h2>
					<p>'.$row['description'].'</p>
					<button style="float:right;"><i class="fas fa-cart-plus"></i></button>
				</div>
				</div>
			</div>'; 			
				}	
	}

	function afficherArticleB()
	{
		$sql =  'SELECT * FROM Collection ORDER BY an';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo'<tr>
                                    <td><img src="image/'. $row['image'] .'"></td>
                                    <td contenteditable>'.$row['nomcollection'].'</td>
                                    <td contenteditable>
                                        '.$row['nomstyliste'].'
                                    </td>
                                    <td contenteditable>
                                    	'.$row['an'].'
                                    </td>
                                    <td contenteditable>'.$row['nbarticle'].'</td>
                                    <td>
                                    <form method="POST" action="Collection-edit.php">
                                        <button type="submit" name="id" value="'.$row['idcollection'].'" id="'.$row['idcollection'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>    
                                    </td>
                                    <td><button data-toggle="tooltip" name="delete" id="'.$row['idcollection'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>	
                                    
                                        
                                </tr>';			
				}
				
	}
	public static function recupererArticle($id) 
	{
		$sql="SELECT * from collection where idcollection=?";
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
	function supprimerArticle($id){
		$sql="DELETE FROM collection where idcollection= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	public static function modifierArticle($Collection_classe,$id){
		$sql="UPDATE collection SET nomcollection = :nomcollection,nomstyliste = :nomstyliste, an = :an WHERE idcollection = :id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
        $nomcollection=$Collection_classe->getNomCollection();
		$nomstyliste=$Collection_classe->getNomStyliste();
		$an=$Collection_classe->getAn();
		$datas = array(':nomcollection'=>$nomcollection, ':nomstyliste'=>$nomstyliste, ':an'=>$an);
		$req->bindValue(':nomcollection',$nomcollection);
		$req->bindValue(':nomstyliste',$nomstyliste);
		$req->bindValue(':an',$an);
		$req->bindValue(':id',$id);
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
}
?>
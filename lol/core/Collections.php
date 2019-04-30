<?PHP
include "../views/config.php";
class CollectionR {
	
	function ajouterCollection ($Collection_classe)
	{
        $nomcollection=$Collection_classe->getNomCollection();
		$nomstyliste=$Collection_classe->getNomStyliste();
		$an=$Collection_classe->getAn();
      	$image=$Collection_classe->getImage();
      	$bdd = config::getConnexion();
        $insertmbr = $bdd->prepare('INSERT INTO collection(nomcollection,nomstyliste,an,image) VALUES(?,?,?,?)');
        $insertmbr->execute(array($nomcollection,$nomstyliste,$an,$image));
	}
	function afficherCollectionF()
	{
		$sql =  'SELECT * FROM collection ORDER BY an';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<div class="swiper-slide">
				<div class="swiper-image">
					<button classe="idco" onclick="showpic(this.id)"; style="border:none;background-color:transparent;" type="submit" name="send" id="'.$row['idcollection'].'" value="'.$row['idcollection'].'"><img src="../backend/views/image/'. $row['image'] .'"></button>
				</div>
			</div>'; 			
				}

		
	}	
	function afficherCollectionB($search,$order)
	{
		$sql =  "SELECT * FROM Collection";
		if(!empty($search))
		{
		$sql .= " WHERE nomcollection like '".$search."%'";
		}
		if(!empty($order))
		{
			$sql .= " ORDER BY ".$order."";
		}
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo'<tr>
                                    <td><img src="image/'. $row['image'] .'"></td>
                                    <td>'.$row['nomcollection'].'</td>
                                    <td>
                                        '.$row['nomstyliste'].'
                                    </td>
                                    <td>
                                    	'.$row['an'].'
                                    </td>
                                    <td>'.$row['nbarticle'].'</td>
                                    <td>
                                    <form method="POST" action="Collection-edit.php">
                                        <button type="submit" name="id" value="'.$row['idcollection'].'" id="'.$row['idcollection'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>    
                                    </td>
                                    <td><button data-toggle="tooltip" name="delete" id="'.$row['idcollection'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                </tr>';			
				}
				$sql="";
				
	}
	public static function recupererCollection($id) 
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
	function supprimerCollection($id){
		$sql="DELETE FROM collection where idcollection= :id";
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
	public static function modifiercollection($Collection_classe,$id){
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
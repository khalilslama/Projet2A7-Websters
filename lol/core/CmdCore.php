<?PHP
include "../../config/config.php";
class CmdCore {
function afficherCmd ($CMD){
		
		$sql =  'SELECT * FROM commande WHERE email = '.$email.'';
		$db = config::getConnexion();
				foreach  ($db->query($sql) as $row)
				{
					echo '<div class="card">
				<div class="right">
				<h2>'.$row['email'].'</h2>
					<div class="details">
					<h2>'.$row['email'].'</h2>
					<p>'.$row['date_prise'].'</p>
				</div>
				</div>
			</div>'; 			
				}	
	}
	
	public static function ajouterCmd($CMD){
		$sql="INSERT INTO `commande` (`nom`,`prenom`,`email`,`num`,`adresse`,`date_ev`,`date_prise`) VALUES ( :nom,:prenom,:email,:num,:adresse,:date_ev,:date_prise)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $nom=$CMD->getNom();
        $prenom=$CMD->getPrenom();
        $email=$CMD->getEmail();
        $adresse=$CMD->getAdresse();
        $num=$CMD->getNum();
        $date_ev=$CMD->getDateEv();
        $date_prise=$CMD->getDateP();
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':num',$num);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':date_ev',$date_ev);
		$req->bindValue(':date_prise',$date_prise);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherCmds(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From commande";
		$db = config::getConnexion();
		foreach  ($db->query($sql) as $row)
				{
					echo'<tr>
                                    
                                    <td>'.$row['id_cmd'].'</td>
                                    <td>'.$row['nom'].'</td>
                                    <td>
                                        '.$row['prenom'].'
                                    </td>
                                    <td>
                                    	'.$row['email'].'
                                    </td>
                                    <td>'.$row['num'].'</td>
                                    <td>'.$row['adresse'].'</td>
                                    <td>'.$row['date_ev'].'</td>
                                    <td>'.$row['date_prise'].'</td>
                                    <td>
                                    <form method="POST" action="product-edit.php">
                                        <button type="submit" name="id" value="'.$row['email'].'" id="'.$row['email'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>    
                                    </td>
                                    <td>
                                    
                                    <button data-toggle="tooltip" name="'.$row['id_cmd'].'" id="'.$row['id_cmd'].'" style=" padding: 5px 10px;font-size: 14px;border-radius: 3px;border: 1px solid rgba(0,0,0,.12);background: #152036;" class="delete"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    
                                    </td>	
                                    
                                        
                                </tr>';			
				}
	
			
	}
	function supprimerCmd($email){
		$sql="DELETE FROM commande where email= :email";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':email',$email);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierCmd($cmd,$email){
		$sql="UPDATE commande SET date_prise=:date_pris WHERE email=:email";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$date_pris=$CMD->getDateP();
		$req->bindValue(':date_pris',$date_pris);
				
            $s=$req->execute();
			
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercmd($email){
		$sql="SELECT * from commande where email=$email";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	/*function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}*/
}

?>
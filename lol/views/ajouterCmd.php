<?PHP
include "../../entities/CMD.php";
include "../../core/CmdCore.php";

if (isset($_POST['nom']) and isset($_POST['prenom']) and isset($_POST['email']) and isset($_POST['num']) and isset($_POST['adresse']) and isset($_POST['date_ev']) and isset($_POST['date_prise']))
{
$commande=new CMD('',$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['num'],$_POST['adresse'],$_POST['date_ev'],$_POST['date_prise']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$CmdCore1=new CmdCore();
$CmdCore1->ajouterCmd($commande);
header('Location: panier.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>
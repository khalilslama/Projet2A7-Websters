<?PHP
include "../core/reclamationc.php";

if (isset($_POST['modifier'])){
   $reclamationc=new reclamationc();
    $reclamationc->modifierrec1($_POST['sujet'],$_POST['description'],$_POST['id']);
    header('Location: afficherreclamation.php');

}
?>
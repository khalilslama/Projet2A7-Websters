<?php

//fetch_single.php

include('database_connection.php');

if(isset($_GET["id"]))
{
 $query = "SELECT * FROM client WHERE Id = '".$_GET["id"]."'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '<div class="row">';
 foreach($result as $row)
 {
  /*$images = '';
  if($row["images"] != '')
  {
   $images = '<img src="images/'.$row["images"].'" class="img-responsive img-thumbnail" />';
  }
  else
  {
   $images = '<img src="https://www.gravatar.com/avatar/38ed5967302ec60ff4417826c24feef6?s=80&d=mm&r=g" class="img-responsive img-thumbnail" />';
  }*/
  $output .= '
  <div class="col-md-9">
   <br />
   <p><label>Nom :&nbsp;</label>'.$row["Nom"].'</p>
   <p><label>Prénom :&nbsp;</label>'.$row["Prenom"].'</p>
   <p><label>Email :&nbsp;</label>'.$row["Email"].'</p>
   <p><label>Numero :&nbsp;</label>'.$row["Numero"].'</p>
   <p><label>Date de creation :&nbsp;</label>'.$row["DatCreation"].'</p>
   <p><label>Tourpoitrine :&nbsp;</label>'.$row["Tourpoitrine"].'</p>
   <p><label>tourtaille :&nbsp;</label>'.$row["tourtaille"].'</p>
   <p><label>tourbassin :&nbsp;</label>'.$row["tourbassin"].'</p>
   <p><label>L_taille :&nbsp;</label>'.$row["L_taille"].'</p>
   <p><label>H_poitrine :&nbsp;</label>'.$row["H_poitrine"].'</p>
   <p><label>E_poitrine :&nbsp;</label>'.$row["E_poitrine"].'</p>
   <p><label>Carruredos :&nbsp;</label>'.$row["Carruredos"].'</p>
   <p><label>Carruredevant :&nbsp;</label>'.$row["Carruredevant"].'</p>
   <p><label>L_epaule :&nbsp;</label>'.$row["L_epaule"].'</p>
   <p><label>Grosseurbras :&nbsp;</label>'.$row["Grosseurbras"].'</p>
   <p><label>Tourpoignet :&nbsp;</label>'.$row["Tourpoignet"].'</p>
   <p><label>Hauteurgenou :&nbsp;</label>'.$row["Hauteurgenou"].'</p>
   <p><label>L_taille_terre :&nbsp;</label>'.$row["L_taille_terre"].'</p>
   <p><label>Longeurtotale :&nbsp;</label>'.$row["Longeurtotale"].'</p>
  </div>
  </div><br/>
  ';
 }
 echo $output;
}

?>
<?php

//fetch.php

include('database_connection.php');

$query = '';
$output = array();

$query .= "SELECT carte.DateActivation,client.Nom,client.Prenom,client.Email,client.Numero 
FROM carte 
INNER JOIN client 
ON(carte.Idclient=client.Id)";
if(isset($_POST["search"]["value"]))
{
 /*$query .= 'WHERE Nom LIKE "%'.$_POST["search"]["value"].'%" OR Prenom LIKE "%'.$_POST["search"]["value"].'%" OR Email LIKE "%'.$_POST["search"]["value"].'%" OR Numero LIKE "%'.$_POST["search"]["value"].'%"';*/
 $query .= " 
  WHERE carte.DateActivation LIKE '%".$_POST["search"]["value"]."%'
  OR client.Nom LIKE '%".$_POST["search"]["value"]."%' 
  OR client.Prenom LIKE '%".$_POST["search"]["value"]."%' 
  OR client.Email LIKE '%".$_POST["search"]["value"]."%' 
  OR client.Numero LIKE '%".$_POST["search"]["value"]."%'
 ";

}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY carte.Id DESC ';
}


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 
 $sub_array[] = $row["Nom"];
 $sub_array[] = $row["Prenom"];
 $sub_array[] = $row["Email"];
 $sub_array[] = $row["Numero"];
 $sub_array[] = $row["DateActivation"];
 
 
 
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT carte.DateActivation,client.Nom,client.Prenom,client.Email,client.Numero
  FROM carte 
  INNER JOIN client 
  ON(carte.Idclient=client.Id)");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($connect),
 "data"    => $data
);
echo json_encode($output);
?>
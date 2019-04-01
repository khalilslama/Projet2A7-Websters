<?php

//fetch.php

include('database_connection.php');

$query = '';
$output = array();

$query .= "SELECT * FROM client";
if(isset($_POST["search"]["value"]))
{
 /*$query .= 'WHERE Nom LIKE "%'.$_POST["search"]["value"].'%" OR Prenom LIKE "%'.$_POST["search"]["value"].'%" OR Email LIKE "%'.$_POST["search"]["value"].'%" OR Numero LIKE "%'.$_POST["search"]["value"].'%"';*/
 $query .= " 
  WHERE Nom LIKE '%".$_POST["search"]["value"]."%'
  OR Prenom LIKE '%".$_POST["search"]["value"]."%' 
  OR Email LIKE '%".$_POST["search"]["value"]."%' 
  OR Numero LIKE '%".$_POST["search"]["value"]."%' 
  OR DatCreation LIKE '%".$_POST["search"]["value"]."%'
 ";

}
if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY Id DESC ';
}
if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
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
 $sub_array[] = $row["Numero"];
 $sub_array[] = $row["DatCreation"];
 $sub_array[] = '<button type="button" name="view" id="'.$row["Id"].'" class="btn btn-primary btn-xs view">View</button>';
 $sub_array[] = '<button type="button" name="update" id="'.$row["Id"].'" class="btn btn-warning btn-xs update">Update</button>';
 $sub_array[] = '<form action="../entities/file.php" method="POST" target="_blank"><button type="submit" name="genererpdf" value="'.$row["Id"].'" id="'.$row["Id"].'" class="btn btn-danger btn-xs pdf">PDF</button></form>';
 
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM client");
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
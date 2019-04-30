<?php  
$connect = mysqli_connect("localhost", "root", "", "test");
$sql = "insert into rdvprof(nom,prenom,telephone,email,region,localite,nivetud,date,diplome,spec,adresse,status) VALUES('".$_POST["nom"]."', '".$_POST["prenom"]."','".$_POST["telephone"]."','".$_POST["email"]."','".$_POST["region"]."','".$_POST["localite"]."','".$_POST["nivetud"]."','".$_POST["date"]."','".$_POST["diplome"]."','".$_POST["spec"]."','".$_POST["adresse"]."','".$_POST["status"]."')";
if(mysqli_query($connect, $sql))
{
	echo "Data added";
}
 ?>
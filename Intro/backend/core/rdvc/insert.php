<?php  
$connect = mysqli_connect("localhost", "root", "", "test");
$sql = "insert into rdvc(idclient,date,type,status) VALUES('".$_POST["idclient"]."', '".$_POST["date"]."','".$_POST["type"]."','".$_POST["status"]."')";
if(mysqli_query($connect, $sql))
{
	echo "Data added";
}
 ?>
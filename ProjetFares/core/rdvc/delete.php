<?php  
	$connect = mysqli_connect("localhost", "root", "", "2a7");
	if(!empty($_POST["id"]))
	{
		$sql = "DELETE FROM rdvc WHERE idrdvc = '".$_POST["id"]."'";  
		if(mysqli_query($connect, $sql))  
		{  
			echo 'Data Deleted';  
		}
	}
	else
	{
		echo 'Failed to delete, ID = '.$_POST["id"].'';
	}
 ?>
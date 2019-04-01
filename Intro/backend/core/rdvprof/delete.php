<?php  
	$connect = mysqli_connect("localhost", "root", "", "test");
	if(!empty($_POST["id"]))
	{
		$sql = "DELETE FROM rdvprof WHERE idrdvprof = '".$_POST["id"]."'";  
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
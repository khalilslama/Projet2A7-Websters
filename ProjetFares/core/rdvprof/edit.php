<?php  
	$connect = mysqli_connect("localhost", "root", "", "2a7");
	if(!empty($_POST["id"])&&(!empty($_POST["text"]))&&(!empty($_POST["column_name"])))
	{
		$id = $_POST["id"];  
		$text = $_POST["text"];  
		$column_name = $_POST["column_name"];  
		$sql = "UPDATE rdvprof SET ".$column_name."='".$text."' WHERE idrdvprof='".$id."'";  
		if(mysqli_query($connect, $sql))  
		{  
			echo 'Data Updated';  
		}
		else
		{
			echo 'Failed to update data';
		}
	}
	else
	{
		echo 'Failed to update data';
	}
	
 ?>
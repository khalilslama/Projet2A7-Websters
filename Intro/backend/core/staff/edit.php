<?php  
	$connect = mysqli_connect("localhost", "root", "", "test");
	if(!empty($_POST["id"])&&(!empty($_POST["text"]))&&(!empty($_POST["column_name"])))
	{
		$id = $_POST["id"];  
		$text = $_POST["text"];  
		$column_name = $_POST["column_name"];  
		$sql = "UPDATE staff SET ".$column_name."='".$text."' WHERE idstaff='".$id."'";  
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
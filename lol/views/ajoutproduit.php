<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'najehhautecouture';
	
 $base = new PDO(‘mysql:host=localhost; dbname=najehhautecouture’,‘root’, ”);
mysql_connect( $db_host, $db_username, $db_password) or die(mysql_error());
mysql_select_db($db_name); 

	if(isset($_POST['Nomproduit']))
	$Nomproduit =;
	$Titreproduit = $_POST['Titreproduit'];
	$Descriptionproduit = $_POST['Descriptionproduit'];
mysql_query("INSERT INTO `collection` (nom,titre,description) VALUES ('$Nomproduit', '$Titreproduit','Descriptionproduit'"); 
    or die(mysql_error());  

?>
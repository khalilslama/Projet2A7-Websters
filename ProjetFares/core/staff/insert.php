<?php  
$connect = mysqli_connect("localhost", "root", "", "2a7");
$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array(); //remember to declare $pass as an array
$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
}
$mdp = implode($pass);
$sql = "insert into staff(nom,prenom,telephone,email,mdp) VALUES('".$_POST["nom"]."', '".$_POST["prenom"]."','".$_POST["telephone"]."','".$_POST["email"]."','".$mdp."')";
echo $sql;
if(mysqli_query($connect, $sql))
{
	echo "Data added";
}
else
{
	echo " has failed";
}
 ?>
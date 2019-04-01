<?php
if(isset($_POST['dec'])) {
	session_start();
    session_destroy();
    header('Location:../index.html');
}

?>
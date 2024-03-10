<?php
	$conn = new mysqli("localhost","root","","web-gioi-thieu-phong-tro");

	if ($conn -> connect_errno) {
    	echo "Failed to connect to MySQL: " . $conn -> connect_error;
    	exit();
	}else{
    	// echo "Connect Success";
	}
?>
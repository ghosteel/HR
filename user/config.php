<?php
	//Подкючение к БД
	$conn = mysqli_connect('localhost', 'root', '', 'HumanResources');
	mysqli_query($conn, "SET NAMES 'utf8'")
?>
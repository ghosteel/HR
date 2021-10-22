<?php
session_start();
include('../config.php');
?>
<html lang="ru">
<head>
	<!--МЕТА Запросы!!!-->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<!--Шрифты!!!-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!--Стили!!!-->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/basic.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="SHORTCUT ICON" href="images/favicon.png" type="image/x-icon">
	<title>ManagementCompany</title>
	</head>
<body>
<header class="header">
	<div class="header-top">
		<div class="logo">
			<a href="#">
				<h5>Management</h5>
				<span>Company</span>
			</a>
		</div>
		<div class="nav">
			<ul>
				<li><a href="mainAdmin.php">Главная</a></li>
				<li><a href="client.php">Управление клиентами</a></li>
				<li><a href="product.php">Управление услугами</a></li>
				<li><a href="order.php">Управление заказами</a></li>
				<li><a href="search.php">Поиск по сайту</a></li>
			</ul>
		</div>
		<div class="reg">
			<li><a href="../index.php?exit">Выход</a></li>
		</div>
</div>
</header>

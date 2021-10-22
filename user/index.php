<?php
session_start();
include('config.php');
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
			<a href="index.php">
				<h5>Management</h5>
				<span>Company</span>
			</a>
		</div>
		<div class="nav">
			<ul>
				<li><a href="index.php">Главная</a></li>
				<li><a href="products.php">Услуги</a></li>
				<li><a href="order.php">Мои заказы</a></li>
				<li><a href="about.php">О нас</a></li>

			</ul>
		</div>
		<div class="reg">
			<li><a href="../index.php?exit">Выход</a></li>
		</div>
</div>
<div class="text-block"><h1>Добро пожаловать на сайт компании Management Company<br><a href="#main">Услуги</a></h1></div>
</header>
<?php
 include ('section.php');
?>
<?php
	include ('footer.php');
?>



<?php
$client = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM client WHERE id_user = "'.$_GET['id'].'"'));

$_SESSION['id_client'] = $client['id'];
?>
</body>
</html>

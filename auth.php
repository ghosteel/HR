<?php
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
				<li><a href="about.php">О нас</a></li>
			</ul>
		</div>
		<div class="reg">
<i class="fa fa-user"></i><a class="reg-link" href="auth.php">Войти в систему</a>
		</div>
</div>
<div class="login-page">
<div class="form">
	<form class="register-form" method="POST">

		<p>
			<p>Ваше Имя:</p><br>
		<input type="text" required name="name" placeholder="Имя"></p>
		</p>

		<p>
			<p>Ваша Фамилия:</p><br>
		<input type="text" required name="family" placeholder="Фамилия"></p>
		</p>

		<p>
			<p>Ваше Отчество:</p><br>
			<input type="text"name="patronymic"placeholder="Отчество">
		</p>

		<p>
			<p>Ваш логин:</p><br>
			<input type="text" required name="login" placeholder="Логин"></p>

		</p>

		<p>
			<p>Ваш Email:</p><br>
			<input type="email"required name="email"placeholder="Email">
		</p>

		<p>
			<p>Придумайте пароль:</p><br>
			<input type="password"required name="pass"placeholder="Пароль">
		</p>

		<p>
			<p>Повторите пароль:</p><br>
		<input type="password" required name="returnPass" placeholder="Повторите пароль"></p>
		</p>
<br>
	<p>
		<button type="submit"name="do_reg">Зарегистрироваться</button>
	</p>
	 <p class="message">Уже есть аккаунт? <a href="#">Авторизоваться!</a></p>
	</form>
<form class="login-form"method="POST">

<p>
<p>Логин:</p><br>
<input type="text"name="login"placeholder="Логин">
</p>

<p>
<p>Пароль:</p><br>
<input type="password"name="password"placeholder="Пароль">
</p>
<br>
<p>
<button type="submit"name="do_auth"value="Авторизоваться">Авторизоваться в системе</button>
 <p class="message">Нет аккаунта? <a href="#">Зарегистрироваться!</a></p>
</p>
</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
$('.message a').click(function(e){
e.preventDefault();
$('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});
</script>
<?php
//Авторизация
	if (isset($_POST['do_auth'])) {
	if(empty($_POST['login']) OR empty($_POST['password'])) {
	echo "<script>alert('Необходимо заполнить пустые поля');</script>";
	}
	else
	{
		$query = mysqli_query($conn, 'SELECT * FROM `users` WHERE `login` = "'.$_POST['login'].'" AND `pass` = "'.$_POST['password'].'"');
		$result = mysqli_fetch_array($query);
		if (empty($result['id'])) {
			echo "<script>alert('Неверный логин или пароль');</script>";

		} else {
			echo "<script>alert('Вы успешно авторизованы');</script>";
			$idUser = $result['id'];
			if($result['role'] == "admin")
{
echo '<script>location.href="admin/mainAdmin.php"</script>';
}
else
{
echo '<script>location.href="user/index.php?id='.$result['id'].'"</script>';
}
			}
		}
	}
?>


<?php
// Регистрация
if (isset($_POST['do_reg']))
{
$login = $_POST['login'];
$pass = $_POST['pass'];
$returnPass = $_POST['returnPass'];
$reg = mysqli_query($conn, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$result = mysqli_fetch_array($reg);
if (empty($result['id']))
{
if($pass == $returnPass)
{
mysqli_query($conn, "INSERT INTO `users` (login, pass, role) VALUES ('$login', '$pass', 'user')");
$query_users = mysqli_query($conn, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$result_users = mysqli_fetch_array($query_users);
mysqli_query($conn, 'INSERT INTO `client` SET family="'.$_POST['family'].'", name="'.$_POST['name'].'", patronymic="'.$_POST['patronymic'].'",email="'.$_POST['email'].'", id_user="'.$result_users['id'].'"');
echo "<script>alert('Регистрация прошла успешно');</script>";
echo '<script>location.href="auth.php"</script>';
}
else
{
echo "<script>alert('Введенные пароли не совпадают');</script>";
echo '<script>location.href="auth.php"</script>';
}
}
else
{
echo "<script>alert('Данный пользователь уже зарегистрирован');</script>";
echo '<script>location.href="auth.php"</script>';
}
}
?>
</header>

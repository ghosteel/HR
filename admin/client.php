<?php
	include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM users');
?>
<h2 class="company_service">Список клиентов</h2>
<center>
<table width="75%">
<tr>
	<th>Код клиента</th>
	<th>ФИО</th>
	<th>Логин</th>
	<th>Пароль</th>
	<th>Роль</th>
</tr>
<?php
//Добавление
echo'<form method="POST">';
echo'<tr>';
	echo'<td></td>';
	echo'<td></td>';
	echo'<td></td>';
	echo'<td></td>';
	echo'<td></td>';
	echo'<td></td>';
	echo'<td></td>';
	echo'<td><input type="submit" name="add" value="Добавить клиента"></td>';
echo'</tr>';
echo'</form>';
while ($result = mysqli_fetch_array($query)) {
	$client = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM client WHERE id_user = "'.$result['id'].'"'));
	echo'<form method="POST">';
	echo'<tr align="center">';
		echo'<td><input name="id" value="'.$result['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;"></td>';
		echo'<td>'.$client['family'].' '.$client['name'].' '.$client['patronymic'].'</td>';
		echo'<td>'.$result['login'].'</td>';
		echo'<td>'.$result['pass'].'</td>';
		if($result['role'] == 'admin') {
		echo'<td>Администратор</td>'; }
		else {
			echo'<td>Пользователь</td>'; }
		echo'<td><input type="submit" name="edit" value="Редактировать данные о клиенте"></td>';
		echo'<td><input type="submit" name="del" value="Удалить клиента"></td>';
	echo'</tr>';
	echo'</form>';
}
?>
</table>
</center>
<?php
//Добавление
if(isset($_POST['add'])) {
$_SESSION['add_client'] = "add";
echo '<script>location.href="client.php"</script>';
}
//Редактирование
if(isset($_POST['edit'])) {
$_SESSION['edit_client'] = $_POST['id'];
echo '<script>location.href="client.php"</script>';
}
//Удаление
if(isset($_POST['del'])) {
	mysqli_query($conn, 'DELETE FROM `client` WHERE id_user="'.$_POST['id'].'"');
	mysqli_query($conn, 'DELETE FROM `users` WHERE id="'.$_POST['id'].'"');
	echo "<script>alert('Клиент успешно удален');</script>";
	echo '<script>location.href="client.php"</script>';
}
?>
<?php
//Добавление
if(!empty($_SESSION['add_client'])) {
echo'<hr style="margin-top:20px;"><h2 style="margin-left:20px;">Добавление клиента</h2><hr><br>';
echo'<form method="POST">';
echo '<div class="main123" style="margin-bottom:10px;margin-left:30%;margin-right:10px;">';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Фамилия</label></b>';
echo'<input type="text" name="family" required style="width: 200px;" maxlength="50"></textarea>';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Имя</label></b>';
echo'<input type="text" name="name" required style="width: 200px;" maxlength="50">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Отчество</label></b>';
echo'<input type="text" name="patronymic" required style="width: 200px;" maxlength="50">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Email</label></b>';
echo'<input type="text" name="Email" required style="width: 200px;" maxlength="50" value="'.$result_client['family'].'"></textarea>';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Логин</label></b>';
echo'<input type="text" name="login" required style="width: 200px;" maxlength="50">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Пароль</label></b>';
echo'<input type="text" name="pass" required style="width: 200px;" maxlength="50">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Роль</label></b>';
echo '<select name="role"><option value="admin">Администратор</option><option selected value="user">Пользователь</option></select>';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;">';
echo '<input type="submit" name="add_client" style="width:130px;height:25px;font-weight:bold;margin-left:160px" value="Добавить">';
echo '</div>';

echo '</div>';
echo'</form>';
}
?>

<?php
//Редактирование
if(!empty($_SESSION['edit_client'])) {
$result_users = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM users WHERE id = "'.$_SESSION['edit_client'].'"'));
$result_client = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM client WHERE id_user = "'.$result_users['id'].'"'));
echo'<hr style="margin-top:20px;"><h2 style="margin-left:20px;">Редактирование клиента</h2><hr><br>';
	echo'<form method="POST">';
	echo '<div class="main123" style="margin-bottom:10px;margin-left:30%;margin-right:10px;">';

	echo '<div class="field" style="margin-top:10px;margin-bottom:10px;">';
	echo'<b><label>Код клиента</label></b>';
	echo'<input name="id_user" value="'.$result_users['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;">';
	echo '</div>';

	echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Фамилия</label></b>';
echo'<input type="text" name="family" required style="width: 200px;" maxlength="50" value="'.$result_client['family'].'"></textarea>';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Имя</label></b>';
echo'<input type="text" name="name" required style="width: 200px;" maxlength="50" value="'.$result_client['name'].'">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Отчество</label></b>';
echo'<input type="text" name="patronymic" required style="width: 200px;" maxlength="50" value="'.$result_client['family'].'"></textarea>';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Email</label></b>';
echo'<input type="text" name="Email" required style="width: 200px;" maxlength="50" value="'.$result_client['family'].'"></textarea>';
echo '</div>';

	echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Логин</label></b>';
echo'<input type="text" name="login" required style="width: 200px;" maxlength="50" value="'.$result_users['login'].'">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Пароль</label></b>';
echo'<input type="text" name="pass" required style="width: 200px;" maxlength="50" value="'.$result_users['pass'].'">';
echo '</div>';

echo '<div class="field" style="margin-bottom:10px;margin-top:10px;">';
echo'<b><label>Роль*</label></b>';
if($result_users['role'] == "admin") {
echo '<select name="role"><option selected value="admin">Администратор</option><option  value="user">Пользователь</option></select>';
}
else {
	echo '<select name="role"><option value="admin">Администратор</option><option selected value="user">Пользователь</option></select>';
}
echo '</div>';

	echo '<div class="field"style="padding-bottom:10px;">';
	echo'<input type="submit" name="save_client" style="width:130px;height:25px;" value="Сохранить">';
	echo '</div>';

	echo '<div class="field"style="padding-bottom:10px;">';
	echo'<input type="submit" name="del_client" style="width:130px;height:25px;" value="Удалить">';
	echo '</div>';

	echo '</div>';
	echo'</form>';
}
?>

<?php
//Добавление
if(isset($_POST['add_client'])) {
	$login = $_POST['login'];
$pass = $_POST['pass'];
$role = $_POST['role'];
$reg = mysqli_query($conn, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$result = mysqli_fetch_array($reg);
	if(empty($result['id']))
	{
mysqli_query($conn, "INSERT INTO `users` (login, pass, role) VALUES ('$login', '$pass', '$role')");
$query_users = mysqli_query($conn, "SELECT `id` FROM `users` WHERE `login` = '$login' AND `pass` = '$pass'");
$result_users = mysqli_fetch_array($query_users);
mysqli_query($conn, 'INSERT INTO `client` SET family="'.$_POST['family'].'", name="'.$_POST['name'].'",patronymic="'.$_POST['patronymic'].'",email="'.$_POST['email'].'", id_user="'.$result_users['id'].'"');
		echo "<script>alert('Клиент успешно добавлен');</script>";
		unset($_SESSION['add_client']);
		echo '<script>location.href="client.php"</script>';
	}
	else
	{
		echo "<script>alert('Данный пользователь уже есть в базе данных');</script>";
		echo '<script>location.href="client.php"</script>';
	}
}
//Редактирование
if(isset($_POST['save_client'])) {
mysqli_query($conn, 'UPDATE `users` SET login="'.$_POST['login'].'", pass="'.$_POST['pass'].'", role="'.$_POST['role'].'" WHERE id = "'.$_SESSION['edit_client'].'"');
	mysqli_query($conn, 'UPDATE client SET family="'.$_POST['family'].'", name="'.$_POST['name'].'", patronymic="'.$_POST['patronymic'].'"  WHERE id_user="'.$_SESSION['edit_client'].'"');
	echo "<script>alert('Клиент успешно сохранен');</script>";
	unset($_SESSION['edit_client']);
	echo '<script>location.href="client.php"</script>';

}
//Удаление
if(isset($_POST['del_client'])) {
	mysqli_query($conn, 'DELETE FROM `clients` WHERE id="'.$_SESSION['edit_client'].'"');
	echo "<script>alert('Клиент успешно удален');</script>";
	unset($_SESSION['edit_client']);
	echo '<script>location.href="client.php"</script>';
}
?>
<?php
include ('footer.php');
?>
</body>
</html>

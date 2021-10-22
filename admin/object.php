<?php
	include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM object');
?>
<hr><h2 style="margin-left:20px;">Список объектов</h2><hr><br>

<table border="1" style="text-align: center;" width="100%">
<tr>
	<td>Код объекта</td>
	<td>Наименование</td>
	<td>Стоимость (руб.)</td>
</tr>
<?php
echo'<form method="POST">';
echo'<tr>';
echo'<td></td>';
echo'<td><input name="name" required maxlength="50" style="width:100%;text-align:center;"></td>';
echo'<td><input name="price" type="number" required min="0" style="width:100%;text-align:center;"></td>';
echo'<td><input type="submit" name="add" value="Добавить" style="width:100%;text-align:center;"></td>';
echo'</tr>';
echo'</form>';
while($result = mysqli_fetch_array($query)) {
	echo'<form method="POST">';
	echo'<tr>';
	echo'<td><input name="id" value="'.$result['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;font-size: medium;"></td>';
	echo'<td><input name="name" value="'.$result['name'].'" maxlength="50" required style="width:100%;text-align:center;"></td>';
	echo'<td><input name="price" type="number" value="'.$result['price'].'" min="0" required style="width:100%;text-align:center;"></td>';
	echo'<td><input type="submit" name="save" value="Сохранить" style="width:100%;text-align:center;"></td>';
	echo'<td><input type="submit" name="del" value="Удалить" style="width:100%;text-align:center;"></td>';
	echo'</tr>';
	echo'</form>';
}
?>
</table>
<?php
//Добавление
if(isset($_POST['add'])) {
	mysqli_query($conn, 'INSERT INTO object SET name="'.$_POST['name'].'", price="'.$_POST['price'].'"');
	echo "<script>alert('Объект успешно добавлен');</script>";
	echo '<script>location.href="object.php"</script>';
}
//Редактирование
if(isset($_POST['save'])) {
	mysqli_query($conn, 'UPDATE object SET name="'.$_POST['name'].'", price="'.$_POST['price'].'" WHERE id="'.$_POST['id'].'"');
	echo "<script>alert('Объект успешно сохранен');</script>";
	echo '<script>location.href="object.php"</script>';
}
//Удаление
if(isset($_POST['del'])) {
	mysqli_query($conn, 'DELETE FROM `object` WHERE id="'.$_POST['id'].'"');
	echo "<script>alert('Объект успешно удален');</script>";
	echo '<script>location.href="object.php"</script>';
}
?>
<?php
include ('footer.php');
?>
</body>
</html>

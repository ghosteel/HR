<?php
include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM products');
?>
<link rel="stylesheet"href="css/style.css">
	<h1 class="company_service">Наша компания располагает следующими услугами:</h1>
<center>
	<table width="75%">
		<tr>
			<th>Код товара</th>
			<th>Наименование</th>
			<th>Изображение</th>
			<th>цена</th>
		</tr>
		<?php
		while($result = mysqli_fetch_array($query)){
			echo '<tr><form method="POST">';
			echo '<td><input name="id" value="'.$result['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;"></td>';
			echo '<td>'.$result['name'].'</td>';
			echo '<td><img src="../admin/images/'.$result['image'].'" style="width:200px;"></td>';
			echo '<td>'.$result['price'].'</td>';
			echo'<td><input type="submit" name="more" value="Подробнее"></td>';
			echo'<td><input type="submit" name="add" value="Заказать услугу"></td>';
			echo '</form></tr>';
		}
		?>
	</table>
</center>
<?php
 include('footer.php');
?>
	<?php
if(isset($_POST['more'])) {
echo '<script>location.href="more.php?id='.$_POST['id'].'"</script>';
}
if(isset($_POST['add'])) {
		mysqli_query($conn, 'INSERT INTO orders SET id_product="'.$_POST['id'].'", id_client="'.$_SESSION['id_client'].'", date="'.date("Y-m-d").'"');

echo "<script>alert('Услуга успешно добавлена');</script>";
echo '<script>location.href="products.php"</script>';
}
	?>

</body>
</html>

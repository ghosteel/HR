<?php
include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM orders WHERE id_client="'.$_SESSION['id_client'].'"');
?>
	<h1 class="company_service">Список заказанных услуг:</h1>
	<center>
	<table width="75%">
		<tr>
			<th>Код товара</th>
			<th>Наименование</th>
			<th>Изображение</th>
			<th>Цена</th>
			<th>Дата заказа</th>
		</tr>

		<?php
		while($result = mysqli_fetch_array($query)){
			$product = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM products WHERE id = "'.$result['id_product'].'"'));
			echo '<tr><form method="POST">';
			echo '<td><input name="id" value="'.$result['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;"></td>';
			echo '<td>'.$product['name'].'</td>';
			echo '<td><img src="../images/'.$product['image'].'" style="width:200px;"></td>';
			echo '<td>'.$product['price'].'</td>';
			echo '<td>'.$result['date'].'</td>';
			echo'<td><input type="submit" name="del" value="Удалить"></td>';
			echo '</form></tr>';
		}
		?>
	</table>
	</center>
	<?php
	 include('footer.php');
	?>
	<?php
if(isset($_POST['del'])) {
		mysqli_query($conn, 'DELETE FROM orders WHERE id="'.$_POST['id'].'"');

echo "<script>alert('Услуга успешно удалена');</script>";
echo '<script>location.href="order.php"</script>';
}
	?>
</body>
</html>

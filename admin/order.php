<?php
include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM orders');
?>
	<h1 class="company_service">Заказаны следующие услуги:</h1>
	<center>
	<table width="75%">
		<tr>
			<th>Код услуги</th>
			<th>Наименование услуги</th>
			<th>Цена</th>
			<th>Дата заказа</th>
			<th>Клиент</th>
		</tr>
		<?php
		while($result = mysqli_fetch_array($query)){
			$product = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM products WHERE id = "'.$result['id_product'].'"'));
			$client = mysqli_fetch_array(mysqli_query($conn, 'SELECT * FROM client WHERE id = "'.$result['id_client'].'"'));
			echo '<tr><form method="POST">';
			echo '<td><input name="id" value="'.$result['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;"></td>';
			echo '<td>'.$product['name'].'</td>';
			echo '<td>'.$product['price'].'</td>';
			echo '<td>'.$result['date'].'</td>';
			echo '<td>'.$client['family'].' '.$client['name'].' - '.$client['phone'].'</td>';
			echo'<td><input type="submit" name="del" value="Удалить"></td>';
			echo '</form></tr>';
		}
		?>
	</table>
</center>
	<?php
if(isset($_POST['del'])) {
		mysqli_query($conn, 'DELETE FROM orders WHERE id="'.$_POST['id'].'"');

echo "<script>alert('Услуга успешно удален');</script>";
echo '<script>location.href="order.php"</script>';
}
	?>
	<?php
	include ('footer.php');
	?>
</body>
</html>

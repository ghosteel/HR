<?php
include('header.php');
		$query = mysqli_query($conn, 'SELECT * FROM products WHERE id = "'.$_GET['id'].'"');
?>
<?php
			while($result = mysqli_fetch_array($query)) {
				echo '<center><div><form method="POST">';
					echo '<p style="margin:20px;">Наименование услуги: <i>'.$result['name'].'</i></p>';
					echo '<p style="margin:20px;">Описание: <i>'.$result['description'].'</i></p>';
					echo '<h2 style="margin:20px;">Цена: '.$result['price'].'</h2>';
					echo'<input type="submit" name="add" value="Заказать"style="margin:20px;">';
				echo '</form></div></center>';
			}
?>
<?php
if(isset($_POST['add'])) {
		mysqli_query($conn, 'INSERT INTO orders SET id_product="'.$_GET['id'].'", id_client="'.$_SESSION['id_client'].'", date="'.date("Y-m-d").'"');
echo "<script>alert('Услуга успешно добавлена');</script>";
echo '<script>location.href="products.php"</script>';
}
?>
<?php
 	include('footer.php');
?>
</body>
</html>

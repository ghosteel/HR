<?php
include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM products');
?>
	<h1 class="company_service">Наша компания располагает следующими услугами:</h1>
<center>
	<table width="75%">
		<tr>
			<th>№ Услуги</th>
			<th>Наименование</th>
			<th>Изображение</th>
			<th>Цена</th>
		</tr>
		<?php
		while($result = mysqli_fetch_array($query)){
			echo '<tr><form method="POST">';
			echo '<td><input name="id" value="'.$result['id'].'" readonly style="width: 50px;text-align: center;border: 0 none;"></td>';
			echo '<td>'.$result['name'].'</td>';
			echo '<td><img src="admin/images/'.$result['image'].'" style="width:200px;"></td>';
			echo '<td>'.$result['price'].'</td>';
			echo'<td><input type="submit" name="more" value="Подробнее"></td>';
			echo '</form></tr>';
		}
		?>
	</table>
</center>
<?php
	include ('footer.php');
?>

	<?php
if(isset($_POST['more'])) {
echo '<script>location.href="more.php?id='.$_POST['id'].'"</script>';
}
	?>
</body>
</html>

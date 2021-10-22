<?php
	include('header.php');
	$query = mysqli_query($conn, 'SELECT * FROM products');
?>
<h1 class="company_service">Управление услугами</h1>

<?php
echo '<form method="POST" enctype="multipart/form-data">';
			echo '<center><div class="main123">';

			echo '<div class="field">';
			echo'<h2 class="company_service">Добавление новой услуги</h2>';
			echo '</div>';

			echo '<div class="field" style="padding-bottom:20px;">';
			echo'<b><label>Наименование</label></b>';
			echo '<input required name="name" maxlength="50">';
			echo '</div>';


			echo '<div class="field" style="padding-bottom:20px;">';
			echo'<b><label>Описание</label></b>';
			echo '<textarea name="description" required style="width: 200px;"></textarea>';
			echo '</div>';

			echo '<div class="field" style="padding-bottom:20px;">';
			echo'<b><label>Стоимость</label></b>';
			echo '<input required type="number" name="price" min="0">';
			echo '</div>';

			echo '<div class="field" style="padding-bottom:20px;">';
			echo'<b><label>Изображение</label></b>';
			echo '<input type="file" name="file">';
			echo '</div>';

			echo '<div class="field" style="padding-bottom:20px;">';
			echo '<input type="submit" name="add" value="Добавить услугу">';
			echo '</div>';

			echo '</div></center>';
			echo'</form>';
?>

<?php
//Редактирование
while($result=mysqli_fetch_array($query))
{
			echo '<form method="POST" enctype="multipart/form-data">';
			echo'<center><div class="main123">';

			echo '<div class="field">';
			echo'<h2 class="company_service">Редактирование услуги</h2>';
			echo '</div>';

			echo '<div class="field" style="padding-bottom:10px;" border-style:solid;>';
			echo'<b><label><i>№ услуги<i></label></b>';
			echo'<input name="id" value="'.$result['id'].'" readonly style="width: 50px;font-size:16px;text-align: center;border: 0 none;">';
			echo '</div>';

			echo '<div class="field">';
			echo'<b><label>Наименование услуги</label></b>';
			echo '<input required name="name" value="'.$result['name'].'" maxlength="50">';
			echo '</div><br>';

			echo '<div class="field">';
			echo'<b><label>Описание</label></b>';
			echo '<textarea name="description" required style="width: 200px;">'.$result['description'].'</textarea>';
			echo '</div><br>';

			echo '<div class="field">';
			echo'<b><label>Стоимость</label></b>';
			echo '<input required type="number" name="price" value="'.$result['price'].'" min="0">';
			echo '</div><br>';

			echo '<div class="field">';
			echo'<b><label>Изображение</label></b>';
			echo '<img width="200px" src="/images/'.$result['images'].'">';
			echo '</div><br>';

			echo '<div class="field">';
			echo '<input type="file" name="file">';
			echo '</div><br>';

			echo '<div class="field"style="padding-bottom:10px;">';
			echo'<input type="submit" name="save" style="width:130px;height:25px;" value="Сохранить">';
			echo '</div>';

			echo '<div class="field"style="padding-bottom:10px;">';
			echo'<input type="submit" name="del" style="width:130px;height:25px;" value="Удалить">';
			echo '</div>';

			echo'</div></center></form>';
}
?>

			<?php
//Добавление
if(isset($_POST['add']))
{
	move_uploaded_file($_FILES["file"]["tmp_name"], 'image/'.basename($_FILES["file"]["name"]));
	mysqli_query($conn, 'INSERT INTO `products` SET `name`="'.$_POST['name'].'",`description`="'.$_POST['description'].'",`price`="'.$_POST['price'].'", `image`="'.basename($_FILES["file"]["name"]).'"');
	echo "<script>alert('Услуга успешно добавлена');</script>";
	echo '<script>location.href="product.php"</script>';
}
?>
		<?php
		if(isset($_POST['save']) and empty($_POST['file']))
		{
		mysqli_query($conn, 'UPDATE `products` SET `name`="'.$_POST['name'].'",`description`="'.$_POST['description'].'",`price`="'.$_POST['price'].'" WHERE id ="'.$_POST['id'].'"');
		echo "<script>alert('Услуга успешно изменена');</script>";
		unset($_SESSION['edit_client']);
		echo '<script>location.href="product.php"</script>';
		}
		if(isset($_POST['save']) and !empty($_FILES["file"]["tmp_name"]))
		{
		move_uploaded_file($_FILES["file"]["tmp_name"], 'image/'.basename($_FILES["file"]["name"]));
		mysqli_query($conn, 'UPDATE `products` SET `name`="'.$_POST['name'].'",`description`="'.$_POST['description'].'",`price`="'.$_POST['price'].'", `image`="'.basename($_FILES["file"]["name"]).'" WHERE id ="'.$_POST['id'].'"');
		echo "<script>alert('Услуга успешно изменена');</script>";
		unset($_SESSION['edit_client']);
		echo '<script>location.href="product.php"</script>';
		}
		?>
<?php
				if (isset($_POST['del']))
		{
			mysqli_query($conn, 'DELETE FROM `product` WHERE id="'.$_SESSION['edit_product'].'"');
		echo "<script>alert('Услуга успешно удалена');</script>";
	echo '<script>location.href="product.php"</script>';
		}
			?>
			<?php
			include ('footer.php');
			?>
</body>
</html>

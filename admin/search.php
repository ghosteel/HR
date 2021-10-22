<?php
 include ('header.php');
?>
<link rel="stylesheet"href="css/style.css">
<h1 class="company_service">Введите запрос</h1>
<form method="post" class="search">
<input type="text" name="query" maxlength="29" placeholder="Поиск">
<select name="catalog">
<option>По услугам
<option>По клиентам
</select>
<input type="submit" name="scan" value="Поиск" style="width:150px;">
</form>

<?php
if(isset($_POST['scan'])){

switch ($_POST['catalog']) {
case 'По услугам':
$sql = mysqli_query($conn,'SELECT * FROM `products` where name like "%'.$_POST['query'].'%"');
echo "<center><table border='1'><tr><td>№</td><td>Наименование</td><td>Цена</td></tr>";
while ($result = mysqli_fetch_array($sql)) {
echo '<tr><td>'.$result['id'].'</td><td>'.$result['name'].'</td><td>'.$result['price'].'</td>';
}

break;
case 'По клиентам':
$sql = mysqli_query($conn,'SELECT * FROM `client` where family like "%'.$_POST['query'].'%"');
echo "<center><table border='1'><tr><td>№</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>E-Mail</td></tr>";

while ($result = mysqli_fetch_array($sql)) {
echo '<tr><td>'.$result['id'].'</td><td>'.$result['family'].'</td><td>'.$result['name'].'</td><td>'.$result['patronymic'].'</td><td>'.$result['email'].'</td></tr>';
}

break;
}


echo "</table></center>";
}



?>
</header>


<?php
 include ('footer.php');
?>

<?php 
require_once 'config/connect.php';

$id = $_GET['id'];

$row = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `products` WHERE `products`.`id` = '$id'"));

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/style.css">
</head>
<body>
		<form id="form" action="vendor/update.php" method="post"  style="display: block;">
			<input type="hidden" name="id" value="<?=$row['id']?>">
			<label for="title">Title</label>
			<input id="title" type="text" name="title" value="<?=$row['title']?>">
			<label for="desc">Description</label>
			<textarea id="desc" name="desc"><?=$row['description']?></textarea>	
			<label for="price">Price</label>
			<input id="price" name="price" type="text" value="<?=$row['price']?>">
			<div class="submit-container">
				<input type="submit" value="Add product" name="submit">
			</div>
	</form>
</body>
</html>

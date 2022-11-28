<?php 
session_start();
require_once '../config/connect.php';

$title = $_POST['title'];
$description = $_POST['desc'];
$price = $_POST['price'];

$title = strip_tags(htmlentities($title));
$description = strip_tags(htmlentities($description));
$price = strip_tags(htmlentities($price));

$id =strip_tags(htmlentities($_POST['id']));

if(!empty($title) && !empty($description) && !empty($price)){

	mysqli_query($connect, "
			UPDATE products 
				SET `title` = '$title',`description` = '$description',`price` = '$price' 
					WHERE `products`.`id` = '$id' 
					");

}

header('Location: / ');

?>
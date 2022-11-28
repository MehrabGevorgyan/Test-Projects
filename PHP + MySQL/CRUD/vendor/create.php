<?php 
session_start();
require_once '../config/connect.php';

$title = $_POST['title'];
$description = $_POST['desc'];
$price = $_POST['price'];

if(!empty($title) && !empty($description) && !empty($price)){

	$title = strip_tags(htmlentities($title));
	$description = strip_tags(htmlentities($description));
	$price = strip_tags(htmlentities($price));

	mysqli_query($connect, "INSERT INTO products (`title`,`description`,`price`) VALUES('$title','$description','$price')");
}
else {
	$_SESSION['massage'] = 'Fill in all input fields';
}

header('Location: /');

?>
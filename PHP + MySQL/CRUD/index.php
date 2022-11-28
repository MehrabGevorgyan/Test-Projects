<?php session_start(); require_once 'config/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="js/jquery-3.6.1.slim.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 

	$row = mysqli_fetch_all(mysqli_query($connect, "SELECT * FROM `products`"));

	?>

	<table>
		<th class="title" colspan="6">Products</th>
		<tr>
			<th>id</th>
			<th>title</th>
			<th>description</th>
			<th>price</th>
			<th>&#9998;</th>
			<th>&#10007;</th>
		</tr>
		<?php 
			foreach ($row as $product) {
				echo '<tr>';
				foreach($product as $product_id => $value){
					if($product_id == 3){
						echo "<td>$value &#8364;</td>";
						continue;
					}
					echo "<td>$value</td>";
				}
				echo "<td class='update'><a href=update.php?id=".$product[0].">Update record</a></td>";
				echo "<td class='delete'><a href=vendor/delete.php?id=".$product[0].">Delete record</a></td>";
				echo '</tr>';
			}
		?>
			<td class="add" colspan="6">
				<button>add new product</button>	
			</td>
	</table>
	<form id="form" action="vendor/create.php" method="post">
			<p><?php  if(isset($_SESSION['massage']))
						echo $_SESSION['massage']; ?></p>
			<div>
				<input id="title" type="text" name="title" placeholder="Title">
				<textarea id="desc" name="desc" placeholder="Description"></textarea>	
				<input id="price" name="price" type="text" placeholder="Price">
				<div class="submit-container">
					<input type="submit" value="Add product">
				</div>
			</div>
			<?php unset($_SESSION['massage']);?>
	</form>
	<script>
		$(document).ready(function(){
			$(".add").on('click',function(){
				$("form").toggle();
			});
		});
	</script>
</body>
</html>

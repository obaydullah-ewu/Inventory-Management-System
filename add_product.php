<?php
session_start();
include('connection.php');
$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
	header("location:login.php");
}
require 'navbar2.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Product</title>
</head>

<body>

	<div class="container">
		<form action="" method="post" enctype="multipart/form-data">
			<caption>
				<br>
				<h2 style="background-color: #2BB3DD;" align="center">Add Product
					<hr>
				</h2>
			</caption>
			<table border="5" cellspacing="3" cellpadding="10" style="background-color: #2BB3DD;" align="center">
				<thead>

				</thead>
				<tbody>
					<tr>
						<td>Product Name</td>
						<td><input type="text" name="productname" placeholder="Enter your product" autofocus ></td>
					</tr>
					<tr>
						<td>Product Description</td>
						<td><textarea name="desc" rows="4" cols="30">

							</textarea>
						</td>
					</tr>
					<tr>
						<td>Product Image</td>
						<td><input type="file" name="file"></td>
					</tr>


					<tr>
						<td colspan="2" align="center">
							<button type="submit" name="submit" class="btn btn-success">Add Product</button>
							<button type="reset" class="btn btn-secondary">Reset</button>
						</td>
					</tr>

				</tbody>
				<tfoot>

				</tfoot>
			</table>
			<br>
		</form>

	</div>

</body>

</html>
<?php

if (isset($_POST['submit'])) {


	$file_name =  $_FILES['file']['name'];
	$file_type = $_FILES['file']['type'];
	$file_size = $_FILES['file']['size'];
	$file_tem_loc = $_FILES['file']['tmp_name'];
	$file_store = "upload/" . $file_name;

	move_uploaded_file($file_tem_loc, $file_store);

	$a = $_POST['productname'];
	$b =  $_POST['desc'];


		$name = $_POST['productname'];

		$sql1 = "SELECT * FROM product_info WHERE product_name = '$name'";
		$result1 = mysqli_query($conn, $sql1);

		$count = mysqli_num_rows($result1);
		if ($count > 0) {
			echo '<script>alert("Duplicate Product Found ")</script>';
		} else {

			$sql = "INSERT INTO product_info VALUES ('$_POST[productname]', '$_POST[desc]',' $file_store')";
			$check = mysqli_query($conn, $sql);
			if ($check) {

				echo '<script type="text/javascript">';
				echo 'alert(" Product Add Succesfully");';
				echo 'window.location.href = "add_product.php";';
				echo '</script>';
			} else {
				echo " Not succesfully add";
			}
		}
}

?>
<?php
session_start();
include('connection.php');
$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
	header("location:login.php");
}
include 'navbar2.php';

$query  = "SELECT product_name FROM product_info";
$data = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Purchase Product</title>
	<link rel="stylesheet" href="style.css">
	<style>
		th, td{
			padding-left: 30px;
			padding-right: 30px;
		}
		#pad {
			padding-bottom: 30px;
		}
		#padd{
			padding-top: 30px;
		}
		.sub:hover{
			cursor: pointer;
			background: green;
			color: #000;
		}
	</style>
</head>

<body>
	<div class="container"  align="center">
		<h2 style="background-color: #FFE4B5;">Purchase Product <hr></h2>

		<form action="" method="post">
			<table style="background-color: #FFE4B5;" >
				<tr>
					<th id="padd"><label for="productname" >Product Name</label></th>
					<td id="padd">
						<select name="productname">
							<option>Click Name</option>;
							<?php
							while ($result = mysqli_fetch_assoc($data)) {
								$productname = $result['product_name'];

								echo "<option>$productname</option>";
							}
							?>
						</select>
					</td>
				</tr>
				
				<tr>
					<th><label for="">Quantity</label></th>
					<td><input type="number" name="quantity"></br></td>
				</tr>
				<tr>
					<th><label for="">Unit Price</label></th>
					<td><input type="number" name="price"></td>
				</tr>
				<tr>
					<th><label for="">Date</label></th>
					<td><input type="date" name="date"></br></td>					
				</tr>
				<tr>
					<td colspan="2" align="center" id="pad"><button class="btn btn-secondary sub" type="submit" name="submit">Purchase <br></button></td>					
				</tr>			
				<tr><br></tr>		


				
				

				
			</table>

		</form>
	</div>
</body>

</html>
<?php

if (isset($_POST['submit'])) {
	$total_price = $_POST['quantity'] * $_POST['price'];
?>

	<div class="container">

		<table border="3">
			<tr>
				<br><br><br>
				<th colspan="5" style="text-align:center; font-weight:bolder; color:blue; background-color:chartreuse">Purchase Report</th>
			</tr>
			<tr>
				<th>Product Name </th>
				<th>Quantity</th>
				<th>Unit Price</th>
				<th>total Price</th>
				<th>Date</th>
			</tr>
		<?php
		echo "<tr>";

		echo "<td>" . $_POST['productname'] . "</td>";
		echo "<td>" . $_POST['quantity'] . "</td>";
		echo "<td> " . $_POST['price'] . "</td>";

		echo "<td> " . "$total_price" . "</td>";
		echo "<td>" . $_POST['date'] . "</br>";

		echo "</tr>";
		echo "</table>";
		echo "</div>";
		$name = $_POST['productname'];
		//insert product only available without date, for customer

		$sql3 = "SELECT quantity FROM available_product WHERE product_name ='$name'";
		$check3 = mysqli_query($conn, $sql3);

		$count = mysqli_num_rows($check3);
		if ($count > 0) {
			$result = mysqli_fetch_assoc($check3);
			$unit = $_POST['price'];
			$quantity = $result['quantity'];
			$total_quantity = $quantity + $_POST['quantity'];
			$total_price2 = $total_quantity * $_POST['price'];

			$sql4 = "UPDATE available_product SET quantity = '$total_quantity', total_price = '$total_price2', unit_price = '$unit' WHERE product_name = '$name'";
			$check4 = mysqli_query($conn, $sql4);
		} else {

			$sql2  = "INSERT INTO available_product VALUES ('$_POST[productname]','$_POST[quantity]','$_POST[price]','$total_price')";
			$check2 = mysqli_query($conn, $sql2);
		}

		// insert product all product here and every details

		$sql = "INSERT INTO purchase_product VALUES ('$_POST[productname]','$_POST[quantity]','$_POST[price]','$total_price', '$_POST[date]')";
		$check = mysqli_query($conn, $sql);

		if ($check) {
			echo '<script>alert("Product Purchased Succesfully")</script>';
		} else {
			echo " Not succesfully purchase";
		}
	}

		?>
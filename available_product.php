<?php
session_start();
include('connection.php');
$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
    header("location:login.php");
}
include('navbar2.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Product</title>
    <style>
        th{
            color:blue; 
            background-color:#b3b300;
        }
    </style>
</head>

<body>
    <div class="container" align="center">
        <br>
        

        <?php
            $query  = "SELECT * FROM available_product";
            $data = mysqli_query($conn, $query);
        ?>
            <table border="3" cellspacing="3" cellpadding="10"  style="background-color: green;">
                <tr>
                    <td colspan="4"><h1 class="font-weight-bolder " style="color: blue;">Show All Available Products <hr></h1></td>
                </tr>
				<tr>
                    <th>Product Name </th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
				</tr>

        <?php
         $t_quanity=0;
         $t_price=0;
            if (mysqli_num_rows($data) > 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>" . "<b>" . $result['product_name'] . "</td>";
                    echo "<td>" . $result['quantity'] . "</td>";
                    echo "<td>" . $result['unit_price'] . "</td>";
                    echo "<td>" . $result['total_price'] . "</td>";

                    $t_quanity+=$result['quantity'];
                    $t_price+=$result['total_price'];

                    echo "</tr>";
                    
                }
                ?>
                <tr>
                    <th>Total</th>
                    <th><?php echo "$t_quanity";  ?></th>
                    <th></th>
                    <th><?php echo "$t_price";  ?></th>
                </tr>


                <?php
            echo "</table> <br><br>";
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
        ?>
    </div>
</body>

</html>
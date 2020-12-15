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
    <title>Show Product</title>
    <style>
        .aa:hover{
            cursor: pointer;
			background: green;
			color: #000;
        }
        
    </style>
</head>

<body>
    <div class="container" align ="center">
    <br>
        <h1 class="font-weight-bolder " style="color: blue; background-color: aqua">Show All Products <hr></h1>

        <?php
            $query  = "SELECT * FROM product_info";
            $data = mysqli_query($conn, $query);
        ?>
            <table border="3" cellspacing="3" cellpadding="10" style="background-color: red;">
            
        
            <tr style="text-align: center;">
                <th >Product Name</th>
                <th >Product Description</th>
                <th >Product Picture</th>
                <th colspan="2" >Action</th>    
            </tr>
            <?php

            if (mysqli_num_rows($data) > 0) {
                while ($result = mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>" . "<b>" . $result['product_name'] . "</td>";
                    echo "<td>" . $result['product_description'] . "</td>";
                    echo "<td><a href='$result[p_image]'><img src='" . $result['p_image'] . "'height='100' width='100'></a></td>";
        ?>
                    <td><a class="btn btn-secondary aa" href="update_product.php?ProductName=<?php echo $result['product_name'] ?>">Update</a></td>
                    <td><a class="btn btn-danger" href="delete_product.php?ProductName=<?php echo $result['product_name'] ?>">Delete</a></td>
        <?php
        
                    echo "</tr>";
                    
                }
            echo "</table><br><br>";
            } else {
                echo "No product here";
            }

            mysqli_close($conn);
        ?>
    </div>
</body>

</html>
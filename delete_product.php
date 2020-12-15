<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>
    
</body>
</html>

<?php
session_start();
include('connection.php');

$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
    header("location:login.php");
}
include('navbar2.php');
$ProductName = $_GET['ProductName'];
   // echo $ProductName;
$sql = "SELECT * FROM product_info WHERE product_name = '".$ProductName."'";
?>
<div class="container">
    <h2>Are you sure to delete?</h2><br>
    <form action="" method="post">
        <h3 style="color: red;">Product Name: </h3><input type="text" name="productname" value="<?php echo $ProductName; ?>" ></br></br>
        <button type="submit" name="submit" class="btn btn-danger">Yes</button>
        <a href="show_product.php" class="btn btn-success">No</a>
    </form>
</div>

<?php

if(isset($_POST['submit']))
{
    $sql1  = "SELECT * FROM product_info WHERE product_name ='$_POST[productname]'";

    $result1 = mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($result1);
    echo "Count" . $count;
    if ($count > 0) {

        $sql = "DELETE FROM product_info where product_name ='$_POST[productname]'";
        $data = mysqli_query($conn, $sql);
        if ($data)
        {
            
            
            echo '<script type="text/javascript">'; 
            echo 'alert(" Product Deleted successfully");'; 
            echo 'window.location.href = "show_product.php";';
            echo '</script>';

        } else {
            echo " Not Succesfully Delete" . mysqli_error($conn);
        }
    }
    else
    {
        echo '<script>alert("No Product Found ")</script>';
    }
}
?>

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
<?php
    $ProductName = $_GET['ProductName'];
   // echo $ProductName;
    $sql = "SELECT * FROM product_info WHERE product_name = '".$ProductName."'";

?>
<div class="container">
    <h2>Are you sure to update?</h2><br>
    <form action="update2.php" method="post">
        <h3 style="color: #9ACD32">Product Name: </h3><input type="text" name="productname" value="<?php echo $ProductName; ?>" required></br></br>
        <button type="submit" name="submit" class="btn btn-secondary"  >Yes</button>
        <a href="show_product.php" class="btn btn-success">No</a>
    </form>
</div>



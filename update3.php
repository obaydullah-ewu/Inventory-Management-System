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

if (isset($_POST['update'])) {

    // $file_name =  $_FILES['file']['name'];
    // $file_type = $_FILES['file']['type'];
    // $file_size = $_FILES['file']['size'];
    // $file_tem_loc = $_FILES['file']['tmp_name'];

    // $file_store = "upload/" . $file_name;

    // move_uploaded_file($file_tem_loc, $file_store);

    $ProductName = $_GET['ProductName'];
    $pname = $_POST['productname'];
    $des = $_POST['desc'];

    //if (empty($pname) && empty($des)) {
        $sql = "UPDATE product_info SET product_name = '" . $pname . "', product_description = '" . $des . "' WHERE product_name = '" . $ProductName . "' ";
        $data = mysqli_query($conn, $sql);

        if ($data) {
            echo '<script type="text/javascript">';
            echo 'alert("Product Updated Succesfully");';
            echo 'window.location.href = "show_product.php";';
            echo '</script>';
        } else {
            echo "<h4>Not Succesfully Updated <br><br></h4>";
        }
    // }
    // else{
	// 	echo '<script type="text/javascript">';
    //     echo 'alert(" All fields are required");';
    //     echo 'window.location.href = "show_product.php";';
	// 	echo '</script>';
	// }
} else {
    echo "Not enter in issset";
}

?>
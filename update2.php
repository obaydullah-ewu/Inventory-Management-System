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

<div class="container">

    <?php

    if (isset($_POST['submit'])) {


        $sql  = "SELECT * FROM product_info WHERE product_name ='$_POST[productname]'";

        $data = mysqli_query($conn, $sql);
        echo "<table border = '3'>";
        echo "<tr>";
        echo "<th>Product Name </th>";
        echo "<th>Product Description  </th>";
        echo "<th>Product Picture  </th>";
        echo "</tr>";

        

        if (mysqli_num_rows($data) > 0) {
            while ($result = mysqli_fetch_assoc($data)) {
                echo "<tr>";
                $pname = $result['product_name'];
                $des = $result['product_description'];
                $pimage = $result['p_image'];
                echo "<td>" . "<b>" . $result['product_name'] . "</td>";
                echo "<td>" . $result['product_description'] . "</td>";
                echo "<td><a href='$result[p_image]'><img src='" . $result['p_image'] . "'height='100' width='100'></a></td>";
                echo "</tr>"."</br>";
                echo "<h3>" . "Now, you can update any attribute " . "</h3>";

            }
        } else {
            echo "Unmatched Product" . "<br><br>";
            return;
        }

    }
    mysqli_close($conn);
    ?>
    
</div>


<div >

<form action="update3.php?ProductName=<?php echo $pname; ?>" method="post" enctype="multipart/form-data">
    <table border="5" cellspacing="3" cellpadding="10">
    <thead>
    <br><br> <h3 style="color:reh">Information Update Here</h3>
    </thead>
    <tbody>
        <tr>
            <th>Product Name</th>
            <td><input type="text" name="productname" placeholder="Enter your product"  value="<?php echo $pname; ?>" autofocus required></td>
        </tr>
        <tr>
            <th>Product Description</th>
            <td>
                <textarea name="desc" rows="4" cols="30" >
                <?php echo $des; ?>
                </textarea>
            </td>
        </tr>
        

        <tr>
            <td colspan="2" align="center">
                <button type="submit" name="update" class="btn btn-success">Update Product</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </td>
        </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>
</form>

</br></br></br>
</div>



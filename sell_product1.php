<?php
session_start();
include('connection.php');

$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
    header("location:login.php");
}
include('navbar2.php');


$query  = "SELECT product_name FROM available_product";
$data = mysqli_query($conn, $query);

?>
<title>Sell Product</title>
<html >
<head>
    <style>
        th,
        td {
            padding: 15px;
        }
        .button {
            border-radius: 4px;
            background-color: black;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 25px;
            padding: 10px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button:hover {
            cursor: pointer;
            background: green;
            color: #000;
        }
    </style>
</head>
<body>
    
</body>
</html>

<div class="container";">
    
    <form action="" method="post">
        <table style="background-color: #E6E6FA;"  align="center">
            <tr>
                <td colspan="2" ><h2>Sell Product</h2></td>
            </tr>
        </table><br>
        <table style="background-color: red;" align="center">
            <tr  style=" padding:15px">
                <th><label for="productname">Product Name</label></th>
                <td>
                    <select name="productname" required>
                        <option>Click Name</option>;
                        <?php
                        while ($result = mysqli_fetch_assoc($data)) {
                            $productname = $result['product_name'];

                            echo "<option>$productname</option>";
                        }
                        ?>
                    </select></br>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button class="button" type="submit" name="sell" > Sell</button></td>
            </tr>

        </table>
    </form>

</div>



<?php

if (isset($_POST['sell'])) {
    $ProductName = "$_POST[productname]";
    //echo "Value : ". $ProductName;
    echo "<br>";
    $query = "SELECT * FROM available_product WHERE product_name = '" . $ProductName . "'";

    $data = mysqli_query($conn, $query);
    while ($result = mysqli_fetch_assoc($data)) {
        $productname = $result['product_name'];
        $quantity = $result['quantity'];
        $unitprice = $result['unit_price'];

        // echo $productname;
        // echo $quantity;
        //echo $unitprice;

    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sell Product</title>
        <style>
            th {
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container" >

            <form action="" method="post">
                <table border="3" style="background-color: #E6E6FA;" align="center" cellspacing="3" cellpadding="10">
                    <tr>
                        <th>Product Name</label></th>
                        <th>Quantity </th>
                        <th>Unit Price</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td style="font-weight: bolder;"><?php echo $productname; ?></td>
                        <td><?php echo "Available quanity is: <b>" . $quantity . "</b><br>";
                            echo "(Need to enter less than avaible quanity)" ?></td>
                        <td><b>Price (Orginal): <?php echo $unitprice; ?></b><br></td>
                        <td></td>

                    </tr>
                    <tr>


                        <td> <input type="text" name="productname" value="<?php echo $productname; ?>" required></td>
                        <td><input type="number" name="quantity" placeholder="Enter your quantity" required></br></td>
                        <td><input type="text" name="price" value="<?php echo $unitprice; ?>" required></td>

                        <td><input type="date" name="date"></br></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4">
                            <button type="submit" name="sold" class="btn btn-secondary">Sold</button>
                        </td>
                    </tr>
                </table>
                <br>
            </form>
        </div>
        <br><br>
    </body>

    </html>
<?php
}
?>

<?php

if (isset($_POST['sold'])) {
    $query = "SELECT * FROM available_product WHERE product_name = '" . $_POST['productname'] . "'";

    $data = mysqli_query($conn, $query);
    while ($result = mysqli_fetch_assoc($data)) {

        $quantity = $result['quantity'];
    }

    if ($quantity < ($_POST['quantity'])) {

        echo '<script type="text/javascript">';
        echo 'alert(" You must be enter quantity less than available quantity");';
        echo 'window.location.href = "sell_product1.php";';
        echo '</script>';
    } else {

?>
        <div class="container">
            <table>
                <table border="3">
                    <tr>
                        <br><br><br>
                        <th colspan="5" style="text-align:center; font-weight:bolder; color:blue; background-color:chartreuse">Sell Report</th>
                    </tr>
                    <tr>
                        <th>Product Name </th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>total Price</th>
                        <th>Date</th>

                    </tr>
                    <tr>


                        <?php
                        echo "<td>" . $_POST['productname'] . "</td>";
                        echo "<td>" . $_POST['quantity'] . "</td>";
                        echo "<td>" . $_POST['price'] . "</td>";
                        $total_price = $_POST['quantity'] * $_POST['price'];
                        echo "<td>" . "$total_price" . "</td>";
                        echo "<td>" . $_POST['date'] . "</td>";

                        ?>
                    </tr>
                </table>
        </div>
<?php
        //decrement product only available without date, for customer

        $sql3 = "SELECT quantity FROM available_product WHERE product_name ='$_POST[productname]'";
        $check3 = mysqli_query($conn, $sql3);

        $count = mysqli_num_rows($check3);
        if ($count > 0) {
            $result = mysqli_fetch_assoc($check3);
            $unit = $_POST['price'];
            $quantity = $result['quantity'];
            $total_quantity = $quantity - $_POST['quantity'];
            $total_price2 = $total_quantity * $_POST['price'];

            $sql4 = "UPDATE available_product SET quantity = '$total_quantity', unit_price = '$unit', total_price = '$total_price2' WHERE product_name = '$_POST[productname]'";
            $check4 = mysqli_query($conn, $sql4);
        } else {

            //$sql2  = "INSERT INTO available_product VALUES ('$_POST[productname]','$_POST[quantity]','$_POST[price]','$total_price')";
            //$check2 = mysqli_query($conn, $sql2);
        }

        //end decrement




        $sql = "INSERT INTO sold_product VALUES ('$_POST[productname]','$_POST[quantity]','$_POST[price]','$total_price', '$_POST[date]')";
        $check = mysqli_query($conn, $sql);
        if ($quantity == ($_POST['quantity'])) {
            $deleteSQL = "DELETE FROM available_product where product_name ='$_POST[productname]'";
            $data = mysqli_query($conn, $deleteSQL);
        }
        if ($check) {

            echo '<script>alert("Product Sold Succesfully")</script>';
        } else {
            echo " Not succesfully purchase";
        }
    }
}



?>
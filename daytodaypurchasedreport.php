<?php
session_start();
include('connection.php');
error_reporting(0);
$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
    header('location:login.php');
}
include('navbar2.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day to Day Transaction Report</title>
    <style>
        th,
        td {
            padding: 15px;
        }

        .button {
            border-radius: 4px;
            background-color: #f4511e;
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
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <table align="center" style="background-color:royalblue; color:red; ">
                    <tr>
                        <td style="padding:20px 10px 0px 10px">
                            <h2>All Purchased Transaction</h2>
                            <hr>
                        </td>
                    </tr>
                </table>
                <br>

                <form action="" align="center" method="post">

                    <table border="3" style="background-color:violet;" align="center">
                        <tr>
                            <th rowspan="2">
                                <h2>Enter date</h2>
                            </th>
                            <td>From</td>
                            <td><input type="date" name="date1"></td>
                        </tr>

                        <tr>
                            <td>To</td>
                            <td><input type="date" name="date2"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input class=" button" name="report" type="submit" value="Report"></td>
                        </tr>
                    </table>
                </form>
            </div>
</body>

</html>


<?php

if (isset($_POST['report'])) {
    $sql = "SELECT * FROM purchase_product WHERE purchase_date BETWEEN '$_POST[date1]' AND '$_POST[date2]'";
    $result = mysqli_query($conn, $sql);
?>
    <div class="col-md-7">
        <table style="background-color:#9933ff" align="center">
            <tr>
                <th colspan="4" style="background-color: #d9b3ff; text-align:center">Date</th>
            </tr>
            <tr>
                <th>From</th>
                <td><?php echo $_POST['date1']; ?></td>
                <th>To</th>
                <td><?php echo $_POST['date2'] ?></td>
            </tr>
        </table><br>
        <table border="3" style="background-color:rgb(204, 0, 153);" align="center">
            <tr style="background-color: rgb(255, 83, 26)">
            <?php
            echo "<th>Product Name </th>";
            echo "<th>Quantity</th>";
            echo "<th>Unit Price</th>";
            echo "<th>Total Price</th>";
            echo "<th>Date</th>";
            echo "</tr>";

            $count = mysqli_num_rows($result);
            if ($count > 0) {
                $TotalPrice = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_name'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['unit_price'] . "</td>";
                    echo "<td>" . $row['total_price'] . "</td>";
                    echo "<td>" . $row['purchase_date'] . "</td>";
                    $TotalPrice += $row['total_price'];
                    echo "</tr>";
                }
                echo "</table><br><br>";
            ?>
            <table style="background-color:#ff80bf" align="center">
                <tr style="text-align: center;">
                    <td colspan="3">Total Purchased Money </td>
                    <td colspan="2"><?php echo "$TotalPrice"; ?> </td>
                </tr>
            </table>
            <br><br>
            <?php
            } else {
                echo '<script>alert("No Transaction Found ")</script>';
            }
        }
            ?>
    </div>
    </div>
    </div>
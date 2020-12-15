<?php
session_start();
include('connection.php');
error_reporting(0);
// echo "Welcome ". $_SESSION['user_name'];
$user_profile = $_SESSION['user_name'];
if ($user_profile == true) {
} else {
    header('location:login.php');
}
include('navbar2.php');

$query = "SELECT * FROM USER_INFORMATION WHERE username = '$user_profile'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
echo "</br>";
//echo "<h2>" .  $result['firstname'] . "</h2>";

?>
<html>

<head>
    <title>Home</title>
    <style>
        body 
        {
            background: url(1.jpg);
            background-size: 2000px 900px;
            /* background-size: cover; */
            background-repeat: no-repeat;
            background-attachment: fixed;
       }
       h1
       {
           color: red;
           font-weight: bolder;
       }
    </style>
</head>

<body>
<br>
<h1> <?php  echo  "Welcome<br>". $result['firstname'] ; ?></h1>
</body>


</html>
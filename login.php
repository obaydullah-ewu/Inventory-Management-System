<?php
    ob_start(); // For error 
    session_start();
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
    <body style="background-color:red">
        <div class="loginbox">
            
            <h1>Login Here</h1>
            <form action="" method="post">
                <p>Username</p> 
                <input type="text" name="username" value="" placeholder="Enter your username"></br></br>
                <p>Password</p> 
                <input type="password" name="password" value="" placeholder="Enter your password"></br></br>
                <input id="add" type="submit" name="submit" value="Login"/>
            </form>           
        </div>       
    </body>
</html>


<?php
    if(isset($_POST['submit']))
    {
        $user = $_POST['username'];
        $pwd = $_POST['password'];
        $query = "SELECT * FROM USER_INFORMATION WHERE username = '$user' && password = '$pwd'";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        if($total==1)
        {
            $_SESSION['user_name'] = $user;
            header('location:home.php');
        }
        else
        {
        
            echo '<script type="text/javascript">';
            echo 'alert(" Login Failed");';
            // echo 'window.location.href = "login.php";';
            echo '</script>';
        }

    }
    ob_flush();
?>

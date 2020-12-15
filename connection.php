<?php

    $servername = "localhost:3307";
    $username ="root";
    $password ="";
    $dbname = "projectdb";


    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn)
    {
        echo "";
    }
    else{
        die("Connection failed because ".mysqli_connect_error());
    }

?>
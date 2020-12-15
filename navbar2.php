<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body>
    <!-- this is navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-4 pb-4 sticky-top">
        <a class="navbar-brand" href="home.php">Inventory Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav m-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <div class="dropdown" style="margin-right: 12px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Product Information
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="show_product.php">Show Products</a></button>
                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="add_product.php">Add Product</a></button>
                        <!-- <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="purchase_product.php">Purchase Product</a></button> -->
                    </div>
                </div>
                <div class="dropdown " style="margin-right: 12px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Store Management
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        
                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="purchase_product.php">Purchase Product</a></button>
                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="sell_product1.php">Sell Product</a></button>
                    </div>
                </div>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="registration.php">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product_info.php">Product Information</a>
                </li> -->
                <div class="dropdown ">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Stock Status and Transaction Report
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                        <button class="dropdown-item" type="button"><a class="nav-link " style="background-color: pink; color:red" href="purchased_product.php">Show Purchased Products</a></button>
                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark"  href="sold_product.php">Show Sold Products</a></button>

                        <button class="dropdown-item" type="button"><a class="nav-link " style="background-color: pink; color:red" href="available_product.php">Show Available Products</a></button>

                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="perdaypurchasedreport.php">Per Day Purchased Report</a></button>
                        <button class="dropdown-item" type="button"><a class="nav-link " style="background-color: pink; color:red" href="daytodaypurchasedreport.php">Date to Date Purchased Report</a></button>

                        <button class="dropdown-item" type="button"><a class="nav-link bg-dark" href="perdayreport.php">Per Day Sold Report</a></button>
                        <button class="dropdown-item" type="button"><a class="nav-link " style="background-color: pink; color:red" href="daytodayreport.php">Date to Date Sold Report</a></button>
                        
                    </div>
                </div>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row p-4">

        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>
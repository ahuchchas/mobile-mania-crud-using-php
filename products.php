<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Products</title>
    <link rel='stylesheet' href='index.css'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'
        integrity='sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM' crossorigin='anonymous'>
</head>

<body>
    <nav class='bg-success-subtle'>
        <div class='d-inline-flex align-items-center'>
            <img src='mobile.svg' alt='logo' height='25px' width='25px' class=''>
            <p id='logo'>MOBILE MANIA</p>
        </div>
        <ul>
            <li><a href='index.php'>Home</a></li>
            <li><a href='products.php'>Products</a></li>
            
            <?php 
                
                if(isset($_SESSION['admin'])){
                    echo "
                    <li><a href='orders.php'>Orders</a></li>
                    <li><a href='register.html'>Register</a></li>
                    <li><a href='logout.php'>Admin Logout</a></li>
                    ";
                }
                else if(isset($_SESSION['user'])) {
                    $email = $_SESSION['user'];
                    echo "
                    <li><a href='orders.php'>Orders</a></li>
                    <li><a href='register.html'>Register</a></li>
                    <li><a href='logout.php'>Logout($email)</a></li>
                    ";
                } else {
                    echo "
                    <li><a href='register.html'>Register</a></li>
                    <li><a href='login.html'>Login</a></li>";
                }
            ?>
        </ul>
    </nav>
    <div class='home-container'>
        <div class='welcome'>
            <?php 
                
                if(isset($_SESSION['admin'])) {
                    echo "<a href='addProduct.php' class='btn bg-success-subtle mb-3' style='border:2px solid #16565c; color: #16565c; font-weight: bold'>Add New Product</a>";
                }
                else if(isset($_SESSION['user'])) {
                    echo "<h6>You can see or order phones from below</h6>";
                } else {
                    echo "<h6>Please Log In to order a phone!</h6>";
                }
            ?>
            
            <h1>All Products</h1><br><br>


            <div class='container pb-4'>
                <div class="row gy-4 justify-content-center">
                    <?php 
                        include 'config.php';
                        $allproducts = mysqli_query($conn, "SELECT * FROM `products` WHERE 1");
                        
                        while($row = mysqli_fetch_array($allproducts)) {
                            echo "
                            <div class='card col-lg-4 p-0 mx-4' style='width: 18rem;'>
                                <img src='$row[image]' class='card-img-top' alt='...' width='250px' >
                                <div class='card-body bg-success-subtle'>
                                    <h4 class='card-title'>$row[name]</h4>
                                    <h6 class='card-text'>Processor: $row[processor]</h6>
                                    <h6 class='card-text'>RAM: $row[ram]</h6>
                                    <h6 class='card-text'>ROM: $row[rom]</h6>
                                    <h6 class='card-text'>Price: $row[price]</h6>
                            ";
                                    if(isset($_SESSION['admin'])){
                                        echo "<a href='updateProduct.php? id=$row[id]' class='btn' style='background-color: teal; color: #fff; width: 80px;'>Edit</a>
                                        <a href='deleteProduct.php? id=$row[id]&image=$row[image]' class='btn ' style='background-color: #d11a2a; color: #fff; width: 80px;'>Delete</a>";
                                    }
                                    else if(isset($_SESSION['user'])) {
                                        $email = $_SESSION['user'];
                                        echo "<a href='orderProduct.php? id=$row[id]&email=$email' class='btn ' style='background-color: teal; color: #fff; '>Order product</a>";
                                    }
                                    
                                        
                            echo "
                                </div>
                            </div>
                            ";
                        }
                    ?>
                </div>                
            </div>


        </div>
    </div>
</body>

</html>
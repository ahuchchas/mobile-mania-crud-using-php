<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="bg-success-subtle">
        <div class="d-inline-flex align-items-center">
            <img src="mobile.svg" alt="logo" height="25px" width="25px" class="">
            <p id="logo">MOBILE MANIA</p>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Products</a></li>
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
    <div class="home-container">
        <div class="welcome mb-5 w-50 mx-auto">
            <h2 style="color: #0c594b; margin-bottom: 24px">MOBILE MANIA</h2>
            <h6>Here you will find the latest mobile phones available. You can place an order for the phone, if you want
                to buy (For registered users only).</h6>
            <a href="products.php" class="btn fw-bold" style="background-color: #0c594b; color: #fff; margin-top: 24px">Browse available products</a>
        </div>
        <div class="w-50 mx-auto my-2">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./carousel/new-smartphones-wallpaper-preview.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="./carousel/phone-table-keyboard-tech.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                    <img src="./carousel/phone-iphone-apple-earbuds.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Orders</title>
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
                    echo "<h4 class='mb-5'>All order requests</h4>";
                }
                else if(isset($_SESSION['user'])) {
                    echo "<h4 class='mb-5'>Your Orders($_SESSION[user])</h4>";
                } else {
                    echo "<script>location.href='index.php'</script>";
                }
            ?>
            
            


            <div class='container-fluid pb-4'>
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">User email</th>
                        <th scope="col">Product ID </th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Units ordered</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Delivery Address</th>
                        <th scope="col">Mobile</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include 'config.php';
                            
                            if(isset($_SESSION['admin'])) {
                                $orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE 1");
                            }
                            else if(isset($_SESSION['user'])) {
                                $email = $_SESSION['user'];
                                $orders = mysqli_query($conn, "SELECT * FROM `orders` WHERE email='$email'");
                            }
                            
                            while($row = mysqli_fetch_array($orders)) {
                                echo "
                                <tr>
                                <th scope='row'>$row[oid]</th>
                                <td>$row[email]</td>
                                <td>$row[pid]</td>
                                <td>$row[pname]</td>
                                <td><img src='$row[pimage]' width='50px' ></td>
                                <td>$row[units]</td>
                                <td>$row[total]</td>
                                <td>$row[address]</td>
                                <td>$row[mobile]</td>
                                </tr>
                                ";
                            }
                        ?>
                    </tbody>
                </table>        
            </div>
        </div>
    </div>
</body>

</html>

<?php
    $email =  $_GET['email'];
    $pid = $_GET['id'];

    // echo $pid."<br>".$email;

    include 'config.php';
    $data = mysqli_query($conn, "SELECT * FROM `products` WHERE id='$pid'");
    $row = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order product</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    
    <div class="form-container">
        <div class="form bg-success-subtle">
            <h3>Product Information</h3>
            <form action="orderAction.php" method="post">
                <h6>Product Name: <?php echo $row['name']?></h6>

                <h6>Processor: <?php echo $row['processor']?></h6>

                <h6>RAM: <?php echo $row['ram']?></h6>

                <h6>ROM: <?php echo $row['rom']?></h6>

                <h6>Unit Price: <?php echo $row['price']?></h6>

                <h6>Product Image:</h6>
                <img src="<?php echo $row['image'] ?>" alt="" width='200px' id='preview'> <br><br>

                <h6>Unit: <strong><span id='unit'></span></strong></h6>
                <div class="d-flex w-25 mb-2">
                    <button type="button" class="btn btn-outline-dark mx-2" onclick='plus()'>+</button>
                    <button type="button" class="btn btn-outline-dark" onclick='minus()'>-</button>
                </div>
                

                <h5 class="mb-4">Total Price: <strong><span id='total'><?php echo $row['price']?></span></strong></h5>

                <h3>Your delivery details:</h3>
                <h6>Shipping Address:</h6>
                <input type="text" name="address" >

                <h6>Mobile:</h6>
                <input type="text" name="mobile" >

                <input type="hidden" name="email" value="<?php echo $email ?>">
                <input type="hidden" name="pid" value="<?php echo $pid ?>">
                <input type="hidden" name="pname" value="<?php echo $row['name']?>">
                <input type="hidden" name="pimage" value="<?php echo $row['image']?>">
                <input type="hidden" name="total" id='totalPrice'>
                <input type="hidden" name="units" id='units'>



                <button class="btn mt-2 w-100 fw-bold" style='background-color: teal; color: #fff'>Place Order</button>
                <a href="products.php" class="btn btn-outline-dark mt-1 w-100">Cancel</a>
            </form>
        </div>
    </div>

    
    <script>
        var u = 1;
        var unitPrice = +document.getElementById("total").innerHTML;
        // console.log(unitPrice);
        var total = unitPrice;
        document.getElementById('unit').innerHTML = u;
        document.getElementById('totalPrice').value = total;
        document.getElementById('units').value = u;
        function plus() {
            u++;
            total = unitPrice*u;
            document.getElementById('unit').innerHTML = u;
            document.getElementById('total').innerHTML = total;
            document.getElementById('totalPrice').value = total;
            document.getElementById('units').value = u;
        }
        function minus() {
            if (u>1) {
                u--; 
                total = unitPrice*u;
                document.getElementById('unit').innerHTML = u;
                document.getElementById('total').innerHTML = total;
                document.getElementById('totalPrice').value = total;
                document.getElementById('units').value = u;
            }
        }

        
    </script>
</body>

</html>
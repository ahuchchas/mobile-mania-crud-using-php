<?php
    include 'config.php';

    $email = $_POST['email'];
    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $pimage = $_POST['pimage'];
    $units = $_POST['units'];
    $total = $_POST['total'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];

    // echo $units."<br>".$total;

    $insert_query = "INSERT INTO `orders`(`email`, `pid`, `pname`, `pimage`, `units`, `total`, `address`, `mobile`) VALUES ('$email','$pid','$pname','$pimage','$units','$total','$address','$mobile')";

    if(mysqli_query($conn, $insert_query)) {
        echo "<script>alert('Order placed successfully. We will contact you soon. Thank you.')</script>";
        echo "<script>location.href='orders.php'</script>";
    }

?>
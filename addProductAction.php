<?php
    include 'config.php';

    $name = $_POST['name'];
    $proc = $_POST['proc'];
    $ram = $_POST['ram'];
    $rom = $_POST['rom'];
    $price = $_POST['price'];
   

    // echo $name."<br>";
    // echo $proc."<br>";
    // echo $ram."<br>";
    // echo $rom."<br>";
    // echo $price."<br>";
    // echo "<pre>";
    // print_r($img);
    // echo "</pre>";

    $img_src = $_FILES['img']['tmp_name'];
    $data = $_FILES['img']['name'];    
    $ext = substr($data, strpos($data, "."));//finding extension of uploded image
    $img_des = "images/".$name.$ext;
    move_uploaded_file($img_src, $img_des);

    $insert_query = "INSERT INTO `products`(`name`, `processor`, `ram`, `rom`, `price`, `image`) VALUES ('$name','$proc','$ram','$rom','$price','$img_des')";

    $duplicate=mysqli_query($conn,"SELECT `name` FROM `products` WHERE name='$name'");
    if(mysqli_num_rows($duplicate)>0) {
        echo "<script>alert('This product is already added. Try with a different product name')</script>";
        echo "<script>location.href='addProduct.php'</script>";
    }
    else {
        if(mysqli_query($conn, $insert_query)) {
            // echo "<script>alert('Product added successfully.')</script>";
            echo "<script>location.href='products.php'</script>";
        }
    }
?>
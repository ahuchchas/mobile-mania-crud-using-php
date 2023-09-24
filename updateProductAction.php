<?php
    include 'config.php';

    $id = $_POST['id'];
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
    if($_FILES['img']['size'] == 0) {
        $defaultImg = $_POST['defaultImg'];
        $ext = substr($defaultImg, strpos($defaultImg, "."));
        $img_des = "images/".$name.$ext;
        rename($defaultImg, $img_des);

    } else {
        // echo "<script>alert('else block')</script>";
        $img_src = $_FILES['img']['tmp_name'];
        $data = $_FILES['img']['name'];    
        $ext = substr($data, strpos($data, "."));//finding extension of uploded image
        $img_des = "images/".$name.$ext;
        move_uploaded_file($img_src, $img_des);
    }

    

    $update_query = "UPDATE `products` SET `name`='$name',`processor`='$proc',`ram`='$ram',`rom`='$rom',`price`='$price',`image`='$img_des' WHERE id = '$id'";

    $duplicate=mysqli_query($conn,"SELECT `name` FROM `products` WHERE name='$name' AND id!='$id'");
    if(mysqli_num_rows($duplicate)>0) {
        echo "<script>alert('This name is already taken. Try with a different product name')</script>";
        echo "<script>location.href='updateProduct.php? id=$id'</script>";
    }
    else {
        if(mysqli_query($conn, $update_query)) {
              echo "<script>location.href='products.php'</script>";
        }
    }
?>
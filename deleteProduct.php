<?php
    include 'config.php';
    $id = $_GET['id'];
    // echo $id;
    $delete_query = "DELETE FROM `products` WHERE id='$id'";
    mysqli_query($conn, $delete_query);//delete from db

    $img_src = $_GET['image'];
    // echo $img_src;
    unlink($img_src);//delete image from server image folder
    echo "<script>location.href='products.php'</script>";
?>
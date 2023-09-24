<?php 
    $id = $_POST['adminid'];
    $pass = $_POST['adminpass'];

    // echo $id, $pass;

    if($id == 'admin' && $pass == 'admin') {
        session_start();
        $_SESSION['admin'] = 'admin';
        echo "<script>location.href='products.php'</script>";
    }
    else {
        echo "<script>alert('wrong id or password!')</script>";
        echo "<script>location.href='admin.php'</script>";
    }
?>
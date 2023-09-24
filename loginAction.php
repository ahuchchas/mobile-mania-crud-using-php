<?php
    include 'config.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM `users` WHERE email='$email' AND password='$pass'";
    $data = mysqli_query($conn, $query);
    if(mysqli_num_rows($data) > 0) {
        session_start();
        $_SESSION["user"] = $email;

        echo "<script>location.href='index.php'</script>";
    } else {
        echo "<script>alert('login failed')</script>";
        echo "<script>location.href='login.html'</script>";
    }


?>
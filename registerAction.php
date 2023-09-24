<?php
    include 'config.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $pass = $_POST['pass'];

    // echo "$name $mobile $email $pass";
    
    $insert_query = "INSERT INTO `users`(`name`, `email`, `mobile`, `password`) VALUES ('$name','$email','$mobile','$pass')";

    $duplicate=mysqli_query($conn,"SELECT `email` FROM `users` WHERE email='$email'");
    if(mysqli_num_rows($duplicate)>0) {
        echo "<script>alert('This email is already registered. Try with a different email')</script>";
        echo "<script>location.href='register.html'</script>";
    }
    else {
        if(mysqli_query($conn, $insert_query)) {
            // echo "<script>alert('Registered successfully.')</script>";
            session_start();
            $_SESSION["user"] = $email;
            echo "<script>location.href='index.php'</script>";
        }
    }

?>
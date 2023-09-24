<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="form.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>

    <body>
        <div class="form-container">
            <div class="form bg-success-subtle">
                <h2>Admin Login</h2>
                <form action="adminAction.php" method="post" >
                    <h6>Admin ID:</h6>
                    <input type="text"  name="adminid">
                    <p class="error" ></p>

                    <h6>Admin Password:</h6>
                    <input type="text" name="adminpass"><br>
                    <p class="error" ></p>

                    <button>Login as admin</button>
                </form>
            </div>
        </div>
    </body>

</html>


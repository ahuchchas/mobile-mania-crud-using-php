<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    
    <div class="form-container">
        <div class="form bg-success-subtle">
            <h3>Add Product</h3>
            <form action="addProductAction.php" method="post" enctype='multipart/form-data' onsubmit="productValidation(event)" id='pform'>
                <h6>Product Name:</h6>
                <input type="text" id="name" name="name">
                <p class="error" id="ename"></p>

                <h6>Processor:</h6>
                <input type="text" id="proc" name='proc'>
                <p class="error" id="eproc"></p>

                <h6>RAM:</h6>
                <input type="text" id="ram" name='ram'>
                <p class="error" id="eram"></p>

                <h6>ROM:</h6>
                <input type="text" id="rom" name='rom'><br>
                <p class="error" id="erom"></p>

                <h6>Price:</h6>
                <input type="text" id="price" name='price'><br>
                <p class="error" id="eprice"></p>

                <h6>Product Image:</h6>
                <input type="file" name='img' required id="imgInp"><br><br>
                
                <h6>Image preview:</h6>
                <img src="<?php echo $row['image'] ?>" alt="" width='200px' id='preview'> <br><br>

                <button class="btn btn-dark mt-1 w-100 fw-bold">Add product</button>
                <a href="products.php" class="btn btn-secondary mt-1 w-100">Cancel</a>
            </form>
        </div>
    </div>

    <script src="addProduct.js"></script>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>
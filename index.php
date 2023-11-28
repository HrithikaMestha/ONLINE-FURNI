<!DOCTYPE html>
<html>
<head>
	<title>Image Upload Using PHP</title>
	<style>
body {
            font-family: Arial, sans-serif;
			display: flex;
			justify-content: center;
            align-items: center;
			background: url(beauty.webp) no-repeat;
            background-size: cover;
            background-position: center;
			min-height: 100vh;
        }

        .container {
            width: 50%;
            margin: 0 auto;
			padding: 10px;
			background: transparent;
			backdrop-filter: blur(20px);
            box-shadow: 0 0 10px rgba(0, 0, 0, .1);
			color: aliceblue;
            border-radius: 10px;
            padding: 30px 40px;
        }

        form {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        label, input {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 50%;
            padding: 10px;
        }

        input[type="number"] {
            width: 50%;
            padding: 10px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }
      

		
	</style>
</head>
<body>
	<?php if (isset($_POST['error'])): ?>
		<p><?php echo $_POST['error']; ?></p>
	<?php endif ?>
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productType = $_POST['product'];
    // Retrieve other product information from $_POST
    header("Location: upload.php?type=$productType");
    exit();
}
?>
    <div class="container">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="description">Description:</label>
            <input type="text" id="description" name="description" placeholder="Enter the Description" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" placeholder="Enter the Price" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="my_image">

            <label>Select Product Type:</label>
            
                    <input type="radio" id="sofa" name="productType" value="sofa">
                    <label>Sofa</label>
                  <input type="radio" id="wardrobe" name="productType" value="wardrobe">
                   <label> Wardrobe</label>
                <input type="radio" id="dining" name="productType" value="dining">
                    <label> Dining</label>

                <input type="radio" id="beds" name="productType" value="beds">
                    <label>Beds</label>
              
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
	 
</body>
</html>
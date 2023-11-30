<?php
require 'index.php';

function dataFilter($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

session_start();
require 'db_conn.php';

if (isset($_GET['submit'])) {
    $conn = include 'db_conn.php'; // Assuming db_conn.php returns a valid database connection
    $sql = "SELECT * FROM sofa WHERE id = 7";
    $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="sofas.css">
</head>

<body>
    <?php
    while ($row = $result->fetch_array()) :
        $picDestination = "images/" . $row['image_url'];
    ?>

        <div class="product">
            <img src="<?php echo $picDestination; ?>" alt="Product 1">
            <h2><?php echo $row['Description']; ?></h2>
            <p><?php echo $row['price']; ?></p>
            <button>Buy Now</button>
        </div>

    <?php endwhile; ?>
</body>

</html>

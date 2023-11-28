<?php 

if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
    include "db_conn.php";

    echo "<pre>";
    print_r($_FILES['my_image']);
    echo "</pre>";

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];
    $decription = $_POST['description'];
    $price = $_POST['price'];
    if (isset($_POST['productType'])){
        $productType= $_POST['productType'];
    }
    if ($error === 0) {
        if ($img_size > 60000000000) {
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        } else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png", "webp");

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                $img_upload_path = 'uploads/' . $new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                switch ($productType) {
                    case 'sofa':
                        $sql = "INSERT INTO sofa(image_url,description,price) VALUES('$new_img_name','$decription', '$price')";
                        break;
                    case 'wardrobes':
                        $sql = "INSERT INTO wardrobes (image_url, description,price) VALUES('$new_img_name','$decription', '$price')";
                        break;
                    case 'dining':
                        $sql = "INSERT INTO dining (image_url, description,price) VALUES('$new_img_name','$decription', '$price')";
                        break;
                    case 'beds':
                        $sql = "INSERT INTO beds(image_url, description,price) VALUES('$new_img_name','$decription', '$price')";
                        break;
                    default:
                        $em = "Unknown product type.";
                        header("Location: index.php?error=$em");
                        exit();
                }
                mysqli_query($conn, $sql);
                header("Location: main.html");
                exit();
            } else {
                $em = "You can't upload files of this type";
                header("Location: index.php?error=$em");
            }
        }
    } else {
        $em = "Unknown error occurred!";
        header("Location: index.php?error=$em");
    }
} else {
    header("Location: index.php");
}

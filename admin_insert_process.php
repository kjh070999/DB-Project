<?php
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $product_image = addslashes(file_get_contents($_FILES['product_image']['tmp_name']));

    $sql = "INSERT INTO products (product_id, product_name, price, product_image) VALUES ('$product_id', '$product_name', $price, '$product_image')";
    mysqli_query($conn, $sql);

    header('Location: admin.php');
?>
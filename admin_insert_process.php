<?php
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $sql = "INSERT INTO product (name, price, image) VALUES ('$name', $price, '$image')";
    mysqli_query($conn, $sql);

    header('Location: admin.php');
?>
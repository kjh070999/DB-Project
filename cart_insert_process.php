<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $ID = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    $q = "SELECT * FROM products WHERE product_id ='$product_id'";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($result);


    $product_name = $row['product_name'];
    $price = $row['price'];
    $product_image = base64_encode($row['product_image']);

    $q = "INSERT INTO carts (ID, product_id, product_name, price, product_image) VALUES ('$ID', '$product_id', '$product_name', '$price', '0')";
    $result = mysqli_query($conn, $q);

    if($result) {
        echo "<script>alert('장바구니에 추가되었습니다.')</script>";
        echo "<script>location.replace('main.php');</script>";
        exit;
    } else {
        echo "<script>alert('장바구니 추가에 실패했습니다.')</script>";
        echo "<script>location.replace('main.php');</script>";
        exit;
    }
} else {
    echo "<script>alert('로그인 후 이용해주세요.')</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}
?>
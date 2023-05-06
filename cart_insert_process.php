<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $ID = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];

    $q = "INSERT INTO carts (ID, product_id) VALUES ('$ID', '$product_id')";
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

변경전
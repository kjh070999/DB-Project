<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $user_id = $_SESSION['user_id'];
    $p_ID = $_POST['ID'];

    $q = "SELECT * FROM product WHERE ID='$p_ID'";
    $result = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $price = $row['price'];
    $image = base64_encode($row['image']);

    $q = "INSERT INTO cart (u_ID, p_ID, name, price, image) VALUES ('$user_id', '$p_ID', '$name', '$price', '0')";
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
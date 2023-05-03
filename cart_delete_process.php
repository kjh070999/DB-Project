<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $user_id = $_SESSION['user_id'];
    $p_ID = $_POST['p_ID'];

    $q = "DELETE FROM cart WHERE p_ID='$p_ID' AND u_ID='$user_id'";
    $result = mysqli_query($conn, $q);

    if($result) {
        echo "<script>alert('상품이 삭제되었습니다.')</script>";
        echo "<script>location.replace('cart.php');</script>";
        exit;
    } else {
        echo "<script>alert('상품 삭제에 실패했습니다.')</script>";
        echo "<script>location.replace('cart.php');</script>";
        exit;
    }
} else {
    echo "<script>alert('로그인 후 이용해주세요.')</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}
?>
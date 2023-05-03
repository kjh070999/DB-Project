<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

$host = 'localhost:3306';
$user = 'root';
$pw = '11111111';
$db_name = 'store';
$conn = mysqli_connect($host, $user, $pw, $db_name);

$signup_id = $_POST['user_id'];
$signup_pw = $_POST['user_pw'];
$signup_check_pw = $_POST['check_user_pw'];

$query = "SELECT * FROM users WHERE user_id='$signup_id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
   echo '<script>alert("이미 사용 중인 아이디입니다. 다른 아이디를 선택해주세요.");</script>';
   echo '<script>history.back();</script>';
} elseif ($signup_pw != $signup_check_pw) {
   echo '<script>alert("입력한 두 비밀번호가 일치하지 않습니다. 다시 입력해주세요.");</script>';
   echo '<script>history.back();</script>';
} else {
   $sql = "INSERT INTO users (user_id, user_pw, user_admin) VALUES ('$signup_id', '$signup_pw', 0)";

   if ($signup_id == "" || $signup_pw == "" || $signup_check_pw == "") {
       echo '<script>alert("비어있는 항목이 있습니다.");</script>';
       echo '<script>history.back();</script>';
   } else {
       mysqli_query($conn, $sql);
       echo '<script>alert("회원 가입이 완료되었습니다.");</script>';
       echo "<script>location.replace('login.php');</script>";
   }
}
?>
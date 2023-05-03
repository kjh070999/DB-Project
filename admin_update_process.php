<?php
  $conn = mysqli_connect("localhost", "root", "11111111", "store");

  $ID = $_POST['ID'];
  $name = $_POST['name'];
  $price = $_POST['price'];

  if(!empty($_FILES['image']['tmp_name'])) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $sql = "UPDATE product SET name='$name', price=$price, image='$image' WHERE ID=$ID";
  } else {
    $sql = "UPDATE product SET name='$name', price=$price WHERE ID=$ID";
  }

  $result = mysqli_query($conn, $sql);

  if($result === false) {
    echo '수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.';
    error_log(mysqli_error($conn));
  } else {
    header('Location: admin.php');
  }
?>
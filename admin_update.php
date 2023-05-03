<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STORE</title>
  </head>
  <body>
    <h1>관리자모드 - 상품 수정</h1>

    <?php
      session_start();
      if(isset($_SESSION['user_id'])) {
          $user_id = $_SESSION['user_id'];
          echo "<a href='logout.php'>로그아웃</a>";
      }
    ?>

    <?php
      $conn = mysqli_connect("localhost", "root", "11111111", "store");

      $ID = $_POST['ID'];
      $sql = "SELECT * FROM product WHERE ID=$ID";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      $name = $row['name'];
      $price = $row['price'];
      $image = $row['image'];
    ?>

    <form method="post" action="admin_update_process.php" enctype="multipart/form-data">
      <input type="hidden" name="ID" value="<?php echo $ID; ?>">
      <label>상품명</label>
      <input type="text" name="name" value="<?php echo $name; ?>" required>
      <br>
      <label>가격</label>
      <input type="number" name="price" value="<?php echo $price; ?>" required>
      <br>
      <label>이미지</label>
      <input type="file" name="image">
      <br>
      <img src="data:image/jpeg;base64,<?php echo base64_encode($image); ?>" alt="상품 이미지" width="200">
      <br>
      <button type="submit">수정하기</button>
    </form>
  </body>
</html>
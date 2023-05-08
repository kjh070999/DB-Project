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

      $product_id = $_POST['product_id'];

      $sql = "SELECT * FROM products WHERE product_id='$product_id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $product_name = $row['product_name'];
      $price = $row['price'];
      $product_image = $row['product_image'];
    ?>

    <form method="post" action="admin_update_process.php" enctype="multipart/form-data">
      <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
      <label>상품명</label>
      <input type="text" name="product_name" value="<?php echo $product_name; ?>" required>
      <br>
      <label>가격</label>
      <input type="number" name="price" value="<?php echo $price; ?>" required>
      <br>
      <label>이미지</label>
      <input type="file" name="product_image">
      <br>
      <img src="data:product_image/jpeg;base64,<?php echo base64_encode($product_image); ?>" alt="상품 이미지" width="200">
      <br>
      <button type="submit">수정하기</button>
    </form>
  </body>
</html>

<style>
  body{
    margin: 0 80px;
  }
</style>
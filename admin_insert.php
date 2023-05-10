<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STORE</title>
  </head>
  <body>
    <h1>제품 추가</h1>
    <form method="post" action="admin_insert_process.php" enctype="multipart/form-data">
      <label>product_id:</label><input type="text" name="product_id"><br>
      <label>fabric:</label>
      <select name="fabric_id">
        <?php
          $conn = mysqli_connect("localhost", "root", "11111111", "store");
          $sql = "SELECT * FROM fabric";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['fabric_id'] . '">' . $row['fabric_id'] . '</option>';
          }
        ?>
      </select><br>
      <label>product_name:</label><input type="text" name="product_name"><br>
      <label>form:</label>
      <select name="form">
        <?php
          $conn = mysqli_connect("localhost", "root", "11111111", "store");
          $sql = "SELECT  distinct form  FROM form";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['form'] . '">' . $row['form'] . '</option>';
          }
        ?>
      </select><br>
      <label>size:</label>
      <select name="size">
        <?php
          $conn = mysqli_connect("localhost", "root", "11111111", "store");
          $sql = "SELECT distinct size FROM form";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['size'] . '">' . $row['size'] . '</option>';
          }
        ?>
      </select><br>
      <label>price:</label><input type="text" name="price"><br>
      <label>product_image:</label><input type="file" name="product_image"><br>
      <input type="submit" value="추가">
    </form>
  </body>
</html>

<style>
  body{
    margin: 0 80px;
  }
</style>
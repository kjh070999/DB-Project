<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STORE</title>
  </head>
  <body>
    <h1>제품 추가</h1>
    <form method="post" action="admin_insert_process.php" enctype="multipart/form-data">
      <label>상품명:</label><input type="text" name="name"><br>
      <label>가격:</label><input type="text" name="price"><br>
      <label>이미지:</label><input type="file" name="image"><br>
      <input type="submit" value="추가">
    </form>
  </body>
</html>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STORE</title>
  </head>
    <div align = 'center'>
      <h1 style='font-family: "Arial Black", sans-serif; font-size: 52px;'>
        관리자모드
      </h1>
    </div>
    <div align = 'right'>
      <?php
        session_start();
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            echo "<a href='logout.php' class='btn-login'>로그아웃</a></br>";
        }
      ?>
    
      <a href = 'admin.php' class = 'btn-login'> UPDATE/DELETE </a>
      <span style='margin-left: 20px'></span>
      <a href = 'admin_insert.php'class = 'btn-login'> INSERT </a>
    </div>
    <table>
      <tbody>
        <?php
          $conn = mysqli_connect("localhost", "root", "11111111", "store");

          $sql = "SELECT * FROM products";
          $result = mysqli_query($conn, $sql);

          echo "<table>";
          echo "<tr>";
          echo "<th>이미지</th>";
          echo "<th>상품명</th>";
          echo "<th>가격</th>";
          echo "<th>업데이트</th>";
          echo "<th>삭제</th>";
          echo "</tr>";
          while ($row = mysqli_fetch_assoc($result)) {

            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $price = $row['price'];
            $product_image = $row['product_image'];
            echo "<tr>";
            echo "<td><img src='data:image/jpeg;base64," . base64_encode($product_image) . "' alt='상품 이미지' width='200'></td>";
            echo "<td class='product-name'>$product_name</td>";
            echo "<td class='product-price'>$price 원</td>";
            echo "<td>";
            echo "<form method='post' action='admin_update.php'>";
            echo "<input type='hidden' name='product_id' value='$product_id'>";
            echo "<button class='btn' button type='submit'>UPDATE</button>";
            echo "</form>";
            echo "</td>";
            echo "<td>";
            echo "<form method='post' action='admin_delete_process.php'>";
            echo "<input type='hidden' name='product_id' value='$product_id'>";
            echo "<button class='btn' button type='submit'>DELETE</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
          }
          echo "</table>";
        ?>
      </tbody>
    </table>


  </body>
</html>

<style>
  table {
    border-collapse: collapse;
    width: 100%;
    margin-bottom: 20px;
  }
  th, td {
    text-align: left;
    padding: 12px;
  }
  th {
    background-color: #ddd;
  }
  tr:nth-child(even) {
    background-color: #f2f2f2;
  }
  tr:hover {
    background-color: #ddd;
  }
  .product-image {
    width: 120px;
    height: 120px;
    object-fit: contain;
  }
  .product-name {
    font-weight: bold;
  }
  .product-price {
    color: #f60;
    font-size: 16px;
    font-weight: bold;
  }
  .btn {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
  }
  .btn:hover {
    background-color: #3e8e41;
  }

  .btn-login, .btn-join {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;
  }
  .btn-login:hover, .btn-join:hover {
    background-color: #3e8e41;
  }
</style>
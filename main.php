<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STORE</title>
  </head>
    <div align = 'center'>
      <h1 style='font-family: "Arial Black", sans-serif; font-size: 52px;'>
        <a href="main.php">SHOP</a>
      </h1>
    </div>
    <div align = 'right'>
      <?php
        session_start();
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            $conn = mysqli_connect("localhost", "root", "11111111", "store");

            $sql = "SELECT user_ID FROM users where ID = $user_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<span style='font-size: 24px; color: #333; margin-right: 10px;'>{$row['user_ID']}님 환영합니다</span></br>";

            echo "<a href='logout.php' class='btn-login'>로그아웃</a>";
            echo "<span style='margin-left: 10px'></span>";
            echo "<a href='cart.php' class='btn'>장바구니</a>";        
        }
        else {
            echo "<a href='login.php' class='btn-login'>로그인</a>";
            echo "<span style='margin-left: 10px'></span>";
            echo "<a href='join.php' class='btn-join'>회원가입</a>";
        }
      ?>
    </div>
    <ol>
      <a href = "product_1.php">제품1</a><br>
      <a href = "product_2.php">제품2</a>
    </ol>

    <h2>인기상품</h2>

    <?php
      $conn = mysqli_connect("localhost", "root", "11111111", "store");

      $sql = "SELECT * FROM product";
      $result = mysqli_query($conn, $sql);

      echo "<table>";
      echo "<tr>";
      echo "<th>이미지</th>";
      echo "<th>상품명</th>";
      echo "<th>가격</th>";
      echo "<th>상세정보</th>";
      echo "<th>장바구니</th>";
      echo "</tr>";
      while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $name = $row['name'];
        $price = $row['price'];
        $image = $row['image'];
        echo "<tr>";
        echo "<td><img class='product-image' src='data:image/jpeg;base64," . base64_encode($image) . "' alt='상품 이미지'></td>";
        echo "<td class='product-name'>$name</td>";
        echo "<td class='product-price'>$price 원</td>";
        echo "<td><form method='post' action='detail.php'><input type='hidden' name='ID' value='$ID'><button class='btn' type='submit'>상세정보</button></form></td>";
        echo "<td><form method='post' action='cart_insert_process.php'><input type='hidden' name='ID' value='$ID'><button class='btn' type='submit'>장바구니</button></form></td>";
        echo "</tr>";
      }
      echo "</table>";
    ?>

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

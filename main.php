<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>STORE</title>
  </head>
    <div style="background-color: #f2f2f2; padding: 20px;">
          <div align="center">
              <h1 style="font-family: 'Arial Black', sans-serif; font-size: 72px; color: #555555;">
                  <a href="main.php" style="text-decoration: none; color: #555555;">COTTON GALLERY</a>
              </h1>
              <p style="font-family: Arial, sans-serif; font-size: 24px; color: #888888;">The Best Cotton Products</p>
          </div>
      </div>
    <div align = 'right'>
      <?php
        session_start();
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            $conn = mysqli_connect("localhost", "root", "11111111", "store");

            $sql = "SELECT name FROM user where ID = $user_id";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo "<span style='font-size: 24px; color: #333; margin-right: 10px;'>{$row['name']}님 환영합니다</span></br>";

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
      <li><a href="product_bedding_home.php">이불</a></li>
      <li><a href="product_pillow_home.php">베개</a></li>
    </ol>

    <h2>인기상품</h2>

    <?php
      $conn = mysqli_connect("localhost", "root", "11111111", "store");

      $sql = "SELECT * FROM products";
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
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $product_image = $row['product_image'];



        echo "<tr>";
        echo "<td><img class='product-image' src='data:image/jpeg;base64," . base64_encode($product_image) . "' alt='상품 이미지'></td>";
        echo "<td class='product-name'>$product_name</td>";
        echo "<td class='product-price'>$price 원</td>";
        echo "<td><form method='post' action='detail.php'><input type='hidden' name='product_id' value='$product_id'><button class='btn' type='submit'>상세정보</button></form></td>";
        echo "<td><form method='post' action='cart_insert_process.php'><input type='hidden' name='product_id' value='$product_id'><button class='btn' type='submit'>장바구니</button></form></td>";
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
    width: 200px;
    height: 200px;
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

  ol {
    margin: 0;
    padding: 0;
    list-style-type: none;
  }

  ol li {
    margin: 10px 0;
  }

  ol a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: black;
    font-size: 20px;
    font-weight: bold;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
  }

  ol a:hover {
    background-color: lightgray;
    color: white;
  }

  ol ol {
    margin: 0;
    padding: 0;
    list-style-type: none;
    margin-left: 20px;
  }

  ol ol a {
    font-size: 16px;
    font-weight: normal;
  }
</style>

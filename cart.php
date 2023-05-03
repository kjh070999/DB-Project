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
    <?php
      session_start();
      if(isset($_SESSION['user_id'])) {
          $user_id = $_SESSION['user_id'];
          echo "<a href='logout.php'>로그아웃</a>";
          echo "<span style='margin-left: 10px'></span>";
          echo "<a href='cart.php'>장바구니</a>";
      }
      else {
          echo "<a href='login.php'>로그인</a>";
          echo "<span style='margin-left: 10px'></span>";
          echo "<a href='join.php'>회원가입</a>";
      }
    ?>

<?php
session_start();

if(isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "11111111", "store");

    $ID = $_SESSION['user_id'];

    $q = "SELECT * FROM carts WHERE ID='$ID'";
    $result = mysqli_query($conn, $q);

    if(mysqli_num_rows($result) > 0) {
        $total_price = 0;

        echo "<table>";
        echo "<tr>";
        echo "<th>사진</th>";
        echo "<th>상품 이름</th>";
        echo "<th>가격</th>";
        echo "<th>삭제</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><img src='data:image/jpeg;base64,".base64_encode($row['product_image'])."'></td>";
            echo "<td>".$row['product_name']."</td>";
            echo "<td>".$row['price']."</td>";
            echo "<td><form method='POST' action='cart_delete_process.php'><input type='hidden' name='product_id' value='".$row['product_id']."'><button class='cart-btn' type='submit'>삭제</button></form></td>";
            echo "</tr>";

            $total_price += $row['price'];
        }

        echo "</table>";

        echo "<p style='font-size: 24px; text-align: right;'> 총 합계 금액: ".$total_price."원</p>";

        echo "<form method='post' action='purchase.php'>";
        echo "<input type='hidden' name='ID' value='$ID'>";
        echo "<button class = 'purchase-btn' button type='submit'>주문하기</button>";
        echo "</form>";
    } else {
        echo "<p class='empty-cart'>장바구니가 비어있습니다.</p>";
    }
} else {
    echo "<script>alert('로그인 후 이용해주세요.')</script>";
    echo "<script>location.replace('login.php');</script>";
    exit;
}
?>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .cart-btn {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .cart-btn:hover {
        background-color: #3e8e41;
    }

    .purchase-btn {
        display: block;
        margin: 0 auto;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        cursor: pointer;
        border-radius: 4px;
    }

    .purchase-btn:hover {
        background-color: #3e8e41;
    }

    .empty-cart {
        font-size: 18px;
        text-align: center;
        margin: 20px;
    }
</style>
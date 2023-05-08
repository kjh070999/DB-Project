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
      <span style='margin-left: 20px'></span>
      <a href = 'admin_order.php'class = 'btn-login'> 주문확인 </a>
    </div>

    <?php
        session_start();
        $conn = mysqli_connect("localhost", "root", "11111111", "store");

        if (isset($_POST['submit'])) {
            $order_id = $_POST['order_id'];
            $process = $_POST['process'];

            $q = "UPDATE order_queue SET process = '$process' WHERE order_id = '$order_id'";
            $result = mysqli_query($conn, $q);

            if ($result) {
                echo "<script>alert('주문 상태가 변경되었습니다.')</script>";
            } else {
                echo "<script>alert('주문 상태 변경에 실패하였습니다.')</script>";
            }
        }

        $q = "SELECT * FROM order_queue";
        $result = mysqli_query($conn, $q);

        
        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row['ID'];
            $order_id =  $row['order_id'];
            $total_price = $row['total_price'];
            $process = $row['process'];
            $p = "SELECT * FROM order_sheet WHERE order_id = '$order_id'";
            $presult = mysqli_query($conn, $p);

            $r = "SELECT * FROM user WHERE ID = '$ID'";
            $rresult = mysqli_query($conn, $r);
            $rrow = mysqli_fetch_assoc($rresult);
            $name = $rrow['name'];

            echo "<table>";
            echo "<tr>";
            echo "<th>주문 번호</th>";
            echo "<th>구매자</th>";
            echo "<th>상품명</th>";
            echo "<th>개수</th>";
            echo "<th>총 금액</th>";
            echo "<th>주문 진행 상황</th>";
            echo "</tr>";

            while($prow = mysqli_fetch_assoc($presult)) {
                $product_id = $prow['product_id'];
                $count = $prow['count'];

                echo "<tr>";
                echo "<td>".$order_id."</td>";
                echo "<td>".$name."</td>";
                echo "<td>".$product_id."</td>";
                echo "<td>".$count."개</td>";
                echo "<td>".$total_price."원</td>";
                echo "<td>";

                echo "<div class = 'order-status'>";
                echo "<form method='post' action='".$_SERVER['PHP_SELF']."'>";
                echo "<input type='hidden' name='order_id' value='".$order_id."'>";
                echo "<select name='process' class = 'order-status-select'>";
                echo "<option value='입금확인중' ".($process == '입금확인중' ? 'selected' : '').">입금확인중</option>";
                echo "<option value='입금확인완료' ".($process == '입금확인완료' ? 'selected' : '').">입금확인완료</option>";
                echo "<option value='배송중' ".($process == '배송중' ? 'selected' : '').">배송중</option>";
                echo "<option value='배송완료' ".($process == '배송완료' ? 'selected' : '').">배송완료</option>";
                echo "</select>";
                echo "<input type='submit' name='submit' value='변경' class = 'order-status-submit'>";
                echo "</form>";
                echo "</div>";

                echo "</td>";
                echo "</tr>";
                
            }
            echo "</table><br><br><br>";
        }
    ?>

<style>
    body{
        margin: 0 80;
    }
    table {
        table-layout: fixed;
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
    .product-count-form {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .product-count-input {
        width: 50px;
        height: 30px;
        margin-left: 10px;
        border: 1px solid gray;
        border-radius: 5px;
        text-align: center;
        font-size: 16px;
    }
    .order-status {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .order-status-select {
        padding: 0.25rem 0.5rem;
        font-size: 1rem;
        border: none;
        background-color: #f5f5f5;
    }

    .order-status-submit {
        padding: 0.25rem 0.5rem;
        font-size: 1rem;
        border: none;
        background-color: #7f7f7f;
        color: #fff;
        cursor: pointer;
    }

    .order-status-submit:hover {
        background-color: #555;
    }
</style>
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

    <div align = 'center'>
      <h1 style='font-family: "Arial Black", sans-serif; font-size: 52px;'>
        주문 내역 확인
      </h1>
    </div>

    <div align = 'right'>
        <?php
        session_start();
        if(isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            echo "<a href='logout.php' class='btn-login'>로그아웃</a>";
            echo "<span style='margin-left: 10px'></span>";
            echo "<a href='cart.php' class='btn-login'>장바구니</a>";
            echo "<span style='margin-left: 10px'></span>";
            echo "<a href='purchase_check.php' class='btn-login'>주문확인</a>";
            echo "<p></p>";
        }
        else {
            echo "<a href='login.php'>로그인</a>";
            echo "<span style='margin-left: 10px'></span>";
            echo "<a href='join.php'>회원가입</a>";
        }
        ?>
    </div>

    <?php
        session_start();

        if(isset($_SESSION['user_id'])) {
            $conn = mysqli_connect("localhost", "root", "11111111", "store");

        $ID = $_SESSION['user_id'];

        $q = "SELECT * FROM order_queue WHERE ID = '$ID'";
        $result = mysqli_query($conn, $q);

        while ($row = mysqli_fetch_assoc($result)) {
            $order_id =  $row['order_id'];
            $total_price = $row['total_price'];
            $process = $row['process'];
            $p = "SELECT * FROM order_sheet WHERE order_id = '$order_id'";
            $presult = mysqli_query($conn, $p);

            echo "<table>";
            echo "<tr>";
            echo "<th>주문 번호</th>";
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
                echo "<td>".$product_id."</td>";
                echo "<td>".$count."개</td>";
                echo "<td>".$total_price."원</td>";
                echo "<td>".$process."</td>";
                echo "<td>";
                echo "</td>";
                echo "</tr>";
                
            }
            echo "</table><br><br><br>";
        }



        } else {
            echo "<script>alert('로그인 후 이용해주세요.')</script>";
            echo "<script>location.replace('login.php');</script>";
            exit;
        }
    ?>

<style>
    body{
        margin: 0 80px;
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
</style>

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
      }
      else {
          echo "<a href='login.php'>로그인</a>";
          echo "<span style='margin-left: 10px'></span>";
          echo "<a href='join.php'>회원가입</a>";
      }
    ?>
    <ol>
        <a href = "product_1_price.php">가격별</a><br>
        <a href = "product_1_season.php">계절별</a>
    </ol>

    <h2>제품1 계절별 인기상품</h2>

  </body>
</html>


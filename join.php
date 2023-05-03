<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>STORE</title>
    </head>
    <body>
        <div class="container">
            <h1 class="logo">
                <a href="main.php">SHOP</a>
            </h1>
            <form class="form" method="post" action="join_process.php">
                <h2>회원가입</h2>
                <input type="text" name="user_id" placeholder="user_id"><br>
                <input type="password" name="user_pw" placeholder="user_pw"><br>
                <input type="password" name="check_user_pw" placeholder="check user_pw"><br>
                <input type="submit" value="회원가입">
            </form>
        </div>
    </body> 
</html>
<style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    .container {
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
        text-align: center;
        padding: 20px;
    }

    .logo {
        font-family: "Arial Black", sans-serif;
        font-size: 52px;
        margin-bottom: 40px;
    }

    .form {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form h2 {
        margin-bottom: 30px;
    }

    .form input[type="text"],
    .form input[type="password"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: none;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .form input[type="submit"] {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    .form input[type="submit"]:hover {
        background-color: #3e8e41;
    }

    .error {
        color: red;
        margin-top: 20px;
    }
</style>
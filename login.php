<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./login.css">
        <title>スケジュール管理_ログイン</title>
    </head>
    <body>
        <h1>スケジュール管理　ログイン</h1>
        <form action="./login_check.php" method="post">
            <label for="">
                <span>アカウント名</span>
                <input type="text" name="account_name"><br>
            </label>
            <label for="">
                <span>パスワード</span>
                <input type="password" name="account_password"><br>
            </label>
            <label for="">
                <input type="submit" value="ログイン">
            </label>
        </form>
    </body>
</html>
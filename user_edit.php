<?php
session_start();

if($_SESSION["is_admin_user"] !== 1) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
}

?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./schedule_edit.css">
        <title>ユーザー編集</title>
    </head>
    <body>
        <h2>ユーザー編集</h2>
        <form action="./user_edit_action.php" method="post">
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=schedule_manage;charset=utf8', 'member', 'password');
                $sql_select = $pdo -> prepare('select id, member_name, is_schedule_member from user where id = ?');
                $sql_select -> execute([$_REQUEST['member_id']]);
                $result = $sql_select->fetch();
                if($result !== false) {
                    echo '<button type="submit" name="command" value="delete">削除</button>';
                }
            ?>
            <ul>
            <?php
                echo "<li>ユーザーid : {$result['id']} </li>";
                echo "<li>ユーザー名 : <input type='text' name='member_name' value='{$result['member_name']}'></li>";
            ?>
                
            </ul>
            <div class="button-div">
                    <?php
                        echo "<input type='hidden' name='member_id' value={$_REQUEST['member_id']}>";
                    ?>
                    <button type="submit" name="command" value="cancel">戻る</button>
                    <button type="submit" name="command" value="edit">編集を確定</button>
                    <button type="submit" name="command" value="change-password">パスワード変更</button>
            </div>
        </form>
        
        <script type="module" src=""></script>
    </body>
</html>
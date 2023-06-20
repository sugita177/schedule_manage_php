<?php
session_start();

if($_SESSION["is_admin_user"] !== 1 && $_SESSION["is_schedule_member"] !== 1) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
}

?>



<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./schedule_edit.css">
        <title>スケジュール編集</title>
    </head>
    <body>
        <h2>スケジュール編集</h2>
        <form action="./schedule_edit_action.php" method="post">
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=schedule_manage;charset=utf8', 'member', 'password');
                $sql_select = $pdo -> prepare('select content from schedule where member_id = ? and schedule_year =? and schedule_month = ? and schedule_day = ?');
                $sql_select -> execute([$_REQUEST['member_id'], $_REQUEST['year'], $_REQUEST['month'], $_REQUEST['day']]);
                $result = $sql_select->fetch();
                if($result !== false) {
                    echo '<button type="submit" name="command" value="delete">削除</button>';
                }
            ?>
            <ul>
            <?php
                echo "<li>名前　　 : {$_REQUEST['member']} </li>";
                echo "<li>年月日　 : {$_REQUEST['year']}年{$_REQUEST['month']}月{$_REQUEST['day']}日</li>";
                echo "<li>入力内容 : <input type='text' name='content' value='{$_REQUEST['content']}'></li>";
            ?>
            </ul>
            <div class="button-div">
                    <?php
                        echo "<input type='hidden' name='member_id' value={$_REQUEST['member_id']}>";
                        echo "<input type='hidden' name='member' value={$_REQUEST['member']}>";
                        echo "<input type='hidden' name='year' value={$_REQUEST['year']}>";
                        echo "<input type='hidden' name='month' value={$_REQUEST['month']}>";
                        echo "<input type='hidden' name='day' value={$_REQUEST['day']}>";
                    ?>
                    <button type="submit" name="command" value="cancel">戻る</button>
                    <button type="submit" name="command" value="edit">保存</button>
            </div>
        </form>
        
        <script type="module" src=""></script>
    </body>
</html>
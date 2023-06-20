<?php
session_start();

if($_SESSION["is_admin_user"] !== 1) {
    die(header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"));
}

if(isset($_SESSION["information"])){
    $information_message = $_SESSION["information"];
    $_SESSION["information"] = "";
}

?>


<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./user_table.css">
        <title>メンバー管理</title>
    </head>
    <body>
        <h2>メンバー管理</h2>
        <div class="information">
                <?php if(isset($information_message)){echo $information_message;} ?>
        </div>
        <p><a href="./schedule_table.php">戻る</a></p>

        <table class="user-table">
            <colgroup>
                <col span="1" class="date-column">
            </colgroup>
            <tbody>
                <tr class="top-row">
                    <th>id</th>
                    <th>ユーザー名</th>
                    <th>スケジュール表対象</th>
                    <th>編集ボタン</th>
                </tr>
                <?php 
                    $pdo = new PDO('mysql:host=localhost;dbname=schedule_manage;charset=utf8', 'member', 'password');
                    $sql_member = $pdo -> prepare("select id, member_name, is_schedule_member from user where is_admin_user <> 1 ");
                    $sql_member -> execute();
                ?>
                
                <?php
                    foreach($sql_member as $row) {
                        echo "<form action='./user_edit.php' method='GET'>";
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['member_name']."</td>";
                        echo "<td>".$row['is_schedule_member']."</td>";
                        echo "<input type='hidden' name='member_id' value={$row['id']}>";
                        echo "<td><input type='submit' value='編集'></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                ?>
            </tbody>
            
        </table>
        <p><a href="./user_create.php">新規作成</a></p>
    </body>
</html>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./schedule_edit.css">
        <title>スケジュール編集</title>
    </head>
    <body>
        <h2>スケジュール編集</h2>
        <form action="./schedule_table.php" method="get">
            <ul>
            <?php
                echo "<li>名前　　 : {$_REQUEST['member']} </li>";
                echo "<li>年月日　 : {$_REQUEST['year']}年{$_REQUEST['month']}月{$_REQUEST['day']}日</li>";
                echo "<li>入力内容 : <input type='text' name='content' value=''></li>";
            ?>
            </ul>
            <div class="button-div">
                <?php
                    echo "<input type='hidden' name='year' value={$_REQUEST['year']}>";
                    echo "<input type='hidden' name='month' value={$_REQUEST['month']}>";
                ?>
                <input type="submit" value="戻る">
                <input type="submit" value="送信">
            </div>
        </form>
        
        <script type="module" src=""></script>
    </body>
</html>
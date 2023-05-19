<?php require ("./schedule_date.php"); ?>

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./schedule_table.css">
        <title>スケジュール管理</title>
    </head>
    <body>
        <h2>スケジュール管理</h2>
        
        <?php //set year and month
            date_default_timezone_set('Asia/Tokyo');
            $nowYear = date('Y');
            $nowMonth = date('n');
            $year = $nowYear;
            $month = $nowMonth;
            if(isset($_REQUEST["year"]) && isset($_REQUEST["month"])){
                $year = $_REQUEST["year"];
                $month = $_REQUEST["month"];
            } 
            $yearMonth = new ScheduleDate($year, $month); 
        ?>

        <div class="input-year-month-div">
            <form action="./schedule_table.php" method="get">
                <select name="year" id="selectedYear">
                    <?php
                        for($i=2023; $i<=2025; $i++) {
                            if($i === (int)$year){
                                echo "<option value={$i} selected>{$i}</option>";
                            } else {
                            echo "<option value={$i}>{$i}</option>";
                            }
                        }
                    ?>
                </select>年
                <select name="month" id="selectedMonth">
                    <?php
                        for($i=1; $i<=12; $i++) {
                            if($i === (int)$month){
                                echo "<option value={$i} selected>{$i}</option>";
                            } else {
                            echo "<option value={$i}>{$i}</option>";
                            }
                        }
                    ?>
                </select>月
                <input type="submit" value="年月変更">
            </form>
        </div>

        <table class="schedule-table">
            <colgroup>
                <col span="1" class="date-column">
            </colgroup>
            <tbody id="scheduleTableBody">

                

                <tr class="top-row">
                    <th>
                        <?php echo "{$year}年{$month}月"; ?>
                    </th>
                    <?php
                        $members = ["Alice", "Bob", "Eve", "George", "Irvine"];
                        foreach ($members as $member) {
                            echo "<th>{$member}</th>";
                        }
                    ?>
                </tr>
                <?php
                    for ($day=1; $day <= $yearMonth->getDaysPerMonth(); $day++) {
                        echo "<tr>";
                            echo "<th>{$yearMonth->getMonth()}/{$day}({$yearMonth->getDayOfWeek($day)})</th>";
                            foreach ($members as $member) {
                                echo "<td>";
                                    echo "<div class='schedule-table-cell-div'>";
                                    echo "<div class='schedule-text-div'></div>";
                                        echo "<div class='.text-edit-button-div'>";
                                            echo "<form action='./schedule_edit.php' method='post'>";
                                                echo "<input type='hidden' name='year' value={$yearMonth->getYear()}>";
                                                echo "<input type='hidden' name='month' value={$yearMonth->getMonth()}>";
                                                echo "<input type='hidden' name='day' value={$day}>";
                                                echo "<input type='hidden' name='member' value={$member}>";
                                                echo "<input type='submit' value='編集'>";
                                            echo "</form>";
                                        echo "<div>";
                                    echo "<div>";
                                echo "</td>";
                            }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    
    </body>
</html>
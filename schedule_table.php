<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./schedule_table.css">
        <title>スケジュール管理</title>
    </head>
    <body>
        <h2>スケジュール管理</h2>
        <div class="input-year-month-div">
            <select id="selectYear">
                <?php
                    for($i=2023; $i<=2025; $i++) {
                        echo "<option>{$i}</option>";
                    }
                ?>
            </select>年
            <select id="selectMonth">
                <?php
                    for($i=1; $i<=12; $i++) {
                        echo "<option>{$i}</option>";
                    }
                ?>
            </select>月
            <input type="button" value="年月変更">
        </div>
        <table class="schedule-table">
            <colgroup>
                <col span="1" class="date-column">
            </colgroup>
            <tbody id="scheduleTableBody">
                <tr class="top-row">
                    <th>日付</th>
                    <?php
                        $members = ["Alice", "Bob", "Eve", "George"];
                        foreach ($members as $member) {
                            echo "<th>{$member}</th>";
                        }
                    ?>
                </tr>
                <?php
                    for ($day=1; $day<=31; $day++) {
                        echo "<tr>";
                            echo "<th>{$day}</th>";
                            for ($i=0; $i < count($members); $i++) {
                                echo "<td></td>";
                            }
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    
    </body>
</html>
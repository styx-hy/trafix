<div><p>Route Management</p></div>
<div class="dialog_content">
    <div id="entry-table">
        <div id="entries">
            <table >
                <tr>
                    <td></td>
                    <td>driver_id</td>
                    <td>coach_id</td>
                </tr>
                <?php
                require_once('./db.php');
                $list = fetch_all('drive');
                foreach ($list as $entry) {
                    echo "<tr>";
                    echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
                    echo "<td>".$entry['driver_id']."</td>";
                    echo "<td>".$entry['coach_id']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <div>
                <p>Driver-Coach dispatch</p>
            </div>
            <table style="margin-top: 10px;">
                <tr>
                    <td></td>
                    <td>route_id</td>
                    <td>src</td>
                    <td>des</td>
                    <td>coach_id</td>
                </tr>
                <?php
                require_once('./db.php');
                $list = fetch_all('assign');
                foreach ($list as $entry) {
                    echo "<tr>";
                    echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
                    echo "<td>".$entry['route_id']."</td>";
                    $route_info = getRouteById($entry['route_id']);
                    echo "<td>".$route_info['src']."</td>";
                    echo "<td>".$route_info['des']."</td>";
                    echo "<td>".$entry['coach_id']."</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div id="btn_group">
            <button type="button" class="op_btn"><span style="font-size: 75%;">Add New</span></button>
            <button type="button" class="op_btn"><span style="font-size: 75%;">Delete</span></button>
            <button type="button" class="op_btn"><span style="font-size: 75%;">Modify</span></button>
        </div>
    </div>
</div>
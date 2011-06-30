<div><p>Vehicle Management</p></div>
<div class="dialog_content">
    <div id="entry-table">
        <table id="entries">
            <tr>
                <td></td>
                <td>ID</td>
                <td>Type</td>
                <td>Repair</td>
                <td>Seats</td>
            </tr>
            <?php
            require_once('./db.php');
            $list = fetch_all('coach');
            foreach ($list as $entry) {
                echo "<tr>";
                echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
                echo "<td>".$entry['coach_id']."</td>";
                echo "<td>".$entry['type']."</td>";
                echo "<td>".$entry['repair']."</td>";
                echo "<td>".$entry['seat']."</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div id="btn_group">
            <button type="button" class="op_btn"><span style="font-size: 75%;">Add New</span></button>
            <button type="button" class="op_btn"><span style="font-size: 75%;">Delete</span></button>
            <button type="button" class="op_btn"><span style="font-size: 75%;">Modify</span></button>
        </div>
    </div>
</div>
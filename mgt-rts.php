<div><p>Route Management</p></div>
<div class="dialog_content">
    <div id="entry-table">
        <table id="entries">
            <tr>
                <td></td>
                <td>From</td>
                <td>To</td>
                <td>Distance</td>
            </tr>
            <?php
            require_once('./db.php');
            $list = fetch_all('route');
            foreach ($list as $entry) {
                echo "<tr>";
                echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
                echo "<td>".$entry['src']."</td>";
                echo "<td>".$entry['des']."</td>";
                echo "<td>".$entry['distance']."</td>";
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
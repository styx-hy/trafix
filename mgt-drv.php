<div><p>Driver Management</p></div>
<div class="dialog_content">
	<div id="entry-table">
		<table id="entries">
		    <tr>
		        <td></td>
		        <td>Name</td>
		        <td>Drive age</td>
		        <td>Assigned</td>
		    </tr>
			<?php
			require_once('./db.php');
			$list = fetch_all('driver');
			foreach ($list as $entry) {
				echo "<tr>";
                echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
				echo "<td>".$entry['name']."</td>";
                echo "<td>".$entry['drive_age']."</td>";
                echo "<td>".$entry['assigned']."</td>";
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
<table id="entries">
	<tr>
		<td></td>
		<td>From</td>
		<td>To</td>
		<td>Distance</td>
		<?php #echo "alert($_POST[page]);"; ?>
	</tr>
	<?php
	require_once('./db.php');
	$page = $_POST['page'];
	$list = get_page('route', 0, 100);
	if (count($list) == 0) {
		header('HTTP/1.1 404 Not Found');
	} 
	echo "<tr><td>".assign_drv2vhc(21010, 14)."</td></tr>";
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

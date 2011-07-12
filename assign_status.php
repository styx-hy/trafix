<?php
    require_once('./db.php');
	$list = route_status();
	if (count($list) == 0) {
		header('HTTP/1.1 404 Not Found');
	} else {
	// print_r($list);
?>
<table class="infotable">
	<tr>
		<td></td>
		<td>RouteId</td>
		<td>srcName</td>
		<td>desname</td>
		<td>distance</td>
		<td>coachnum</td>
	</tr>
<?php
		foreach ($list as $entry) {
			echo "<tr>";
			echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
			echo "<td>".$entry['route_id']."</td>";
			echo "<td>".$entry['src_name']."</td>";
			echo "<td>".$entry['des_name']."</td>";
			echo "<td>".$entry['distance']."</td>";
			echo "<td>".$entry['coach_num']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
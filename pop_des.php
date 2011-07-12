<?php
    require_once('./db.php');
	$list = pop_des();
	if (count($list) == 0) {
		header('HTTP/1.1 404 Not Found');
	} else {
		// echo count($list);
?>
<table class="infotable">
	<tr>Top 10 Popular Destination</tr>
	<tr>
		<td></td>
		<td>Destination</td>
		<td>Passenger Flow</td>
	</tr>
<?php
		foreach ($list as $entry) {
			echo "<tr>";
			echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
			echo "<td>".$entry['des_name']."</td>";
			echo "<td>".$entry['count']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<div id="entries">
	<table>
		<tr>
			<td></td>
			<td>driver_id</td>
			<td>coach_id</td>
		</tr>
		<?php
		require_once('./db.php');
		$list = get_all('drive');
		foreach ($list as $entry) {
			echo "<tr>";
			echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
			echo "<td>".$entry['driver_id']."</td>";
			echo "<td>".$entry['coach_id']."</td>";
			echo "</tr>";
		}
		echo "<tr><td></td>";
		echo "<td><input class=\"new_input\" type=\"text\" name=\"driver_id\" style=\"width: 150px;\"></td>";
		echo "<td><input class=\"new_input\" type=\"text\" name=\"coach_id\" style=\"width: 50px;\"></td>";
		// echo "<td><input class=\"new_input\" type=\"text\" name=\"des\" style=\"width: 50px;\"></td>";
		// echo "<td><input class=\"new_input\" type=\"text\" name=\"distance\" style=\"width: 50px;\"></td>";
		?>
	</table>
<div>
	<p>Driver-Coach dispatch</p>
</div>
	<table style="margin-top: 10px;">
		<tr>
			<td></td>
			<td>route_id</td>
<!-- 			<td>src</td> -->
<!-- 			<td>des</td> -->
			<td>coach_id</td>
		</tr>
		<?php
		require_once('./db.php');
		$list = get_all('assign');
		foreach ($list as $entry) {
			echo "<tr>";
			echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
			echo "<td>".$entry['route_id']."</td>";
			echo "<td>".$entry['coach_id']."</td>";
			// $route_info = getRouteById($entry['route_id']);
			// echo "<td>".$route_info['src']."</td>";
			// echo "<td>".$route_info['des']."</td>";
			// echo "<td>".$entry['coach_id']."</td>";
			echo "</tr>";
		}
		echo "<tr><td></td>";
		echo "<td><input class=\"new_input\" type=\"text\" name=\"route_id\" style=\"width: 150px;\"></td>";
		echo "<td><input class=\"new_input\" type=\"text\" name=\"coach_id\" style=\"width: 50px;\"></td>";
		// echo "<td><input class=\"new_input\" type=\"text\" name=\"des\" style=\"width: 50px;\"></td>";
		// echo "<td><input class=\"new_input\" type=\"text\" name=\"distance\" style=\"width: 50px;\"></td>";
		?>
	</table>
</div>

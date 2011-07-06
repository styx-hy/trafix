<?php
require_once('./db.php');
$page = $_POST['page'];
$list = get_page('route', $page * 100, 100);
if (count($list) == 0) {
	header('HTTP/1.1 404 Not Found');
} else {
?>
<table id="entries">
	<tr>
		<td></td>
		<td>ID</td>
		<td>From</td>
		<td>To</td>
		<td>Distance</td>
		<?php #echo "alert($_POST[page]);"; ?>
	</tr>
<?php
// echo "<tr><td>".assign_drv2vhc(21010, 14)."</td></tr>";
	foreach ($list as $entry) {
		echo "<tr>";
		echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
		echo "<td>".$entry['route_id']."</td>";
		echo "<td>".$entry['src']."</td>";
		echo "<td>".$entry['des']."</td>";
		echo "<td>".$entry['distance']."</td>";
		echo "</tr>";
	}
	echo "<tr><td></td>";
	echo "<td><input class=\"new_input\" type=\"text\" name=\"route_id\" style=\"width: 150px;\"></td>";
	echo "<td><input class=\"new_input\" type=\"text\" name=\"src\" style=\"width: 50px;\"></td>";
	echo "<td><input class=\"new_input\" type=\"text\" name=\"des\" style=\"width: 50px;\"></td>";
	echo "<td><input class=\"new_input\" type=\"text\" name=\"distance\" style=\"width: 50px;\"></td>";
	echo "</table>";
}
?>

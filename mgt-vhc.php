<?php
require_once('./db.php');
$page = $_POST['page'];
#$page = 100;
$list = get_page('coach',$page * 1000, 1000);
if (count($list) == 0) {
	header('HTTP/1.1 404 Not Found');
	header("status: 404 Not Found");
} else {
	#echo count($list);
	#print_r($list);
?>
	<table id="entries">
	<tr>
	<td></td>
	<td>ID</td>
	<td>Type</td>
	<td>Repair</td>
	<td>Seats</td>
	</tr>
<?php	
	foreach ($list as $entry) {
	    echo "<tr>";
		echo "<td style='width: 5%'>"."<input type='checkbox' />"."</td>";
		echo "<td>".$entry['coach_id']."</td>";
		echo "<td>".$entry['type']."</td>";
		echo "<td>".$entry['repair']."</td>";
		echo "<td>".$entry['seat']."</td>";
		echo "</tr>";
	}
	echo "</table>";

}
?>
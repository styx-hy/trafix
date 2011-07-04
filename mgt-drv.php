<?php
require_once('./db.php');
$page = $_POST['page'];
$list = get_page('driver', $page * 100, 100);
if (count($list) == 0) {
	header('HTTP/1.1 404 Not Found');
} else {
?>

<table id="entries" style="table-layout: fixed; word-wrap: break-word">
	<tr>
		<td style="width: 25px"></td>
		<td style="width: 200px; overflow: hidden; word-wrap: break-word">Name</td>
		<td style="width: 75px">Drive age</td>
		<td>Assigned</td>
		<script type="text/javascript">
		<?php #echo "alert($_POST[page]);"; ?>
		</script>
	</tr>
<?php
foreach ($list as $entry) {
	echo "<tr>";
	echo "<td>"."<input type='checkbox' />"."</td>";
	echo "<td>".$entry['name']."</td>";
	echo "<td>".$entry['drive_age']."</td>";
	echo "<td>".$entry['assigned']."</td>";
	echo "</tr>";
}
echo "</table>";
}
?>

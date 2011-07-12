<?php
    require_once('./db.php');
	$avl = avl_coach();
	$navl = not_avl_coach();
	if (count($list) == 0) {
		header('HTTP/1.1 404 Not Found');
	} else {
?>
<p>Availabl Coach: <span><?php echo $avl[0]; ?></span></p>
<p>Assigned coach: <span><?php echo $navl[0]; ?></span></p>

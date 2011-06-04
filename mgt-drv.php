<div><p>use case for manage drives</p></div>
<div class="dialog_content">
	<div id="drv-list">
		<ul id="drivers">
			<?php
			require_once('./db.php');
			$list = fetch_all('driver');
			foreach ($list as $entry) {
				echo "<li>".$entry[name]."</li>";
			}
			?>
		</ul>	
	</div>
</div>
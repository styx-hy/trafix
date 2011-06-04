<p>use case for manage VEHICLE</p>
<div class="dialog_content">
	<div id="drv-list">
		<ul id="drivers">
			<?php
			require_once('./db.php');
			$list = fetch_all('coach');
			foreach ($list as $entry) {
				echo "<li>".$entry[coach_id]."</li>";
			}
			?>
		</ul>	
	</div>
</div>
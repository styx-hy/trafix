<div><p id='gaga'>Driver Management</p></div>
<div class="dialog_content">
	<div id="entry-table">
		<div id="mgt">
		</div>
		<div id="btn_group">
		    <button type="button" class="op_btn"><span style="font-size: 75%;">Add New</span></button>
            <button type="button" class="op_btn"><span style="font-size: 75%;">Delete</span></button>
            <button type="button" class="op_btn"><span style="font-size: 75%;">Modify</span></button>
            <br />
            <p>Total: <span id="total"></span></p>
            <p>Current: <span id="cur"></span></p>
            <button id="prev" type="button" clall="op_btn" style="width: 100%;font-size: 75%;">Prev Page</button>
            <button id="next" type="button" class="op_btn" style="width: 100%;font-size: 75%;">Next Page</button>
		</div>
	</div>
	<script type="text/javascript">
	<?php echo "var url = '$_POST[target]';"; ?>
	$('#next').click(function() {
		var current = parseInt($('#cur').html());
		if (isNaN(current)) {
			current = 0;
		}
		$('#mgt').load(url, { page:current }, function(response, status, xhr) {
			if (status == "error") {
				alert("no more");
			} else {
				$('#cur').html(current + 1);
			}
		});
	});
	$('#next').click();
	$('#prev').click(function() {
		var current = parseInt($('#cur').html());
		if (isNaN(current)) {
			current = 0;
		} else if (current <= 1) {
			return;
		}
		$('#mgt').load(url, { page:current - 2 }, function(response, status, xhr) {
			if (status == "error") {
				alert("no more");
			} else {
				$('#cur').html(current - 1);
			}
		});
	});
	</script>
</div>
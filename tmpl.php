<div><p id='gaga'>Driver Management</p></div>
<div class="dialog_content">
	<div id="entry-table">
		<div id="mgt">
		</div>
		<div id="btn_group">
		    <button id="addnew" type="button" class="op_btn" style="font-size: 75%;">Add New</button>
            <button type="button" class="op_btn" style="font-size: 75%;">Delete</button>
            <button type="button" class="op_btn" style="font-size: 75%;">Modify</button>
            <br />
            <p>Total: <span id="total"></span></p>
            <p>Current: <span id="cur"></span></p>
            <button id="prev" type="button" clall="op_btn" style="width: 100%;font-size: 75%;">Prev Page</button>
            <button id="next" type="button" class="op_btn" style="width: 100%;font-size: 75%;">Next Page</button>
		</div>
	</div>
	<script type="text/javascript">
	<?php echo "var url = '$_POST[target]';"; ?>
	<?php
	switch ($_POST[target]) {
		case 'mgt-drv.php':
			echo "var table = 'driver';";
			break;
		case 'mgt-vhc.php':
			echo "var table = 'coach';";
			break;
		case 'mgt-rts.php':
			echo "var table = 'route';";
			break;
		case 'mgt-dpt.php':
			echo "var table = 'assign';";
			break;
		default:
			echo "var table = '';";
			break;
	}
	?>
	// next page - click
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
//				$('#addnew').click(function() {
//				var all_inputs = $('.new_input');
//				var post_data = {};
//				for (var i = 0; i < all_inputs.length; i++) {
//					post_data[all_inputs[i].name] = all_inputs[i].name;
//				}
//				alert(post_data[all_inputs[i].name]);
//			});
			}
		});
	});
	// invoke for the first time
	$('#next').click();
	// prev page - click
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

	$('#entries').ready(function() {
		$('#addnew').click(function() {
			var all_inputs = $('.new_input');
			var get_data = {};
			for (var i = 0; i < all_inputs.length; i++) {
				get_data[i] = "'" + all_inputs[i].value + "'";
			}
			$.ajax({
				url: "action.php",
				type: 'get',
				data: {
					action: 'add',
					data: get_data,
					table: table
					},
				sucess: function() {
					alert('send sucess');
				}
			});
		});
	});
	</script>
</div>
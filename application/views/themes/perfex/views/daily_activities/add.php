
<div class="container">

	<div class="row">
		<div class="col-md-4 animated fadeIn col-md-offset-4">

				<form id="add_activity" method="POST" action="<?php echo base_url("Daily_Activity/add"); ?>">

					<div class="form-group" app-field-wrapper="time_slot"><label for="time_slot" class="control-label">Time (Minutes)</label><input type="number"  id="time_slot" name="time_slot" min="0" max="60" step="10" class="form-control" value=""></div>

					<?php echo render_select('type',$types,array('a_type',array('a_type')),'Type'); ?>

					<button type="submit" id="submit" class="btn btn-info mleft10 proposal-form-submit save-and-send transaction-submit">
						<?php echo _l('save_and_send'); ?>
					</button>
				</form>
			</div>
		</div>
	</div>

	<script>

		$(document).ready(function(){
			$(window).keydown(function(event){
				if(event.keyCode == 13) {
					event.preventDefault();
					return false;
				}
			});
			$('#add_activity').validate({
				rules: {
					time_slot: "required",
					type: "required",
					
				}
			});
			
		});


	</script>



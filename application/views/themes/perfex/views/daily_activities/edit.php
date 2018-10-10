
<div class="container">

	<div class="row">
		<div class="col-md-4 animated fadeIn col-md-offset-4">
				<?php if(isset($activity)){ 
					$act = $activity->a_type;
					$id = $activity->a_id; ?>
				<form id="add_activity" method="POST" action="<?php echo base_url("Daily_Activity/edit_data"); ?>">

	
					<?php echo form_hidden('activity',$id); ?>
					<div class="form-group" app-field-wrapper="time_slot"><label for="time_slot" class="control-label">Time (Minutes)</label><input type="number"  id="time_slot" name="time_slot" min="0" max="60" step="10" value="<?php echo $activity->a_time; ?>" class="form-control" value=""></div>

					<?php echo render_select('type',$types,array('a_type',array('a_type')),'Type',$act,array($act)); ?>

					<button type="submit" id="submit" class="btn btn-info mleft10 proposal-form-submit save-and-send transaction-submit">
						<?php echo _l('save_and_send'); ?>
					</button>
				</form>
			<?php } ?>
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



<div class="container">

	<div class="row">
		<div class="col-md-4 animated fadeIn col-md-offset-4">

			<?php if(isset($sleep)){ 
				$date = $sleep->nap_created_at;
				$from = $sleep->s_from;
				$to = $sleep->s_to;
				$d_from = $sleep->d_nap_from;
				$d_to = $sleep->d_nap_to;
				$d_reason = $sleep->d_desp;
				$p_from = $sleep->p_nap_from;
				$p_to = $sleep->p_nap_to;
				$id = $sleep->s_id;

				?>

				<form id="sleeps" method="POST" action="<?php echo base_url("Sleep/edit_data"); ?>">


					<?php echo form_hidden('sleep_id',$id); ?>

					<?php echo render_date_input('date','Date',$date); ?>
					
					<?php echo render_time_feild('from','From',$from); ?>
					
					
					<?php echo render_time_feild('to','To',$to); ?>
					

					<div class="pretty p-switch">
						<input type="checkbox"  value="1" name="disturbed" id="disturbed" <?php echo (!empty($d_from)?"checked":"");?> />
						<div class="state" >
							<label>Disturbed Sleeps</label>
						</div>
					</div>
					<div class="pretty p-switch">
						<input type="checkbox" value="1" name="power" id="power" <?php echo (!empty($p_from)?"checked":"");?> />
						<div class="state">
							<label>Power Nap</label>
						</div>
					</div>



					<div id="disterbednap">
						<h5>Disturbed Naps</h5>

						<?php echo render_time_feild('d_from','From',$d_from); ?>

						
						<?php echo render_time_feild('d_tw','To',$d_to); ?>
						
						<?php echo render_textarea('desp','Description',$d_reason); ?>
					</div>

					<div id="powernap">
						<h5>Power Naps</h5>
						
						<?php echo render_time_feild('p_from','From',$p_from); ?>
						
						
						<?php echo render_time_feild('p_tw','To',$p_to); ?>
						
					</div>
					<div class="alert alert-danger animated fadeIn">

					</div>

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
		$(".alert-danger").hide();
		$('#sleeps').validate({
			rules: {
				date: "required",
				from: "required",
				to: "required",
				d_from: "required",
				d_tw: "required",
				p_from: "required",
				p_tw: "required",
				desp:"required",
				
			}
		});

		$("#powernap").hide();
		$("#disterbednap").hide();

		
		if($("#power").is(":checked")){
			$("#powernap").show();
		}
		
		
		if($("#disturbed").is(":checked")){
			$("#disterbednap").show();
		}

		$("#power").change(function () {
			$("#powernap").toggle('show')
		});
		$("#disturbed").change(function () {
			$("#disterbednap").toggle('show')
		});

		$("#date").change(function(){
			var date = $("#date").val();
			$.ajax({
				method:'post',
				url:"<?php echo base_url('Sleep/check');?>",
				dataType:'json',
				data:{date:date},
				success:function(data)
				{
					if(data.status)
					{
						$(".alert-danger").html(data.msg);
						$(".alert-danger").slideDown();
						$("#submit").hide();
					}
					else
					{
						$(".alert-danger").html("");
						$(".alert-danger").slideUp();
						$("#submit").show();
					}
				}
			});

			
		});

		
		$("#d_from").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:30,
		}); 
		$("#d_tw").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:30,
		}); 
		$("#p_from").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:30,
		}); 
		$("#p_tw").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:30,
		}); 
		$("#from").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:30,
		}); 
		$("#to").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:30,
		});  


		

	});


</script>



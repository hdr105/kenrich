<div class="container">

	<div class="row">
		<div class="col-md-4 animated fadeIn col-md-offset-4">


			<form id="sleeps" method="POST" action="<?php echo base_url("Sleep/add"); ?>">


				

				<?php echo render_date_input('date','Date'); ?>
				
				<?php echo render_time_feild('from','From'); ?>
				
				
				<?php echo render_time_feild('to','Till'); ?>
				


				<div class="pretty p-switch">
					<input type="checkbox" value="1" name="disturbed" id="disturbed" />
					<div class="state" >
						<label>Disturbed Sleeps</label>
					</div>
				</div>
				<div class="pretty p-switch">
					<input type="checkbox" value="1" name="power" id="power" />
					<div class="state">
						<label>Power Nap</label>
					</div>
				</div>



				<div id="disterbednap">
					<h5>Disturbed Naps</h5>
					
					<?php echo render_time_feild('d_from','From'); ?>
					
					<?php echo render_time_feild('d_tw','To'); ?>
					
					<?php echo render_textarea('desp','Description'); ?>
				</div>

				<div id="powernap">
					<h5>Power Naps</h5>
					
					<?php echo render_time_feild('p_from','From'); ?>
					
					<?php echo render_time_feild('p_tw','To'); ?>
					
				</div>
				<div class="alert alert-danger animated fadeIn">
					
				</div>
				<div class="row text-center mt-20">
				<button type="submit" id="submit" class="btn btn-info mt-2 mleft10 proposal-form-submit save-and-send transaction-submit">
					<?php echo _l('save_and_send'); ?>
				</button>
			</div>
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



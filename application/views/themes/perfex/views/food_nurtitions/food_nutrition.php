
<style>
textarea{
	text-transform: capitalize;
}
</style>
<div class="container">

	<div class="row">
		<div class="col-md-4 animated fadeIn col-md-offset-4">

			<form id="food_nutrition" method="POST" action="<?php echo base_url("Food_Nutrition/add"); ?>">

				<div class="row">
					
						<?php $value = date("Y-m-d"); ?>
						<?php echo render_date_input('date','Date',$value); ?>
					
						<?php echo render_time_feild('time','Time'); ?>
					
				</div>

				<?php echo render_select('type',$types,array('f_n_name',array('f_n_name')),'Type'); ?>

				<?php echo render_textarea('desp','Description'); ?>

				<div class="alert alert-danger animated fadeIn">
					
				</div>

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
		$('#food_nutrition').validate({
			rules: {
				date: "required",
				time: "required",
				type: "required",
				desp: "required",
			}
		});
		$(".alert-danger").hide();
		$("[name='type']").change(function(){
			var val = $("[name='type']").val();
			var date = $("#date").val();
			$.ajax({
				method:'post',
				url:"<?php echo base_url('Food_Nutrition/check');?>",
				dataType:'json',
				data:{date:date, value:val},
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
		$("#date").change(function(){
			var val = $("[name='type']").val();
			var date = $("#date").val();
			$.ajax({
				method:'post',
				url:"<?php echo base_url('Food_Nutrition/check');?>",
				dataType:'json',
				data:{date:date, value:val},
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
		$("#time").timepicki({
			show_meridian:false,
			overflow_minutes:true,
			increase_direction:'up',
			min_hour_value:0,
			max_hour_value:23,
			step_size_minutes:60,
		}); 
	});


</script>



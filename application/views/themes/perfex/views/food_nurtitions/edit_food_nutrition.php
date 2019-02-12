
<style>
textarea{
	text-transform: capitalize;
}
</style>
<div class="container">

	<div class="row">
		<div class="col-md-4 animated fadeIn col-md-offset-4">
			<?php  if(isset($foods)){ ?>

				<form id="food_nutrition" method="POST" action="<?php echo base_url("Food_Nutrition/edit_data"); ?>">
					<?php $id =  $foods->fn_id; ?>
					<?php echo form_hidden('id',$id); ?>

					<?php $type = $foods->fn_type; ?>
					<?php echo form_hidden('typecheck',$type); ?>


					<?php $date = $foods->fn_date; ?>
					<?php echo render_date_input('date','Date',$date); ?>


					<?php $time = $foods->fn_time; ?>
					<?php echo render_time_feild('time','Time',$time); ?>


					
					<?php echo render_select('type',$types,array('f_n_name',array('f_n_name')),'Type',$type,array($type)); ?>


					<?php $desp = $foods->fn_desp; ?>
					<?php echo render_textarea('desp','Description',$desp); ?>

					<div class="alert alert-danger animated fadeIn">
						
					</div>

					<button type="submit" id="submit" class="btn btn-info mleft10 proposal-form-submit save-and-send transaction-submit">
						<?php echo _l('save & Update'); ?>
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
			var edit_type = $("#typecheck").val();
			if(edit_type == val)
			{
				$(".alert-danger").html("");
				$(".alert-danger").slideUp();
				$("#submit").show();
			}
			else
			{
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
			}

		});
		$("#date").change(function(){
			var val = $("[name='type']").val();
			var date = $("#date").val();
			var edit_type = $("#typecheck").val();
			if(edit_type == val)
			{
				$(".alert-danger").html("");
				$(".alert-danger").slideUp();
				$("#submit").show();
			}
			else
			{
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
		}
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



<?php
foreach ($userdatas as $userdata) {
	$date = $userdata['fn_date'];
	$id = $this->session->userdata('staff_user_id');
	$date_wise = get_data_via_date($date,$id);
	$format = date_create($date);
	$formatted_date = date_format($format,'l jS F Y');
	?>
	<div class="row head-style">
		<div class="col-md-8">
			<h4></h4>
		</div>
		<div class="col-md-4">
			<h4><?php echo $formatted_date; ?></h4>
		</div>
	</div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Time</th>
				<th>Type</th>
				<th>Detail</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($date_wise as $dates) 
			{
				?>
				<tr>
					<td class="width-33"><?php echo $dates['fn_time']; ?></td>
					<td class="clr-yellow"><?php echo $dates['fn_type']; ?></td>
					<td class="width-33"><?php echo  $dates['fn_desp']; ?></td>
				</tr>
				<?php
			}
			?>

		</tbody>
	</table>
	<hr>
	<?php


}



?>





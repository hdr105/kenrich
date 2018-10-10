<script type="text/javascript">
	$(document).ready(function() {
		$("#clientid").change(function(){
			var id = $("[name='clientid']").val();
			if(id != "")
			{
				$.ajax({
					method:'post',
					url:"<?php echo base_url('admin/sleeps/clientsleep');?>",
					data:{id:id},
					success:function(data)
					{
						$("#showdata").html(data);
					}
				});
			}
			else
			{
				$("#showdata").html(`<div class="alert alert-danger">
					<strong>Danger!</strong> No Data Found.
					</div>`);
			}
		});
	});
</script>
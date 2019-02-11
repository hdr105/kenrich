<?php
foreach ($userdatas as $userdata) 
{
 $date = $userdata['a_created_at'];
 $format = date_create($date);
 $formatted_date = date_format($format,'D-d M Y');
 $circles = 6;

 $id = $this->session->userdata('staff_user_id');
 $via_dates = get_via_date($date,$id);

 ?>       


 <div class="row">
  <table class="table table-bordered">
    <thead>
      <th colspan='4'><h3>Daily Activities</h3></th>
      <th></th>
      <th><?php echo  $formatted_date; ?></th>

    </thead>
    <?php foreach ($via_dates as $via_date) {
     $empty = $circles-$via_date['a_cycles'];
     $fill = $via_date['a_cycles'];

     ?>
     <thead>
      <th class="clr-yellow"><i class="fa fa-moon-o clr-white" aria-hidden="true"></i></th>
      <th class="width-20 clr-yellow">Activity</th>
      <th class="width-20"><?php echo $via_date['a_type']; ?></th>
      <th class="width-20"><?php for ($i=0; $i < $empty; $i++) { 

        ?>
        <i class="fa fa-circle-o clr-brown" aria-hidden="true" ></i>
        <?php
      }
      for ($j=0; $j < $fill; $j++) { 
       ?>
       <i class="fa fa-circle clr-brown" aria-hidden="true" ></i>
       <?php
     } 

     ?></th>
     <th class="width-20"><?php echo "0:".$via_date['a_time']; ?></th>
     <th class="width-20">1 circle is 10 minutes</th>
   </thead>
 <?php } ?>
 <tbody>

 </tbody>
</table>
</div>

<?php } ?>
 <?php
 $alert = "<div class='alert alert-danger'>
 <strong>Danger!</strong> No Data Found.
 </div>";
 ?>
 <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#food">Food & Nutrition</a></li>
  <li><a data-toggle="tab" href="#sleep">Sleep</a></li>
  <li><a data-toggle="tab" href="#activity">Activities</a></li>
</ul>

<div class="tab-content">
  <div id="food" class="tab-pane fade in active">
    <h3>Food & Nutrition</h3>
    <?php
    if(!empty($foods))
    {
      foreach ($foods as $userdata) {
        $date = $userdata['fn_date'];
        $id = $this->session->userdata('staff_user_id');
        $date_wise = get_data_via_date($date,$id);
        $format = date_create($date);
        $formatted_date = date_format($format,'D-d M Y');
        ?>
        <div class=" mlr0">
        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6 plr0">
            <div class="row mlr0">
              <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 bg-clr-darkyellow">
                <h4 class="clr-white">What did ya eat today</h4>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12 col-lg-4 bg-clr-brown pr0">
                <h4 class="clr-white"><?php echo $formatted_date; ?></h4>
              </div>
            </div>

        <table class="table table-bordered bg-white mt0">
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
      </div>
</div>
        <?php


      }
    }
    else
    {
      echo $alert;
    }
    ?>
  </div>

  <div id="sleep" class="tab-pane fade">
    <h3>Sleep</h3>
    <?php 
    if(!empty($sleeps)){
     $sleep = array();
 
     foreach ($sleeps as $userdata) 
     {

      $disturbed = $userdata['d_nap_from'];
      $power = $userdata['p_nap_from'];
      $date = $userdata['nap_created_at'];
      $format = date_create($date);
      $formatted_date = date_format($format,'D-d M Y');
 
      $sleephours = (strtotime($userdata['s_to']) - strtotime($userdata['s_from'])) / 3600;


      array_push($sleep,$sleephours);

      ?>

      <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 plr0 table-responsive">
        <table class="table table-bordered">
          <thead>
            <th colspan='4'><h3>Sleep Diary</h3></th>
            <th></th>
            <th></th>
            <th><?php echo $formatted_date; ?></th>
          </thead>
          <thead>
            <th class="clr-yellow tbl_brdr_clr <?php echo(empty($disturbed) && empty($power)?'':'pointer'); ?>"><a data-toggle="collapse" data-target="#collapseExample<?php echo $userdata['s_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
             <i class="fa fa-moon-o" aria-hidden="true" style="color: #fff"></i>
           </a></th>
           <th class="clr-yellow tbl_brdr_clr">Sleep</th>
           <th class="tbl_brdr_clr">From</th>
           <th class="tbl_brdr_clr"><?php echo $userdata['s_from']; ?></th>
           <th class="tbl_brdr_clr">Till</th>
           <th class="tbl_brdr_clr"><?php echo $userdata['s_to']; ?></th>
           <th class="tbl_brdr_clr"><?php echo $sleephours; ?> Hrs sleeps</th>

         </thead>
         <tbody>

         </tbody>
       </table>
       <?php if(!empty($disturbed) || !empty($power)){ ?>
        <div class="collapse" id="collapseExample<?php echo $userdata['s_id']; ?>">
          <div class="card card-body well">
            <?php if(!empty($disturbed)){ ?>
              <div>
                <h4>Disturbed Nap</h4>
                <table class="table table-bordered tbl_brdr_clr">
                  <thead>
                    <th class="tbl_brdr_clr">From</th>
                    <th class="tbl_brdr_clr"><?php echo $userdata['d_nap_from']; ?></th>
                    <th class="tbl_brdr_clr">Till</th>
                    <th class="tbl_brdr_clr"><?php echo $userdata['d_nap_to']; ?></th>
                    <th class="tbl_brdr_clr">Reason</th>
                    <th class="tbl_brdr_clr"><?php echo $userdata['d_desp']; ?></th>
                    <th class="tbl_brdr_clr">Total</th>
                    <th class="tbl_brdr_clr"><?php echo (strtotime($userdata['d_nap_to']) - strtotime ($userdata['d_nap_from'])) /3600; ?> Hrs</th>
                  </thead>
                </table>
                <hr>
              </div>
            <?php } 
            if(!empty($power)){
             ?>
             <div>
              <h4>Power Nap</h4>
              <table class="table table-bordered ">
                <thead>
                  <th class="tbl_brdr_clr">From</th>
                  <th class="tbl_brdr_clr"> <?php echo $userdata['p_nap_from']; ?></th>
                  <th class="tbl_brdr_clr">Till</th>
                  <th class="tbl_brdr_clr"><?php echo $userdata['p_nap_to']; ?></th>
                  <th class="tbl_brdr_clr">Total</th>
                  <th class="tbl_brdr_clr"><?php echo (strtotime($userdata['p_nap_to'])- strtotime ($userdata['p_nap_from']))/3600; ?> Hrs</th>
                </thead>
              </table>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>

<?php } 
?>
<h3>Total Sleep : <span><?php echo array_sum($sleep); ?></span></h3>
<?php
}else
{
  echo $alert;
}?>
</div>
<div id="activity" class="tab-pane fade">
<!--   <h3>Activities</h3> -->
  <h3>Daily Activity</h3>
  <?php 
  if(!empty($activities)){
    foreach ($activities as $userdata) 
    {
     $date = $userdata['a_created_at'];
     $format = date_create($date);
     $formatted_date = date_format($format,'D-d M Y');
     $circles = 6;

     $id = $this->session->userdata('staff_user_id');
     $via_dates = get_via_date($date,$id);

     ?>       


     <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12 plr0 table-responsive">
      <table class="table table-bordered">
   
          <thead>
          <!-- <th></th> -->
          <th colspan="3"><?php echo  $formatted_date; ?></th>
        </thead>
      
        <?php foreach ($via_dates as $via_date) {
         $empty = $circles-$via_date['a_cycles'];
         $fill = $via_date['a_cycles'];

         ?>
       
         <thead>
          <th class="clr-yellow tbl_brdr_clr"><i class="fa fa-moon-o clr-white" aria-hidden="true"></i></th>
          <th class="width-10 clr-yellow tbl_brdr_clr">Activity</th>
          <th class="width-10 tbl_brdr_clr"><?php echo $via_date['a_type']; ?></th>
          <th class="width-40 tbl_brdr_clr"><?php for ($i=0; $i < $empty; $i++) { 

            ?>
            <i class="fa fa-circle-o clr-brown" aria-hidden="true" ></i>
            <?php
          }
          for ($j=0; $j < $fill; $j++) { 
           ?>
           <i class="fa fa-circle clr-brown " aria-hidden="true" ></i>
           <?php
         } 

         ?></th>
         <th class="width-20 tbl_brdr_clr"><?php echo "0:".$via_date['a_time']; ?></th>
         <th class="width-20 tbl_brdr_clr">1 circle is 10 minutes</th>
       </thead>
     <?php } ?>
     <tbody>

     </tbody>
   </table>
 </div>

<?php }
} else
{
  echo $alert;
} ?>
</div>
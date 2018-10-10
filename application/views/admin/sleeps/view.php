 <?php
 foreach ($userdatas as $userdata) 
 {
  $disturbed = $userdata['d_nap_from'];
  $power = $userdata['p_nap_from'];
  $date = $userdata['nap_created_at'];
  $format = date_create($date);
  $formatted_date = date_format($format,'l jS F Y');

  ?>

  <div class="row">
    <table class="table table-bordered">
      <thead>
        <th colspan='4'><h3>Sleep Diary</h3></th>
        <th></th>
        <th></th>
        <th><?php echo $formatted_date; ?></th>
      </thead>
      <thead>
        <th class="clr-yellow <?php echo(empty($disturbed) && empty($power)?'':'pointer'); ?>"><a data-toggle="collapse" data-target="#collapseExample<?php echo $userdata['s_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
         <i class="fa fa-moon-o" aria-hidden="true" style="color: #fff"></i>
        </a></th>
        <th class="clr-yellow">Sleep</th>
        <th>From</th>
        <th><?php echo $userdata['s_from']; ?></th>
        <th>Till</th>
        <th><?php echo $userdata['s_to']; ?></th>
        <th><?php echo $userdata['s_to']-$userdata['s_from']; ?> Hour sleeps</th>

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
          <table class="table table-bordered">
            <thead>
              <th>From</th>
              <th><?php echo $userdata['d_nap_from']; ?></th>
              <th>Till</th>
              <th><?php echo $userdata['d_nap_to']; ?></th>
              <th>Reason</th>
              <th><?php echo $userdata['d_desp']; ?></th>
              <th>Total</th>
              <th><?php echo $userdata['d_nap_to']-$userdata['d_nap_from']; ?> Hours</th>
            </thead>
          </table>
          <hr>
        </div>
      <?php } 
      if(!empty($power)){
       ?>
        <div>
          <h4>Power Nap</h4>
          <table class="table table-bordered">
            <thead>
              <th>From</th>
              <th><?php echo $userdata['p_nap_from']; ?></th>
              <th>Till</th>
              <th><?php echo $userdata['p_nap_to']; ?></th>
              <th>Total</th>
              <th><?php echo $userdata['p_nap_to']-$userdata['p_nap_from']; ?> Hours</th>
            </thead>
          </table>
        </div>
      <?php } ?>
      </div>
    </div>
  <?php } ?>
  </div>
  <?php } ?>
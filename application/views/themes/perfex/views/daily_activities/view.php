
<div id="wrapper">
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="panel_s">
          <div class="panel-body">
            <?php if($this->session->flashdata('success'))
            { ?>
              <div class="alert alert-success animated fadeIn">
                <strong>Successfully </strong> <?php echo $this->session->userdata('success'); ?>
                </div><?php
              }
              ?>
              <div class="_buttons">
                <a href="<?php echo base_url('Daily_Activity/index'); ?>" class="btn btn-info pull-left display-block">
                  <?php echo _l('New Activity'); ?>
                </a>
              </div>
              <hr class="hr-panel-heading" />
              <h2>Daily Activities</h2>
              <?php
              if(isset($activities))
              {
                foreach ($activities as $activity) {
                  $date = $activity['a_created_at'];
                  $format = date_create($date);
                  $formatted_date = date_format($format,'l jS F Y');
                  $circles = 6;
                  $empty = $circles-$activity['a_cycles'];
                  $fill = $activity['a_cycles'];
                  $id = $this->session->userdata('client_user_id');

                  $via_dates = get_via_date($date,$id);

                  ?>   
                  <table class="table table-striped">
                    <thead>
                      <th colspan='5'><h3>Daily Activities</h3></th>
                      <th colspan='2'><h5><?php echo  $formatted_date; ?></h5></th>

                    </thead>
                    <?php 

                    foreach ($via_dates as $via_date) 
                    {
                      $empty = $circles-$via_date['a_cycles'];
                      $fill = $via_date['a_cycles'];

                      ?>
                      <thead>
                        <th class="clr-yellow"><i class="fa fa-moon-o" aria-hidden="true" style="color: #fff"></i></th>
                        <th class="clr-yellow width-16">Activity</th>
                        <th class="width-16"><?php echo $via_date['a_type']; ?></th>
                        <th class="width-16"><?php for ($i=0; $i < $empty; $i++) { 
                          ?>
                          <i class="fa fa-circle-o clr-brown" aria-hidden="true"></i>
                          <?php
                        }
                        for ($j=0; $j < $fill; $j++)
                        { 
                         ?>
                         <i class="fa fa-circle clr-brown" aria-hidden="true"></i>
                         <?php

                       }

                       ?>
                     </th>
                     <th class="width-16"><?php echo "0:".$via_date['a_time']; ?></th>
                     <th class="width-16">1 circle is 10 minutes</th>
                     <th class="width-16"><a href="<?php echo base_url('Daily_Activity/edit/').$via_date['a_id']; ?>" class="btn btn-default btn-icon"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="<?php echo base_url('Daily_Activity/delete/').$via_date['a_id']; ?>" class="btn btn-danger _delete btn-icon"><i class="fa fa-remove"></i></a></th>
                   </thead>
                 <?php } ?>

               </table>
             <?php }

           } 

           ?>


         </div>
       </div>
     </div>
   </div>
 </div>
</div>

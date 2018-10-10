
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
                <a href="<?php echo base_url('Sleep/index'); ?>" class="btn btn-info pull-left display-block">
                  <?php echo _l('New Sleep'); ?>
                </a>
              </div>
              <hr class="hr-panel-heading" />
              <h2>Sleep Diary</h2>

              <?php
              if(isset($sleeps))
              {
                foreach ($sleeps as $sleep) 
                {
                  $date = $sleep['nap_created_at'];
                  $format = date_create($date);
                  $formatted_date = date_format($format,'l jS F Y');
                  $sleep_hours = $sleep['s_to']-$sleep['s_from'];
                  $disturbed_from = $sleep['d_nap_from'];
                  $power_from = $sleep['p_nap_from'];
                  $dis_desp = $sleep['d_desp'];
                  $new_desp = substr($dis_desp, 0, 20);
                  ?>         
                  <table class="table table-striped">
                    <thead>
                      <th colspan='5'><h3>Sleep Diary</h3></th>
                      <th></th>
                      <th></th>
                      <th><?php echo $formatted_date; ?></th>
                    </thead>
                    <thead>
                      <th class="clr-yellow  <?php echo(empty($disturbed_from) && empty($power_from)?'':'pointer'); ?>"><a data-toggle="collapse" data-target="#collapseExample<?php echo $sleep['s_id']; ?>" aria-expanded="false" aria-controls="collapseExample">
                       <i class="fa fa-moon-o clr-white" aria-hidden="true"></i></a></th>
                       <th class="clr-yellow" ">Sleep</th>
                       <th>From</th>
                       <th><?php echo $sleep['s_from']; ?></th>
                       <th>Till</th>
                       <th><?php echo $sleep['s_to']; ?></th>
                       <th><?php echo $sleep['s_to']-$sleep['s_from']; ?> Hour sleeps</th>
                       <th class="width-25"><a href="<?php echo base_url('Sleep/edit/').$sleep['s_id']; ?>" class="btn btn-default btn-icon"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="<?php echo base_url('Sleep/delete/').$sleep['s_id']; ?>" class="btn btn-danger _delete btn-icon"><i class="fa fa-remove"></i></a></th> 
                     </thead>

                     <tbody>

                     </tbody>
                   </table>

                   <?php 
                   if(!empty($disturbed_from) || !empty($power_from))
                   {

                     ?>
                     <div class="collapse" id="collapseExample<?php echo $sleep['s_id']; ?>">
                      <div class="well">
                        <?php if(!empty($disturbed_from)) {?>
                          <h3>Disturbed Nap</h3>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>From</th>
                                <th><?php echo $sleep['d_nap_from']; ?></th>
                                <th>Till</th>
                                <th><?php echo $sleep['d_nap_to']; ?></th>
                                <th>Reason</th>
                                <th><?php echo $new_desp; ?></th>
                                <th><?php echo $sleep['d_nap_to']-$sleep['d_nap_from']; ?> Hours Disturbed</th>
                              </tr>
                            </thead>
                          </table>
                        <?php } ?>
                        <hr>
                        <?php if(!empty($power_from)){ ?>
                          <h3>Power Nap</h3>
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>From</th>
                                <th><?php echo $sleep['p_nap_from']; ?></th>
                                <th>Till</th>
                                <th><?php echo $sleep['p_nap_to']; ?></th>
                                <th><?php echo $sleep['p_nap_to']-$sleep['p_nap_from']; ?> Hours Power Nap</th>
                              </tr>
                            </thead>
                          </table>
                        <?php } 
                        ?>


                      </div>
                    </div>

                    <?php
                  }
                }
              }
              ?>


            </div>
          </div>
        </div>
      </div>
    </div></div>
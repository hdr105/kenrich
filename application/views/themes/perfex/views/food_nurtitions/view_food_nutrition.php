<div class="row">
    <div class="panel_s">
         <?php if($this->session->flashdata('success'))
            { ?>
              <div class="alert alert-success animated fadeIn">
                <strong>Successfully </strong> <?php echo $this->session->userdata('success'); ?>
                </div><?php
              }
              ?>
       <div class="panel-body">
        <div class="_buttons">
            <a href="<?php echo base_url('Food_Nutrition/index'); ?>" class="btn btn-info pull-left display-block">
                <?php echo _l('New Diet'); ?>
          </a>
      </div>
      <div class="clearfix"></div>
      <div>
         <div class="tab-content">
           <div class="clearfix"></div>
           <hr class="hr-panel-heading" />
           <?php
           foreach ($userdatas as $userdata) {
            $date = $userdata['fn_date'];
            $id = $this->session->userdata('client_user_id');
            $date_wise = get_data_via_date($date,$id);
            $format = date_create($date);
            $formatted_date = date_format($format,'l jS F Y');
            ?>
            

            <table class="table table-bordered">
              <div class="row head-style">
                <div class="col-md-8">

                </div>
                <div class="col-md-4">
                    <h4><?php echo $formatted_date; ?></h4>
                </div>
            </div>
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Type</th>
                        <th>Detail</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($date_wise as $dates) 
                    {
                        ?>
                        <tr>
                            <td class="width-25"><?php echo $dates['fn_time']; ?></td>
                            <td class="width-25 clr-yellow"><?php echo $dates['fn_type']; ?></td>
                            <td class="width-25"><?php echo  $dates['fn_desp']; ?></td>
                            <td class="width-25"><a href="<?php echo base_url('Food_Nutrition/edit/').$dates['fn_id']; ?>" class="btn btn-default btn-icon"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="<?php echo base_url('Food_Nutrition/delete/').$dates['fn_id']; ?>" class="btn btn-danger _delete btn-icon"><i class="fa fa-remove"></i></a></td> 
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
    </div>
</div>
</div>
</div>
</div>




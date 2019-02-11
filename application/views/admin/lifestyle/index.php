<?php init_head(); ?>
<style type="text/css">
  .select2-container{
    width: 100% !important;
  }
</style>
<div id="wrapper" class="customer_profile">
   <div class="content">
      <div class="row">
               <div class="col-md-12">
         <div class="panel_s">
            <div class="panel-body">
               <div class="clearfix"></div>
               <form id="food_search" method="POST" action="javascript:;">
                <div class="row">
                <div class="col-md-4">
                <label for="id" class="control-label"><?php echo _l('Client'); ?></label>
                 <div class="form-group">
                  
                  <select id="id" name="clientid" class="form-control searchlive" width = "100%">
                    <option value="">-- Select Client --</option>
                    <?php
                    if(isset($contacts))
                    {
                     foreach ($contacts as $contact) 
                     {
                      $id = $contact['userid'];
                      $name = $contact['firstname']." ".$contact['lastname'];
                      ?>
                      <option value="<?php echo $id ?>"><?php echo $name ?></option>
                    <?php }
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-4 ">
              <?php echo render_date_input('start_date','Start Date'); ?>
              </div>
              <div class="col-md-4 ">
              <?php echo render_date_input('end_date','End Date'); ?>
            </div>
          </div>
            <div class="row center_div">
              <div class="col-md-3">
              <button type="submit" id="submit" class="btn btn-info proposal-form-submit save-and-send transaction-submit">
                <?php echo _l('search'); ?>
              </button>
            </div>
          </div>
            </form>
          </div>
      </div>
   </div>
   <div class="col-md-12" id="showdata">



</div>
</div>
</div>
</div>
<?php init_tail(); ?>
<?php $this->load->view("admin/lifestyle/scripts"); ?>
</body>
</html>
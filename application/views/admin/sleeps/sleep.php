<?php init_head(); ?>
<div id="wrapper" class="customer_profile">
 <div class="content">
  <div class="row">

   <div class="col-md-3">
     <div class="panel_s">
      <div class="panel-body">
       <div class="clearfix"></div>
       <div class="form-group select-placeholder">
        <label for="clientid" class="control-label"><?php echo _l('Client'); ?></label>
        <select id="clientid" name="clientid" data-width="100%" class="searchlive" data-none-selected-text="<?php echo _l('dropdown_non_selected_tex'); ?>">
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
</div>
</div>

<div class="col-md-9">
  <div class="panel_s">
   <div class="panel-body">
    <div class="clearfix"></div>
    <div>
     <div class="tab-content">
       <div class="clearfix"></div>
       <hr class="hr-panel-heading" />
       <div id="showdata">
       
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
<?php init_tail(); ?>
<?php $this->load->view("admin/sleeps/script"); ?>
</body>
</html>

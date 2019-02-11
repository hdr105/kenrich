<script>
  function openlocation() {

    $(".lifestyle").addClass("active");
   window.location.href='<?php echo base_url('admin/lifestyle') ?>';
  }
    $(document).ready(function(){
       $('.searchlive').select2();




      $("#food_search").on('submit',function(e)
      {
        e.preventDefault();
        $.ajax({
          method:'post',
          url:"<?php echo base_url('admin/lifestyle/clientdata');?>",
          data:new FormData(this),
          dataType:'text',
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData:false,
        success:function(data)
        {
        	$("#showdata").html(data);
          $('.searchlive').select2();
        },

      });
      });
    });
  
    

</script>
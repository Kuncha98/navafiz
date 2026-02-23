
<style>
.panel-body ul {
	list-style: none !important;
}
</style>

  
  <section>
        
                <div class="row">
                        <div class="col-md-12 mb-4">
                                <h2 class="text-center">My Achievements</h2>
                        </div>

                        <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
                        <div class="col-md-8 offset-2">
                <form class="form-horizontal" method="post" action="<?=base_url('admin/members/save_story')?>" id="memberpage">
                    <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Member Name <span class="required">*</span></label>
                      <input type="text" id="autouser" name="m_name"  value="" class="form-control" required autocomplete="off"/>
                      <input type="hidden" id="userid" name="user_id"  value="" class="form-control" required autocomplete="off"/>

                    </div>
                   </div>
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Subject <span class="required">*</span></label>
                      <input type="text" id="subject" name="subject"  value="" class="form-control" required/>

                    </div>
                  </div>


                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Detail <span class="required">*</span></label>
                      <textarea type="text" id="descr" name="descr"  class="form-control" rows="10" required></textarea>

                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary pull-right" type="submit"> Submit <i style="margin-top: 0; font-size: 14px; color: #fff;" class="fa fa-angle-right"></i></button>
                  </div>
                </form>
                        </div>
                </div>
       
  </section>
 
<script> 
    $(document).ready(function(){

     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>admin/members/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
                console.log('ajax complte');
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#autouser').val(ui.item.label); // display the selected text
//          $('#name').val(ui.item.label); // display the selected text
          $('#userid').val(ui.item.value); // save selected id to input
         
          return false;
        }
      });

    });


   
</script>


<style>
    .add_jobportals small{
        color: #9c9c9c;
    }
</style>
<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12  add_jobportals">
     
            <form action="<?=base_url('admin/members/save_job_portal/')?>" method="post">
                <div class="form-group">
                        <label>Member Name</label>
                        <input type="text" id="autouser" placeholder="Type Member Name" class="form-control" name="m_name" value="" >
                        <input type="hidden" id="userid" class="form-control" name="userid" value="" >
                     </div>
                <div class="row">
                    <div class="col-md-6">
                     <div class="form-group">
                        <label>Navafiz</label>
                        <input type="url" placeholder="Add Your Profile Link Here" class="form-control" name="navafiz" value="" >
                        <small><a href="https://navafiz.com" target="_blank">https://navafiz.com</a></small>
                     </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Bayt</label>
                        <input type="url" placeholder="Add Your Profile Link Here" class="form-control" name="bayt_link" value="">                        
                        <small><a href="https://www.bayt.com" target="_blank">https://www.bayt.com</a></small>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                   <div class="form-group">
                        <label>Monster Gulf</label>
                        <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="monstergulf" value="" >
                        <small><a href="https://www.monstergulf.com" target="_blank">https://www.monstergulf.com</a></small>
                   </div>
                    </div>
                    <div class="col-md-6">
                   <div class="form-group">
                    <label>Gulf Talent</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="gulftalent" value="" >
                    <small><a href="https://www.gulftalent.com" target="_blank">https://www.gulftalent.com</a></small>
                   </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                   <div class="form-group">
                    <label>Naukri Gulf</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="naukrigulf" value="" >
                    <small><a href="https://www.naukrigulf.com" target="_blank">https://www.naukrigulf.com</a></small>
                   </div> 
                  </div>
                   <div class="col-md-6">
                   <div class="form-group">
                    <label>Dubizzle</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="dubizzle" value="" >
                    <small><a href="https://www.dubizzle.com" target="_blank">https://www.dubizzle.com</a></small>                        
                   </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Indeed</label>
                        <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="indeed" value="" >
                        <small><a href="https://www.indeed.ae" target="_blank">https://www.indeed.ae</a></small>
                    </div>  
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label>Rigzone (World Wide Worker)</label>
                        <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="worldwideworker" value="" >
                        <small><a href="https://www.rigzone.com" target="_blank">https://www.rigzone.com</a></small>
                    </div>  
                    </div>
                </div>                
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Goto Gulf</label>
                    <input type="text" placeholder="Add Your Profile Link Here" class="form-control" name="gotogulf" value="" >
                    <small><a href="https://gotogulf.com" target="_blank">https://gotogulf.com</a></small>
                    </div> 
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                    <label>Buzz On (Khaleej Times)</label>
                    <input type="url" placeholder="Add Your Profile Link Here" class="form-control" name="khaleejtimes" value="">
                    <small><a href="https://buzzon.khaleejtimes.com" target="_blank">https://buzzon.khaleejtimes.com</a></small>
                    </div> 
                    </div>
                </div>
                
                 <input type="hidden" name="is_post" value="1">
               
                <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Save</button>
            </form>
        </div>
    </div>
</div>




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
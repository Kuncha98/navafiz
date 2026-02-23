

<form role="form" method="post" action="<?=site_url('admin/members_by_list/update_user_by_list/'.$form->id)?>" class="form-horizontal form-bordered">
  <div class="panel panel-default">
    
    <div class="panel-body">
        <div class="row">
            <div class="offset-md-3 col-md-6">
              <div class="form-group">
                    <label class="col-sm-2 control-label">User_list:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="list_id">
                            <option>--Select User List--</option>
                            <?php foreach($user_list as $list){ ?>
                            <option value="<?=$list->id?>" <?=$list->id==$form->list_id ? 'selected' : '' ?> ><?=$list->name?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>  
            </div>
            <div class="offset-md-3 col-md-6">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Member:</label>
                    <div class="col-sm-10">
                        <input type="text" placeholder="" class="form-control" id="autouser" name="m_name" value="" placeholder="Search member" autocomplete="off">
                        <input type="hidden" placeholder="" class="form-control" id="userid" name="m_id" value="" autocomplete="off">
                    </div>
                </div> 
            </div>
        </div>
        
           
        </div>
       
      
     <div class="form-actions text-center mr-5">
          <input type="submit" class="btn btn-primary mr-5" value="Submit"/> 
      </div>
    </div>
  </div>
</form>

<script>

    $(document).ready(function(){

     // Initialize
     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>jobs/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
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
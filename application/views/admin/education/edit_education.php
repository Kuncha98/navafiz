
<style type="text/css">
  .dropdown-menu{
    right: auto;
    min-width: auto;
  }
</style>

    <?php $this->load->view('notification/notification-messages');?>

    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" method="post" action="<?=site_url('admin/member_education/updateEducation');?>">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Member Name <span class="required">*</span></label>
                    <p>Do not type name if you dont want to update</p>
                    <input id="autouser" type="text" name="m_name" value=""  class="form-control" autocomplete="off"/>
                    <input id="userid" type="hidden" name="user_id" value=""  class="form-control" autocomplete="off"/>
                  </div>
                </div>
                
                
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Degree Level <span class="required">*</span></label>
                    <select class="select-category form-control" name="me_degree" id="degree">
                      <!--  <option label="Select Option"></option>-->
                      <option value="Matric <?= isset($result['me_degree']) && $result=='Matric'  ? "selected" :''?>">Matric</option>
                      <option value="Intermediate <?= isset($result['me_degree']) && $result=='Intermediate'  ? "selected" :''?>">Intermediate (FA/FSc, A-levels or equivalent)</option>
                      <option value="Bachelor <?= isset($result['me_degree']) && $result=='Bachelor'  ? "selected" :''?>">Bachelor's (BA, Bcom, BSc, Engieenring, MBBS etc.)</option>
                      <option value="Master <?= isset($result['me_degree']) && $result=='Master'  ? "selected" :''?>">Master's (MA, Mcom, MSc, M.Phil etc.)</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Completion Year <span class="required">*</span></label>
                    <input id="input_year" type="text" name="me_year" value="<?=isset($result['me_year']) ? $result['me_year']:'' ?>"  class="form-control" autocomplete="off" readonly=""/>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Detail <span class="required">*</span></label>
                    <textarea id="descr" name="me_descr" placeholder="" class="form-control"><?=set_value('me_descr',isset($result['me_descr']) ? $result['me_descr']:'');?></textarea>
                  </div>
                </div>
                <?php if(isset($result['me_id']) && $result['me_id']>0){?>
                      <input type="hidden" name="me_id" value="<?=$result['me_id'];?>">
                  <?php }?> 
                <div class="col-md-12 col-sm-12">
                    <input type="submit" class="btn btn-primary col-md-12 col-xs-12" value="Save">
                </div>
              </form>
        </div>
    </div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
$(document).ready(function(){    
    $('#input_year').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
    
    $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>admin/member_education/userList",
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
          $('#userid').val(ui.item.value); // save selected id to input
         
          return false;
        }
      });
    
    
});

   
</script> 



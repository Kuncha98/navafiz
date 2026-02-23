
<style>
.panel-body ul {
	list-style: none !important;
}
</style>

  
                        
<form class="form-horizontal" method="post" action="<?=base_url('admin/assigned_questions/update_question').'/'.$assigned_question->id?>" id="memberpage">
    <div class="col-md-12 col-sm-12">
    <div class="form-group">
      <label>Member Name <span class="required">*</span></label>
      <label>Categories <span class="required">*</span></label>
      <select class="form-control col-6" name="cat_id">
         <?php foreach($categories as $category){
//            print_r($questions);
//             exit();?>
          <option value="<?=$category->c_id?>" <?=$category->c_id == $assigned_question->cat_id ? 'selected':''?>> <?=$category->c_name?></option>
         <?php } ?>
      </select>

    </div>
   </div>
  <div class="col-md-12 col-sm-12">
    <div class="form-group">
      <label>Assign Question <span class="required">*</span></label>
      <select class="form-control col-6" name="question_id">
         <?php foreach($forms as $question){
//            print_r($questions);
//             exit();?>
          <option value="<?=$question->id?>" <?= $question->id == $assigned_question->question_id ? 'selected' :''?>> <?=$question->title?></option>
         <?php } ?>
     </select>

    </div>
  </div>
    
    <div class="col-md-12 col-sm-12">
    <div class="form-group">
      <label>Type <span class="required">*</span></label>
      <select class="form-control col-6" required name="type">
          <option value="by_profile" <?=$assigned_question->type == 'by_profile' ? 'selected' : '' ?>>By Profile</option>
          <option value="by_general" <?=$assigned_question->type == 'by_general' ? 'selected' : '' ?>>By General</option>
          <option value="by_category" <?=$assigned_question->type == 'by_category' ? 'selected' : '' ?>>By Category</option>
     </select>

    </div>
  </div>


  <div class="col-md-12 col-sm-12">
    <button class="btn btn-primary pull-right" type="submit"> Submit </button>
  </div>
</form>
                       
              
       

 
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


<style>
.panel-body ul {
	list-style: none !important;
}
</style>

  <?php
  
//  print_r($questions);
//             exit();
  ?>
                        
<form class="form-horizontal" method="post" action="<?=base_url('admin/assigned_questions/save_question')?>" id="memberpage">
    <div class="col-md-12 col-sm-12">
    <div class="form-group">
      <label>Categories <span class="required">*</span></label>
      <select class="form-control col-6" name="cat_id">
         <?php foreach($categories as $category){
//            print_r($questions);
//             exit();?>
          <option value="<?=$category->c_id?>"> <?=$category->c_name?></option>
         <?php } ?>
     </select>

    </div>
   </div>
  <div class="col-md-12 col-sm-12">
    <div class="form-group">
      <label>Assign Question <span class="required">*</span></label>
      <select class="form-control col-6" name="question_id">
         <?php foreach($questions as $question){
//            print_r($questions);
//             exit();?>
          <option value="<?=$question->id?>"> <?=$question->title?></option>
         <?php } ?>
     </select>

    </div>
  </div>
  <div class="col-md-12 col-sm-12">
    <button class="btn btn-primary pull-right" type="submit"> Submit </button>
  </div>
</form>
                       
              
       

 

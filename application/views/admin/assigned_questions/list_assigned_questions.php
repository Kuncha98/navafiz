
<ul class="nav nav-tabs">
    <ul class="nav nav-tabs">

        <li><a href="<?= site_url('admin/assigned_questions/add_question')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Assigned Question</a></li>
      
    </ul>
</ul>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Assigned Questions List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>Id</th>
      <th>Question</th>
      <th>Category</th>
      <th>Type</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php if($forms!='empty') {
//	print_r($forms);
//        exit();
foreach($forms as $form){ 
if(!empty($form->cat_id)){
?>
    <tr>
      <td><?=$form->id?></td>
      
      <td>
          <?php $ques = GetQuestion($form->question_id); 
            echo $ques[0]->title;
          ?>
      </td>
      <td>
          <?php $cat = GetCategoryName($form->cat_id); echo $cat;?>
      </td>
      <td><?=$form->type?></td>
      
      <td><a href="<?=site_url('admin/assigned_questions/edit_question').'/'.$form->id?>" class="btn btn-success" title="edit">Edit</a></td>
      <td>
          <a href="<?=site_url('admin/assigned_questions/delete_question').'/'.$form->question_id.'/'.$form->user_id?>" class="btn btn-danger" onClick="return confirm('Are you Sure want to delete this job portal?')">Delete</a>
      </td>
        
    </tr>
    
    <?php

}	  
}
 }
				  ?>
  </tbody>
</table>
</div>
  </div>
</div>
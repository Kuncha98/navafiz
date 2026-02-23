<ul class="nav nav-tabs">
      <ul class="nav nav-tabs">
        <li><a href="<?= site_url('admin/members/add_story')?>" id="" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Member Success Story</a></li>
        <li><a href="javascript:void(0)" id="" class="btn btn-primary m-4" onclick="loadStories(50)"><i class="fa fa-arrow-right"></i> Load More</a></li>
      </ul>
</ul>
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Success Stories List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
   <thead>
                        <tr>
                            <th>Success ID</th>
                            <th>Member Name</th>
                            <th>Subject </th>
                            <th>Description</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            
                        </tr>
                    </thead>  
                    <tbody>
                        <?php if(!empty($stories)){ ?>
                    <?php foreach($stories as $story){?>
                    <tr>
                        <td><?=$story->ss_id?></td>
                        <td class="u_id">
                            <!--<a href="<?=site_url('n/'.$story->user_id);?>" target="_blank">-->
                                
                            <?php
                        $user = GetUserName($story->ss_member_id);
                        if(!empty($user[0]->m_name)){
                            echo $user[0]->m_name;
                        } else{
                            echo "Member Not Exists";
                        }
                        ?>
                                <!--</a>-->
                        </td>
                        <td><?= $story->ss_subject;?></td>
                        <td><?= $story->ss_descr;?></td>
                        
                        <td><a href="<?=site_url('admin/members/edit_story/'.$story->ss_member_id)?>" class="btn btn-success">Edit</a></td>
                        <td><a href="<?=site_url('admin/members/delete_story/'.$story->ss_id)?>" onclick="return confirm('Are you want to delete this story ?');" class="btn btn-danger">Delete</a></td>
                        
                    </tr>
                        <?php } 
                        
                    }?>
                            
                       
                    </tbody>
                </table>
</div>
  </div>
</div>


<script>
    
$(document).ready(function() {
    $('#dataTable').DataTable();
} );
 

</script>
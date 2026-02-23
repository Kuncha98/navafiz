 

<?php $this->load->view('notification/notification-messages');?>
<div class="row">
    <div class="col-10">
        <div class="heading-inner first-heading">              
            <a href="<?=site_url('admin/members/add_skill');?>" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Member Skills</a>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Education List</h6>
    </div>
<div class="card-body">
  <div class="table-responsive">
   <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Member Name</th>
                            <th>Skills</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>  
                    <tbody>
                    <?php foreach($forms as $row){
                        if(!empty($row->m_skills)){?>
                    <tr>
                        <td><?=$row->m_name?></td>
                        <td><?= $row->m_skills;?></td>
                        <td><a class="btn btn-success" href="<?php echo site_url('admin/members/edit_skill');?>/<?=$row->m_id;?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="<?php echo site_url('admin/members/delete_skill');?>/<?=$row->m_id;?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                    </tr>
                    <?php }
                    }
                    ?>
                    </tbody>
                </table>
      </div>
  </div>
</div>


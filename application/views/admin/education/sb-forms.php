
<?php $this->load->view('notification/notification-messages');?>
<div class="row">
    <div class="col-10">
        <div class="heading-inner first-heading">              
            <a href="<?=site_url('admin/member_education/add');?>" class="btn btn-success m-4"><i class="fa fa-plus"></i> Add Education</a>
            <a href="javascript:void(0)" class="btn btn-primary m-4" onclick="loadEducation(50)"><i class="fa fa-arrow-right"></i>  Load More  </a>
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
                            <th>Degree Level</th>
                            <th>Completion Year</th>
                            <th>Member Name</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>  
                    <tbody>
                    <?php foreach($education as $row){?>
                    <tr>
                        <td><?= $row->me_degree;?></td>
                        <td><?= $row->me_year;?></td>
                        <td>
                            <?php $user = GetUserName($row->me_member_id);
//                            print_r($user[0]->m_name);
//                            exit();
                                    if(!empty($user[0]->m_name)){
                                    ?>
                            <?php echo $user[0]->m_name;
                                    }else{echo "Member not exists";}?>
                        </td>
                        <td><?= $row->me_descr;?></td>
                        <td><a class="btn btn-success" href="<?php echo site_url('admin/member_education/edit');?>/<?=$row->me_id;?>">Edit</a></td>
                        <td> <a class="btn btn-danger" href="<?php echo site_url('admin/member_education/delete');?>/<?=$row->me_id;?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                    </tr>
                    <?php }?>
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
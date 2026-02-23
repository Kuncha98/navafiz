<?php $this->load->view('include/header.php'); ?>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages'); ?>    
    <div class="row">
        <div class="col-md-12 col-xs-12 text-center">
            <h1>Recruitment Project Requests List</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Actions</th>
                    </tr>
                </thead>  
                <tbody>
                <?php foreach($members as $member){?>
                <tr>
                    <td><?= $member->name;?></td>
                    <td><?= $member->email;?></td>
                    <td><?= $member->phone_no;?></td>
                    <td>
                        <a class="btn btn-success" href="<?php echo site_url('recruitment_projects/edit_recruitment');?>/<?=$member->id;?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo site_url('recruitment_projects/delete_recruitment');?>/<?=$member->id;?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                    </td>
                </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer.php');?>
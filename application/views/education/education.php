<?php $this->load->view('include/header');?>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-10">
            <div class="heading-inner first-heading">              
                <a href="<?=site_url('education/add');?>" class="btn btn-primary">Add Education</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-10">
            <div class=" education-box">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Degree Level</th>
                            <th>Completion Year</th>
                            <th>Detail</th>
                            <th>Actions</th>
                        </tr>
                    </thead>  
                    <tbody>
                    <?php foreach($education as $row){?>
                    <tr>
                        <td><?= $row->me_degree;?></td>
                        <td><?= $row->me_year;?></td>
                        <td><?= $row->me_descr;?></td>
                        <td>
                            <a class="btn btn-success" href="<?php echo site_url('education/edit');?>/<?=$row->me_id;?>">Edit</a>
                            <a class="btn btn-danger" href="<?php echo site_url('education/delete');?>/<?=$row->me_id;?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('include/footer');?>
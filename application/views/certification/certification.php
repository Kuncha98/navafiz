<?php $this->load->view('include/header');?>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="row">
        <div class="col-10">
            <div class="heading-inner first-heading">              
                <a href="<?=site_url('certification/add/'.$uri_user_id);?>" class="btn btn-primary">Add Certification</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Duration</th>
                            <th>Certification File</th>
                            <th>Action</th>
                        </tr>
                    </thead>  
                    <tbody>
                    <?php foreach($certification as $row){?>
                    <tr>
                        <td><?= $row->c_title;?></td>
                        <td><?= $row->c_description;?></td>
                        <td><?= $row->c_duration;?></td>
                        <td><a href="<?=site_url('nassets/profile/courses-ceritificates/'.$row->certification_file);?>" target="_blank" class="btn btn-success">View</a></td>
                        <td>
                            <a class="btn btn-success" href="<?php echo site_url('certification/edit');?>/<?=$row->c_id.'/'.$uri_user_id;?>">Edit</a>
                            <a class="btn btn-danger" href="<?php echo site_url('certification/delete');?>/<?=$row->c_id.'/'.$uri_user_id;?>" onclick="return confirm('Are you sure you want to delete this?');">Delete</a>
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
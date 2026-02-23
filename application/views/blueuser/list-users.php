<?php $this->load->view('include/header');?>

<style>
    tbody {
    /*display:block;*/
    max-height:500px
  }/*
  thead, tbody tr {
    display:table;
    width: 100%;
    table-layout:fixed;
  }*/
</style>
<div class="container-mid">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4" col-xs-12 float_right>
                &nbsp;
                <a href="<?=site_url('blueuser/adduser');?>" target="_blank" class="btn btn-outline-success float-right" style="margin-left: 10px;">Add Blue User</a>
                &AElig;&nbsp;
                <a href="<?=site_url('blueuser/listusers');?>" target="_blank" class="btn btn-outline-info float-right" style="margin-right: 10px;">View List of Blue User</a>
                </div>
            </div>
            <div style="">
            <div class="row">
                <div class="col-md-12 col-xs-12 mx-auto" style="height: 500px;overflow-x: scroll;">            
                    <div class="table-responsive text-nowrap" style="height: 600px;overflow: scroll;">
                        <table class="table table-striped table-bordered">                        
                          <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Profession</th>
                                <th scope="col" class="nowrap">Current City</th>
                                <th scope="col">Visa Status</th>
                                <th scope="col">Added By</th>
                                <th scope="col">Add Certification</th>
                                <th scope="col">View Certification</th>
                                <th scope="col">Availability</th>
                                <th scope="col">Whatsapp Number</th>
                                <th scope="col">Mobile Number</th> 
                                <th scope="col">Nationality</th> 
                                <th scope="col">Passport</th>
                                <th scope="col">Cancelled Visalled Visa</th>
                                <th scope="col">Visa</th>
                                <th scope="col">New Offer Letter</th>
                                <th scope="col">Signed Offer Letter</th>
                                <th scope="col">Member CV</th>
                                <th scope="col">Date of Follow Up</th>
                                <th scope="col">Date of joining</th>
                                <th scope="col">Status-1</th>
                                <th scope="col">Status-2</th>
                                <th scope="col">Remarks-1</th>
                                <th scope="col">Remarks-2</th>
                                <th scope="col">Added On Updated</th>
                                <th scope="col">Last Updated</th>
                                <th scope="col">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            if(count($userslist)>0){
                            $i=1;
                            foreach ($userslist as $user) {
                                if(isset($user->data_added_by) && intval($user->data_added_by) > 0){
                                    $user_data = GetUserDetails($user->data_added_by);
                                    $url = site_url('n/'.$user_data->m_id);
                                }else{
                                    $url = '#';
                                }
                                ?>
                                  <tr>
                                    <th scope="row"><?=$i?></th>
                                    <td><a href="<?=site_url('profile/'.$user->m_id);?>"><?=$user->m_name;?></a></td>
                                    <td><?=$user->m_profession;?></td>
                                    <td><?=$user->m_current_city;?></td>
                                    <td><?=$user->visa_status;?></td>
                                    <td><a href="<?= $url?>"><?= isset($user_data) ? $user_data->m_name : ''?></a></td>
                                    <td><a href="<?=site_url('certification/add/'.$user->m_id);?>" target="_blank" class="btn btn-success">Add</a></td>
                                    <td><a href="<?=site_url('certification/index/'.$user->m_id);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><?=$user->availability;?></td>
                                    <td><?=$user->whatsapp_number;?></td>
                                    <td><?=$user->m_phone;?></td>
                                    <td><?=$user->m_nationality;?></td>
                                    <td><a href="<?=site_url('public-assets/blueusersfiles/'.$user->passport_file);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><a href="<?=site_url('public-assets/blueusersfiles/'.$user->cancelled_visa_file);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><a href="<?=site_url('public-assets/blueusersfiles/'.$user->visa_file);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><a href="<?=site_url('public-assets/blueusersfiles/'.$user->new_offer_letter_file);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><a href="<?=site_url('public-assets/blueusersfiles/'.$user->signed_offer_letter_file);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><a href="<?=site_url('public-assets/cvreviews/'.$user->member_cv);?>" target="_blank" class="btn btn-success">View</a></td>
                                    <td><?=$user->date_of_followup;?></td>
                                    <td><?=$user->date_of_joining;?></td>                                    
                                    <td><?=$user->status_1;?></td>                                    
                                    <td><?=$user->status_2;?></td>                                    
                                    <td><?=$user->remark_1;?></td>                                    
                                    <td><?=$user->remark_2;?></td>                                    
                                    <td><?=$user->added_on;?></td>                                    
                                    <td><?=$user->updated_on;?></td>                                    
                                    <td>
                                        <a href="<?=site_url('blueuser/edituser/'.$user->m_id);?>" class="btn btn-success">Edit</a>
                                        <a href="<?=site_url('blueuser/delete/'.$user->m_id);?>" Onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-danger">Delete</a>
                                    </td>  
                                  </tr>
                            <?php $i++; }?>                                                    
                            <?php }?>                                                    
                          </tbody>
                        </table> 
                    </div>                             
                </div>
            </div>
            </div>
        </div>
    </div>    
</div>        
<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<div class="container-mid">
    <div class="row">
        <?php
        if($list_jobs != 'empty'){
        foreach($list_jobs as $list_job){ ?>
        <div class="col-md-2 col-xs-12 mb-2 m-0">            
            <a href="<?=site_url('mentors/quick_job_applicants/'.$list_job->quick_job_id)?>" class="btn <?=$job_id==$list_job->quick_job_id ? 'btn-secondary':'btn-outline-secondary';?> col-12"><?=$list_job->title?>  (<?=$list_job->applicants_count?>) </a>
            
            <!--<div class="card">
                    <div class="card-header">
                        <div class="text-center">
                           <a href="<?=site_url('mentors/quick_job_applicants/'.$list_job->quick_job_id)?>" style="color:#000;">
                              <?=$list_job->title?>
                           </a> 
                        </div>
                    </div>                   
            </div>-->
        </div>
        <?php }}?>
    </div>
    
    <div class="row">
        <?php
        if($job_applicants != 'empty'){
        foreach($job_applicants as $job_applicant){ ?>
        <div class="col-md-4">
            <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                               
                                 <?=$job_applicant->name?>
                                
                            </div>
                            <div class="col-md-6">
                                
<!--                                <a href="<?=site_url('mentors/add_quick_member/'.$job_applicant->job_id.'/'.$job_applicant->id)?>" class="float-right">
                                    
                                </a>-->
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="card-body">
                      <p class="card-subtitle mb-2 mt-2">Applicant Name: <?=$job_applicant->name?></p>
                      <p class="card-subtitle mb-2 mt-2"> Whatsapp Number: <?=$job_applicant->whatsapp_number?></p>
                      <p class="card-subtitle mb-2 mt-2">Applicant Email: <?=$job_applicant->email?></p>
                      <?php 
                      if(isset($job_applicant->email) && $job_applicant->email != ''){
                        $member = SearchQuickMember($job_applicant->email); 
                        if(!empty($member)){
                      ?>
                      
                      <p>Profile Link: <a href="<?= site_url('n/'.$member[0]->m_id)?>" target="_blank"><?=site_url('n/'.$member[0]->m_id)?></a></p>
                      <?php }                      
                        else{ ?>
                    <!--<form action="<?=site_url('mentors/add_quick_member/'.$job_applicant->job_id.'/'.$job_applicant->id)?>" method="post">
                        <input name="name" type="hidden" value="<?=$job_applicant->name?>"></input>
                        <input name="whatsapp_number" type="hidden" value="<?=$job_applicant->whatsapp_number?>"></input>
                        <input name="email" type="hidden" value="<?=$job_applicant->email?>"></input>
                        <input type="submit" value="Add as a Navafiz Member" class="btn btn-success float-right"></i></input>
                    </form>-->
                      <?php }}?>
                      <br />
                      <form method="post" id="remarks_form">
                        <label class="text-center">Admin Remarks:</label>
                        <?php if($job_applicant->remarks == '' || empty($job_applicant->remarks)){
                            $remarks = '';
                        } else{$remarks = $job_applicant->remarks;}?>
                        <textarea required="" id="remarks" class="form-control" rows="4" cols="6"><?=$remarks?></textarea>
                        <input type="hidden" id="applicant_id" class="form-control" value="<?=$job_applicant->id?>"></input>
                        <div class="text-center">
                            <input type="submit" class="btn btn-outline-success mt-3" name="Submit"></input>
                        </div>
                        
                      </form>
                      
                      <?php
                      if(in_array($session_user_id , CvReviewTeamList())){ ?>
                      <a href="<?=site_url('mentors/delete_quick_member/'.$job_applicant->id.'/'.$job_applicant->job_id)?>" onclick="return confirm('Are you sure want to delete?')" class="btn btn-outline-danger float-right">Delete</a>
                      <a href="<?=site_url('mentors/edit_quick_member/'.$job_applicant->id.'/'.$job_applicant->job_id)?>" onclick="findApplicant('<?=$job_applicant->id?>','<?=$job_applicant->job_id?>','<?=$job_applicant->name?>','<?=$job_applicant->whatsapp_number?>','<?=$job_applicant->email?>','<?=$job_applicant->resume?>')" class="btn btn-outline-primary float-left" data-toggle="modal" data-target="#editModal" id="">Edit</a>
                      <?php  }
                      ?>
                     
                      
                    </div>
                   
            </div>
        </div>
        <?php 
        
        }
        }else{?>
            
        <?php }
        ?>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Applicant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form method="post" action="<?=site_url('jobs/editApplicant/')?>" enctype="multipart/form-data">
      <div class="modal-body">
         <div class="form-group">
            <label for="name" class="col-form-label required">Name:</label>
            <input type="text" required="" class="form-control" id="app_name" name="name">
          </div>
          <div class="form-group">
            <label for="whatsapp_number" class="col-form-label required">Whatsapp Number:</label>
            <input type="text" required="" class="form-control" name="whatsapp_number" id="app_whatsapp">
          </div>
          <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="app_email">
          </div>
          <div class="form-group">
            <label for="resume_file" class="col-form-label">Resume:</label>
            <input type="file" class="form-control" name="app_resume" id="app_resume">
          </div>
          <div class="form-group">
            <!--<label for="recipient-name" class="col-form-label">Email:</label>-->
            <input type="hidden" class="form-control" name="applicant_id" id="app_applicant_id">
            <input type="hidden" class="form-control" name="job_id" id="app_job_id">
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>


<?php $this->load->view('include/footer'); ?>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="myModalRemarks">
  <div class="modal-dialog modal-sm">
      <div class="modal-content success" style="width: 281px;height: 42px;">
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" style="font-size:13px;position: absolute;font-size: 16px;right: 8px;top: 5px;">x</span>
        </button>
        <div class="text-center mt-2">Remarks Added Successfully</div> 
    </div>
  </div>
</div>
<script>

$(document).ready(function(){
      $('#remarks_form').on('submit',function(event){
      console.log('remarks');
      var remarks = $("#remarks").val()
      var applicant_id = $("#applicant_id").val()
      
      var form_data = {"remarks":remarks,"applicant_id":applicant_id}
      console.log(form_data);
      event.preventDefault();
      $.ajax({
         url:"<?= site_url('jobs/save_applicant_remarks')?>",
         data: form_data,
         method:"POST",

         success: function(data){
             console.log('hello success');
             $('#myModalRemarks').modal('show');

//                    $('.content').append("<div class='alert alert-success alert-dismissible fade show' role='alert'>Thank you for registering to our news letters.\n\
//            <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>")

        }
     })
 })
 
 

        
    })
    function findApplicant(id,job_id,name,whatsapp, email, resume){
//       alert(id);
       $("#app_applicant_id").val(id);
       $("#app_job_id").val(job_id);
       $("#app_name").val( name );
       $("#app_whatsapp").val( whatsapp );
       $("#app_email").val( email );
       $("#app_resume").val( resume );
       
   }
</script>
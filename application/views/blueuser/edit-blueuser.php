<?php $this->load->view('include/header');?>
<style>
    .submitbasil{
        background-color: #00ff00;
        border: 1px solid #00ff00;
        border-radius: 8px;
        color: white;        
    }
    .submitbasil:hover{
        background-color: blue;
        color: red;
    }
</style>
<pre>
<?php // print_r($userinfo);?>
</pre>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />

<!-- datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" />



<div class="container-mid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-xs-12 mx-auto">            
                    <form action="<?=base_url('blueuser/updateuser/'.$userinfo->m_id)?>" method="post" class="login_page" enctype="multipart/form-data">                  
                       <?php $this->load->view('notification/notification-messages');?>
                        <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Name: <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Name" name="m_name"  value="<?=$userinfo->m_name;?>" class="form-control" autocomplete="off" required="">
                                </div>  
                                <div class="form-group">
                                    <label>Current City <span class="">*</span></label>
                                    <input type="text"  placeholder="City Name" name="m_current_city"  value="<?=$userinfo->m_current_city;?>" class="form-control" autocomplete="off">
                                </div>        
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Profession: <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Profession" name="m_profession"  value="<?=$userinfo->m_profession;?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Visa Status <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Visa Status" name="visa_status"  value="<?=$userinfo->visa_status;?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                                  <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Availability</label>
                                    <input type="text"  placeholder="Enter Availability" name="availability"  value="<?=$userinfo->availability;?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Mobile Number <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Mobile Number" name="m_phone"  value="<?=$userinfo->m_phone;?>" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Nationality <span class="">*</span></label>
                                    <input type="text"  placeholder="Nationality" name="m_nationality"  value="<?=$userinfo->m_nationality;?>" class="form-control" autocomplete="off">
                                </div>
                                
                                    <div class="form-group">
                                    <label>Whatsapp Number <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Whatsapp Number" name="whatsapp_number"  value="<?=$userinfo->whatsapp_number;?>" class="form-control" autocomplete="off">
                                </div>    
                            </div>
                            
                               
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Passport</label>
                                    <input type="file"  placeholder="Enter Name" name="passport_file"  class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label> Visa </label>
                                    <input type="file"  placeholder="Enter Name" name="visa_file" class="form-control" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Cancelled Visalled Visa<span class="">*</span></label>
                                    <input type="file" name="cancelled_visa_file"  value="" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label> New Offer Letter <span class="">*</span></label>
                                    <input type="file"  placeholder="Enter Name" name="new_offer_letter_file"  value="" class="form-control" autocomplete="off">
                                </div>
                            </div>
                             <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Signed Offer Letter </label>
                                    <input type="file"  placeholder="Enter Name" name="signed_offer_letter_file"  value="" class="form-control" autocomplete="off">
                                </div>
                            
                            </div>
                             <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Resume <span class="">*</span></label>
                                    <input type="file"  name="member_cv"  class="form-control">
                                </div>                                
                            </div>
                            
                            <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="date"> Date of joining <span class="">*</span></label>
                                    <input type="text" placeholder="<?=date('Y-m-d');?>" name="date_of_joining"  value="<?=$userinfo->date_of_joining;?>" class="form-control picker" autocomplete="off">
                                </div>
                            </div>
                            
                             <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label>Date of Follow Up <span class="">*</span></label>
                                    <input type="text" placeholder="<?=date('Y-m-d');?>"  name="date_of_followup"  value="<?=$userinfo->date_of_followup;?>" class="form-control picker" autocomplete="off">
                                </div>                                
                            </div>
                             <div class="col-md-12 col-xs-12">
                                 <div class="form-group">
                                    <label> Status-1 <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Status-1" name="status_1"  value="<?=$userinfo->status_1;?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label>Status-2 <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Status-2" name="status_2"  value="<?=$userinfo->status_2;?>" class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label> Remarks-2 <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Remark-2" name="remark_2"  value="<?=$userinfo->remark_2;?>" class="form-control" autocomplete="off">
                                </div>
                                 <div class="form-group">
                                    <label>Remarks-1 <span class="">*</span></label>
                                    <input type="text"  placeholder="Enter Remark-1" name="remark_1"  value="<?=$userinfo->remark_1;?>" class="form-control" autocomplete="off">
                                </div>
                            </div>

                        </div> 
                        <div class="row">
                            <div class="col-md-5 col-xs-12 mx-auto">                                
                                <input type="submit" class="btn btn-success col-12">                                
                            </div>
                        </div>                       
                    </form>            
                </div>
            </div>
        </div>
    </div>    
</div>
  
  
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>

<script>
    $(".picker").datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
        
    });
</script>

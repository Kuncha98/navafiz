
<style>
    label{
        font-size: 12px !important;
    }
</style>
<div class="container">
    <?php $this->load->view('notification/notification-messages');?>
    <div class="card">
        <div class="card-header">
            <form action="<?=base_url('admin/members/UplaodCV').'/'.$user_data->m_id;?>" method="post" enctype="multipart/form-data">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                <div class="row">                                               
                    <div class="col-md-12 col-sm-12 col-xs-12">            
                        <div class="form-group">
                            <h3>Upload Your Resume</h3>                            
                            <p>
                                <input type="file" class="btn btn-outline-info"  name="resume_file" required="">
                            </p>
                            <input type="submit" class="btn btn-success col-md-6 col-xs-12 mx-auto" value=" &nbsp;&nbsp; Save &nbsp;&nbsp;">
                        </div>
                    </div>
                </div>
            </div>                        
            </form>
        </div>
    </div>
</div>

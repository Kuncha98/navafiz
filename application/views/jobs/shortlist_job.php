<?php $this->load->view('include/header'); ?>
<?php $session_user_id = $this->session->userdata('user_id');?>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<div class="container">
<!--     Search User : <input type="text" id="autouser">

    <br><br>
    Selected user id : <input type="text" id="userid" value='0' >

    <br><br>
    Selected user email : <input type="email" id="useremail" value='0' >-->
    <form action="<?php echo base_url('jobs/recommendCanforjob/'.$job_id);?>" method="post">
    <div class="row">
        <div class="mx-auto col-md-6 col-sm-12">
                   <label>Search Candidates</label>
            <input type="text" placeholder="" class="form-control" id="autouser" name="m_name" value="" placeholder="Search member" autocomplete="off">
         </div>
    </div>
    
    <div class="mt-5">
    <div class="row">
     <div class="col-md-6 col-sm-12 ml-auto">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" placeholder="" class="form-control" id="name" name="m_name" value="" autocomplete="off">
                        <?php echo form_error('m_name'); ?>

                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mr-auto">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="" class="form-control" id="useremail" name="m_email" value="" autocomplete="off">
                <?php echo form_error('m_email'); ?>

                    </div>
                </div>
        
                <div class="col-md-6 col-sm-12 ml-auto">
                    <div class="form-group">
                        <label>Professsion</label>
                        <input type="text" placeholder="" class="form-control" id="proff" name="profession" value="" autocomplete="off">
                        <input type="hidden" placeholder="" class="form-control" id="userid" name="m_id" value="" autocomplete="off">
                        <?php echo form_error('m_id'); ?>

                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mr-auto">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" placeholder="" class="form-control" name="m_city" id="m_city" value="" autocomplete="off">
                         <?php echo form_error('m_city'); ?>

                    </div>
                </div>
                <div class="col-md-6 col-sm-12 mr-auto">
                    <div class="form-group">
                        <label>Profile url</label>
                        <!-- The text field -->
                        <input readonly="" type="text" class="form-control" id="profile_url">

                        <!-- The button used to copy the text -->
                        <a href="javascript:void(0);" class="btn btn-success" onclick="return myFunction();">Copy text</a>
                        <!--<input type="text" placeholder="" class="form-control" id="profile_url" value="" autocomplete="off">-->                         
                    </div>
                </div>
    </div>
  
    
</div>
        <div class="mt-5">
            <div class="row">
                <input type="submit" class="btn btn-block btn-outline-success mx-auto">
            </div>
        
        
</form>
    </div>
    <!-- Script -->
  
    <script type='text/javascript'>
    $(document).ready(function(){

     // Initialize
     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: base_url+"jobs/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#autouser').val(ui.item.label); // display the selected text
          $('#name').val(ui.item.label); // display the selected text
          $('#userid').val(ui.item.value); // save selected id to input
          $('#useremail').val(ui.item.email); // save selected id to input
          $('#m_city').val(ui.item.current_city); // save selected id to input
          $('#proff').val(ui.item.profession); // save selected id to input
          $('#profile_url').val(base_url+'profile/'+ui.item.value); // save selected id to input

        return false;
        }
      });

    });
    
    function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("profile_url");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    document.execCommand("copy");

    /* Alert the copied text */
    return false;
  }
    </script>
   

    
    

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<?php $this->load->view('include/footer'); ?>

<script>


</script>
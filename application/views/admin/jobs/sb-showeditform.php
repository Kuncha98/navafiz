


<input type="hidden" name="page_id" id="page_id" />
<input type="hidden" name="limit" id="limit" />

<div class="page-container">

  <div class="page-content">








  <form action="<?=base_url()?>admin/jobs/updatejob" class="form-horizontal form-bordered" method="post" id="jobpage" enctype="multipart/form-data">
  <input type="hidden" id="job_id" name="job_id" value="<?=$form->j_id?>" />
  <div class="row d-flex justify-content-lg-start">
      <div class="col-md-6">
            <div class="form-group">
        <label class="col-sm-2 control-label">Category:</label>
        <div class="col-sm-10">
          <select id="jobcat_id" name="jobcat_id" class="form-control">
            <?php

				 if($categories != "empty")
				 {
					 foreach($categories as $category)
					 {
				 ?>


             <option value="<?=$category->c_id?>" <?php echo ($category->c_id == $form->cat_id)? "selected" : "" ?> >
              <?=$category->c_name?>
              </option>

            <?php
           }
           ?>
           <?php
           }
				 ?>
          </select>
        </div>
      </div>
      </div>
      <div class="col-md-6">
               <div class="form-group">
        <label class="col-sm-2 control-label">Job Title:</label>
        <div class="col-sm-10">
          <select id="jobtitle" name="jobtitle" class="form-control">
           <option value="">Select title</option>
              <?php
                    $cat_qry = "SELECT * FROM jb_jobtitle where jt_status =1 order by jt_title ASC";
                    $cat_rs =  mysqli_query($cat_qry); echo mysqli_error();
                    while($cat_row = mysqli_fetch_array($cat_rs))
                    { ?>


             <option value="<?=$cat_row['jt_title']?>" <?php echo ($cat_row['jt_title'] == $form->j_title)? "selected" : "" ?>>
               <?=$cat_row['jt_title']?>
              </option>

            <?php

				 }
				 ?>
          </select>
        </div>
      </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-6">
                <div class="form-group">
        <label class="col-sm-2 control-label">Title:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Title" class="form-control" name="jobtitle2" id="jobtitle2" value="<?=$form->j_title?>" >
        </div>
      </div>
      </div>
      <div class="col-md-6">

      <div class="form-group">
        <label class="col-sm-2 control-label">Job Reference By:</label>
        <div class="col-sm-10">
            <input type="text" placeholder="Enter Title" id="autouser" class="form-control" name="m_name" value="<?=$form->job_reference_by?>" >
            <input type="hidden" placeholder="Enter Title" id="userid" class="form-control" name="user_id" value="" >
        </div>
      </div>
      </div>
  </div>



  <div class="row">
      <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">Slug:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Slug" class="form-control" name="jobslug" id="jobslug" value="<?=$form->j_slug?>" >
        </div>
      </div>
      </div>
      

  </div>


  <div class="row">
      <div class="col-md-6">
                <div class="form-group">
        <label class="col-sm-2 control-label">Country:</label>
        <div class="col-sm-10">

           <select id="jobcountry" name="jobcountry" class="form-control">
            <?php


				 if($countries != "empty")
				 {
					 foreach($countries as $country)
					 {
				 ?>


             <option value="<?=$country->id?>" <?php echo ($country->id == $form->j_country_id)? "selected" : "" ?> >
              <?=$country->country?>
              </option>

            <?php
					 }
				  }
				 ?>
          </select>

        </div>
      </div>
      </div>
      <div class="col-md-6">
              <div class="form-group">
        <label class="col-sm-2 control-label">Image:</label>
        <div class="col-sm-10">
           <input type="file" id="pic"  name="pic">
            <img id="j_image" src="<?=base_url()?>assets/uploads/jobs/<?=$form->j_image?>" width="80"/>

        </div>
      </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-6">
       <div class="form-group">
        <label class="col-sm-2 control-label">state:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter State" class="form-control" name="jobstate" id="jobstate" value="<?=$form->j_state?>"  >
        </div>
      </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label class="col-sm-2 control-label">City:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter City" class="form-control" name="jobcity" id="jobcity" value="<?=$form->j_location?>" >
        </div>
        </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-6">
                <div class="form-group">
        <label class="col-sm-2 control-label">Name of company:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Name of Company" class="form-control" name="jobcompany" id="jobcompany" value="<?=$form->j_company?>"  >
        </div>
      </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label class="col-sm-2 control-label">Email Address to Apply *:</label>
        <div class="col-sm-10">
          <input type="text" placeholder="Enter Address to Apply" class="form-control" name="jobemailapply" id="jobemailapply" value="<?=$form->j_email_apply?>"  >
        </div>
         </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-6">
                <div class="form-group">
        <label class="col-sm-2 control-label">Skills required for job:</label>
        <div class="col-sm-10">
          <input type="text" id="tags2" class="tags form-control" value="<?=$form->j_tags?>">
        </div>
      </div>
      </div>
      <div class="col-md-6">
       <div class="form-group">
        <label class="col-sm-2 control-label">Description:</label>
        <div class="col-sm-10">
        <textarea class="editor" rows="4" cols="50" name="jobdescr" id="jobdescr" placeholder="Enter text ..."><?=$form->j_descr?>" </textarea>

        </div>
      </div>
      </div>
  </div>











      <div class="form-actions text-right">
        <input type="submit" class="btn btn-primary" value="Submit" />
      </div>


</form>



  </div>

</div>


<script> 
    $(document).ready(function(){

     $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>admin/members/userList",
            type: 'post',
            dataType: "json",
            data: {
              search: request.term
            },
            success: function( data ) {
                console.log('ajax complte');
              response( data );
            }
          });
        },
        select: function (event, ui) {
          // Set selection
          $('#autouser').val(ui.item.label); // display the selected text
//          $('#name').val(ui.item.label); // display the selected text
          $('#userid').val(ui.item.value); // save selected id to input
         
          return false;
        }
      });

    });


   
</script>

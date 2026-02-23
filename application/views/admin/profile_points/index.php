
    <?php $this->load->view('notification/notification-messages');?>
 
    <div class="row">
        <div class="col-12">
            <form class="form-horizontal mb-5" method="post" action="<?=site_url('admin/profile_points/GetPoints');?>">
                
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Member Name <span class="required">*</span></label>
                    <input id="autouser" type="text" name="m_name" value="" class="form-control col-6" autocomplete="off"/>
                    <input id="userid" type="hidden" name="user_id" value="" class="form-control col-6" autocomplete="off" />
                  </div>
                    <input type="submit" value="search" class="btn btn-success">
                </div>
                
                    
                
                </form>
            </div>
    </div>


<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Profile Points List</h6>
</div>
<div class="card-body">
  <div class="table-responsive">
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
                        <tr>
                            <th>Points For</th>
                            <th>Points Type </th>
                            <th>Points</th>
                            <th>Member Name</th>
                            <th>Job Title</th>
                        </tr>
                    </thead>  
                    <tbody>
                        <?php if(!empty($points)){ ?>
                    <?php foreach($points as $row){?>
                    <tr>
                        <td class="u_id">
                            <a href="<?=site_url('n/'.$row->user_id);?>" target="_blank">
                                
                            <?php
                        $user = GetUserName($row->points_for);
                        echo $user[0]->m_name;
                        ?>
                            </a>
                        </td>
                        
                        <td><?= $row->points_type;?></td>
                        <td><?= $row->user_points;?></td>
                        <td class="u_id">
                            <a href="<?=site_url('n/'.$row->user_id);?>" target="_blank">
                                <?php $user_for = GetUserName($row->user_id); 
                                echo $user_for[0]->m_name;
                                ?>
                            </a>
                        </td>
                        <td class="u_id">
                            <a class="" href="<?php echo site_url('job');?>/<?=$row->job_id?>" target="_blank">
                                <?php if(!empty($row->job_id)){
                                    $job = GetJobTitle($row->job_id); 
                                     echo $job->j_title;
                                }else{
                                  
                                ?>
                            </a>
                            <?php echo "Not For Job";
                                }?>
                        </td>
                    </tr>
                    <?php 
                    
                        }
                    
                        }else{ ?>
                        <?php // echo "This User Have <strong>0</strong> Points"; 
                        } ?>
                            
                       
                    </tbody>
                </table>

</table>
</div>
  </div>
</div>


<script>
$(document).ready(function(){    
    $('#input_year').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });
    
    $( "#autouser" ).autocomplete({
        source: function( request, response ) {
          // Fetch data
          $.ajax({
            url: "<?=base_url()?>admin/member_education/userList",
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
          $('#userid').val(ui.item.value); // save selected id to input
         
          return false;
        }
      });
});

    
  
   
    



   
</script> 
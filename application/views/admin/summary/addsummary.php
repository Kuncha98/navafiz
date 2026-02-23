

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>Summary Of Career (Roles & Responsibilities)</h2>
            <form action="<?=base_url('admin/members/Add_summary_points') ?>" id="memberpage" method="post">
                <label>Career Summary Points</label>
                
                <div class="container">
                    <div class="col-md-6">
                    <p>
                        Member Name <input type="text" placeholder="" id="autouser" class="form-control" id="" name="point_1" value="" required="">
                        <input type="hidden" placeholder="" id="userid" class="form-control" id="" name="user_id" value="" >
                    </p>
                    </div>
                </div>
                
                <div class="row">
                    
                   <div class="col-md-6">
                    <p>
                        Point 1 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_1" value="" required="">
                    </p>
                    </div>
                    <div class="col-md-6">
                    <p>
                        Point 2 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_2" value="" required="">
                    </p>
                    </div>
                 </div>
                
                <div class="row">
                    
                   <div class="col-md-6">
                    <p>
                        Point 3 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_3" value="" required="">
                    </p>
                    </div>
                    <div class="col-md-6">
                    <p>
                        Point 4 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_4" value="" required="">
                    </p>
                    </div>
                 </div>
                
                <div class="row">
                    
                   <div class="col-md-6">
                    <p>
                        Point 5 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_5" value="" required="">
                    </p>
                    </div>
                    <div class="col-md-6">
                    <p>
                        Point 6 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_6" value="" required="">
                    </p>
                    </div>
                 </div>
                
                <div class="row">
                    
                   <div class="col-md-6">
                    <p>
                        Point 7 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_7" value="" required="">
                    </p>
                    </div>
                    <div class="col-md-6">
                    <p>
                        Point 8 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_8" value="" required="">
                    </p>
                    </div>
                 </div>
                
                <div class="row">
                    
                   <div class="col-md-6">
                    <p>
                        Point 9 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_9" value="" required="">
                    </p>
                    </div>
                    <div class="col-md-6">
                    <p>
                        Point 10 <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_10" value="" required="">
                    </p>
                    </div>
                 </div>
                
                  <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12 m-5"> Save</button>
                </div>
                <!--<input type="hidden" name="point_id" value="">-->
              </form>
        </div>        
    </div>
    <div class="mb-5 mt-5" style="margin-left: 20px;">
        <h2>
            Examples of Job Description <br />Office Administrator
        </h2>                    
        <ul style="list-style: decimal-leading-zero;margin-left: 20px;">
            <li> Coordinating office activities and operations to secure efficiency and compliance to company policies.</li>
            <li>Supervising administrative staff and dividing responsibilities to ensure performance.</li>
            <li>Keep stock of office supplies and place orders when necessary.</li>
            <li>Management of office equipment.</li>
            <li>Maintaining a clean and enjoyable working environment.</li>
            <li>Handling external or internal communication or management systems.</li>
            <li>Managing clerical or other administrative staff.</li>
            <li>Organizing, arranging and coordinating meetings.</li>
            <li>Organizing travel arrangements for senior managers.</li>
            <li>Writing letters and emails on behalf of other office staff.</li>
            <li> Manage agendas/travel arrangements/appointments etc. for the upper management</li>
            <li>Manage phone calls and correspondence (e-mail, letters, packages etc.)</li>
            <li>Support budgeting and bookkeeping procedures</li>
            <li> Create and update records and databases with personnel, financial and other data.</li>
            <li>Track stocks of office supplies and place orders when necessary</li>
            <li> Submit timely reports and prepare presentations/proposals as assigned.</li>
            <li>Assist colleagues whenever necessary.</li>
        </ul>
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
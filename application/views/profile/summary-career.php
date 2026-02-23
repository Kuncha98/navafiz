<?php $this->load->view('include/header'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h2>Summary Of Career (Roles & Responsibilities)</h2>
            <form action="<?=base_url('AddMemberSummaryPoints')?>" id="memberpage" method="post">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Career Summary Points</label>
                    <?php for($i=1;$i<11;$i++){?>
                    <p>
                        Point <?=$i;?> <input type="text" placeholder="" class="form-control" id="expected_salary" name="point_<?=$i;?>" value="<?=  isset($summary_points['point_'.$i]) ? $summary_points['point_'.$i]:'';?>" required="">
                    </p>
                    <?php }?>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-primary col-md-12 col-sm-12 col-xs-12"> Save</button>
                </div>
                <input type="hidden" name="point_id" value="<?=isset($summary_points->id) && $summary_points->id>0 ? $summary_points->id:0;?>">
              </form>
        </div>        
    </div>
    <div class="row">
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
</div>
<?php $this->load->view('include/footer'); ?>
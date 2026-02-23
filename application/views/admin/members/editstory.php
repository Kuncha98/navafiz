
<style>
.panel-body ul {
	list-style: none !important;
}
</style>

  
  <section>
        
                <div class="row">
                        

                        <p id="regmessage" class="text-success" style="display:none; font-size:16px; font-weight:bold;"> </p>
                        <div class="col-md-8 offset-2">
                <form class="form-horizontal" method="post" action="<?=base_url('admin/members/update_story').'/'.$story->ss_member_id?>" id="">
                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Subject <span class="required">*</span></label>
                      <input type="text" id="subject" name="subject"  value="<?=(!isset($story->ss_subject)) ? "" : $story->ss_subject?>" class="form-control" required/>

                    </div>
                  </div>


                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                      <label>Detail <span class="required">*</span></label>
                      <textarea type="text" id="descr" name="descr"  class="form-control" rows="10" required><?=(!isset($story->ss_descr)) ? "" : $story->ss_descr?></textarea>

                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12">
                    <button class="btn btn-primary pull-right" type="submit"> Submit <i style="margin-top: 0; font-size: 14px; color: #fff;" class="fa fa-angle-right"></i></button>
                  </div>
                </form>
                        </div>
                </div>
       
  </section>
 


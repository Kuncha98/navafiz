<div class="col-md-2 col-sm-2 blog-sidebar" style="background:#e4e4e4; padding-top:15px; padding-bottom:15px;"> 
  <!-- CATEGORIES START -->
  <h2 class="no-top-space">Search</h2>
  <form action="#" method="post" class="login_page">
    <!--<div class="form-group">
      <select id="s_location" name="s_location" class="form-control">
      <option value="Abu Dhabi">Abu Dhabi</option>
        <option value="Ajman">Ajman</option>
        <option value="Al Ain">Al Ain</option>
        <option value="Dubai">Dubai</option>
        <option value="Fujairah">Fujairah</option>
        <option value="Ras al Khaimah">Ras al Khaimah</option>
        <option value="Sharjah">Sharjah</option>
        <option value="Umm al Quwain">Umm al Quwain</option>
      </select>
      <span  id="emailerror" class="Errorclass"></span> </div>-->
    <div class="form-group">
       <select id="s_location" name="s_location" class="form-control">
      <option value="Abu Dhabi">Abu Dhabi</option>
        <option value="Ajman">Ajman</option>
        <option value="Al Ain">Al Ain</option>
        <option value="Dubai">Dubai</option>
        <option value="Fujairah">Fujairah</option>
        <option value="Ras al Khaimah">Ras al Khaimah</option>
        <option value="Sharjah">Sharjah</option>
        <option value="Umm al Quwain">Umm al Quwain</option>
      </select>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="s_skills" name="s_skills" placeholder="Type Skills, Profession" value="">
      <span  id="emailerror" class="Errorclass"></span> </div>
    <div class="form-group">
      <div id="loading" style="display:none"> <img id="loading-image" src="<?=base_url()?>assets/frontend/images/small.gif" alt="Loading..." /> </div>
    </div>
    <button type="button" class="btn btn-primary" onClick="searchProfessionals()">Search</button>
  </form>
</div>

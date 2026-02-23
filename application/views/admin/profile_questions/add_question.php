<form class="form-horizontal user mt-5" action ="<?=site_url('admin/profile_questions/save_question');?>" method="post" enctype="multipart/form-data">
      
      <div class="">

         <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" style="" class="form-control form-control-user col-6" required="" placeholder="Title" value="">
           
            <label>Option 1 </label>
            <input type="text" name="option_1" style="" class="form-control form-control-user col-6" required="" placeholder="Option 1" value="">
            <label>Option 2 </label>
            <input type="text" name="option_2" style="" class="form-control form-control-user col-6" required="" placeholder="Option 2" value="">
             <label>Option 3 </label>
            <input type="text" name="option_3" style="" class="form-control form-control-user col-6" required="" placeholder="Option 3" value="">
            <label>Type </label>
            <select name="type" class="form-control col-6" required>
                <option value="all">all</option>
                <option value="profile">profile</option>
            </select>
          </div>
         
      </div>
      
       <div class="">
       <button type="submit" class="btn btn-success" style="">Save</button>
      </div>
   
      </form>
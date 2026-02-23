

<form class="form-horizontal user mt-5" action ="<?=site_url('admin/profile_questions/update_question').'/'.$result->id;?>" method="post" enctype="multipart/form-data">
      
      <div class="">

         <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" style="" class="form-control form-control-user col-6" required="" placeholder="Title" value="<?=$result->title?>">
            
            <label>Option 1 </label>
            <input type="text" name="option_1" style="" class="form-control form-control-user col-6" required="" placeholder="Option 1" value="<?=$result->option_1?>">
            <label>Option 2 </label>
            <input type="text" name="option_2" style="" class="form-control form-control-user col-6" required="" placeholder="Option 2" value="<?=$result->option_2?>">
            <label>Option 3 </label>
            <input type="text" name="option_3" style="" class="form-control form-control-user col-6" required="" placeholder="Option 3" value="<?=$result->option_3?>">
            <label>Type </label>
            <select name="type" class="form-control col-6">
                <option value="all"  required <?=$result->type == 'all'? 'selected':'' ?>>all</option>
                <option value="profile" <?=$result->type == 'profile'? 'selected':'' ?>>profile</option>
            </select>
          </div>
         
      </div>
      
       <div class="">
       <button type="submit" class="btn btn-success" style="">Update</button>
      </div>
   
      </form>

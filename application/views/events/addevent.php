<?php $this->load->view('include/header');?>
<style>
    .submitbasil{
        background-color: #00ff00;
        border: 1px solid #00ff00;
        border-radius: 8px;
        color: white;        
    }
    .submitbasil:hover{
        background-color: blue;
        color: red;
    }
</style>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" integrity="sha256-SMGbWcp5wJOVXYlZJyAXqoVWaE/vgFA5xfrH3i/jVw0=" crossorigin="anonymous" />

<!-- datepicker -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" />

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" integrity="sha512-f0tzWhCwVFS3WeYaofoLWkTP62ObhewQ1EZn65oSYDZUg1+CyywGKkWzm8BxaJj5HGKI72PnMH9jYyIFz+GH7g==" crossorigin="anonymous" />




<div class="container-mid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-xs-12 mx-auto">            
                   <form action="<?=base_url('event/addevent')?>" id="memberpage" method="post" enctype="multipart/form-data">
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" placeholder="" class="form-control" name="title" value="" required="">                    
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea type="text" placeholder="" class="form-control" name="description" rows="6" required=""></textarea>                          
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group">
                    <label>City<span class="required">*</span></label>
                    <select class="select-category form-control" name="city_id">
                        <option value="">Select City</option>
                        <option value="1">Abu Dhabi</option>
                        <option value="2">Dubai</option>
                        <option value="3">Sharjah</option>
                        <option value="4">Al Ain</option>
                        <option value="5">Ajman</option>
                        <option value="6">Ras Al Khaimah</option>
                        <option value="7">Fujairah</option>
                        <option value="8">Umm al-Quwain</option>
                        <option value="9">Online</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Event Picture</label>
                    <input type="file" placeholder="" class="form-control"  name="event_picture" required="">                                        
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Event Date</label>                    
                    <input type="text" placeholder="<?=date('Y-m-d h:G A')?>" class="form-control" id="datepicker1" name="event_date" value="<?=date('Y-m-d h:G A')?>" required="">                    
                  </div>
                </div>                
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" placeholder="" class="form-control" name="address" value="" >
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="text" placeholder="" class="form-control" name="location" value="" >
                  </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-success"> Save </button>
                </div>                
            </form>
                </div>
            </div>
        </div>
    </div>    
</div> 




 <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js" integrity="sha512-+UiyfI4KyV1uypmEqz9cOIJNwye+u+S58/hSwKEAeUMViTTqM9/L4lqu8UxJzhmzGpms8PzFJDzEqXL9niHyjA==" crossorigin="anonymous"></script>




<script>
    $("#datepicker1").datetimepicker({
        format: 'Y-m-d g:i A',
//        timeFormat:  "g:i A",
        timepicker:true,
        datepicker:true,
        weeks:false,
        ampm: true, // FOR AM/PM FORMAT
    });

    
    
</script>




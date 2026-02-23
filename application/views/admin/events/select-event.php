



<?php $this->load->view('admin/notification-messages');?>
<div class="card shadow mb-4">


<div class="card-body">
    <form action="<?= site_url('admin/event/sendEventEmail')?>" method="post">
        <div class="container">
            <div class="form-group">
                <div class="row">
                    <div class="offset-2 col-md-6">
                        <label> Select City</label>
                        <select class="form-control" id="select_country">
                           
                            <option value="">Select City</option>
                            <option value="1">Abu Dhabi</option>
                            <option value="2">Dubai</option>
                            <option value="3">Sharjah</option>
                            <option value="4">Al Ain</option>
                            <option value="5">Ajman</option>
                            <option value="6">Ras Al Khaimah</option>
                            <option value="7">Fujairah</option>
                            <option value="8">Umm al-Quwain</option>
                        </select>
                    </div>
                    <div class="offset-2 col-md-6">
                        <label> Select Event</label>
                        <select class="form-control" id="event_select" readonly required name="event_id"> 
                          
                        </select>
                    </div>
                    <!--<div >-->
                    <input class="mt-4 offset-3 col-md-4 btn btn-primary" type="submit" value="Send Email" id="send_email"> 
                    <!--</div>-->
                    
                    </div>
                
            </div>
        </div>
    </form>
</div>
</div>

<script>
    $(document).ready(function () {
        $('#select_country').on('change', function() {
            $('#event_select').find('option').remove().end()
            $('#send_email').hide();
            var city_id = this.value;
//            console.log(city_id);
            $.ajax({
                url:"https:navafiz.com/admin/event/ajax_event/"+city_id,
                method:"POST",
                success: function (data)
                {
//                   console.log(data);
                   console.log('success');
                   $("#event_select").prop("disabled",false);
                   $('#event_select').html(data);
                   $('#send_email').show();
                }
            });
        })
        
//        $('#select_country').on('change', function() {
//          var event_id = this.value;
//          console.log(event_id);
//          $.ajax({
//                url:"<?= site_url('admin/event/send_email')?>/"+event_id,
//                method:"POST",
//                success: function (data)
//                {
////                   console.log(data);
//                   console.log('success');
//                  
//                   $('#event_select').html(data);
//                   $('#send_email').show();
//                }
//            });
//        })
        
    })
</script>

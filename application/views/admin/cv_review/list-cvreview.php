

<div class="card">
        <div class="card-body">
            <div class="row" style="margin-top: 10px;">        
                <div class="col-md-1 col-xs-12">
                    <b>Filter by: </b>                     
                </div>
                <div class="col-md-3 col-xs-12">
                    <select class="select-category form-control" id="review_status">
                        <option value="" required>Select to filter</option>
                        <option value="review_done">Approved</option>
                        <option value="commented">In Process</option>
                        <option value="review_inprocess">Not Assigned</option>
                    </select>
                </div>                                
            </div>
        </div>
</div>
<div class="row" id="cvreviewsData">

</div>
 <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12  text-center">
          <img width="65" style="display:none;" id="loading-image" src="<?= site_url('nassets/img/ajax-loader.gif');?>">
          <p>
              <button class="btn sumbitbtn  paging_page">Load More</button>
          </p>
        </div>
        
    </div>
<input type="hidden" name="limit" value="50" id="limit">


<script>
$(document).ready(function() {
//    $('#dataTable').DataTable();
    
        loadcvreviews(50);
        
        $('#review_status').on('change', function(){
            $('#cvreviewsData').html('');
            var limit = parseInt($('#limit').val());
            b = parseInt(50);
            var total_limit = limit + b;
            loadcvreviews(total_limit);
        })
        
        
        function loadcvreviews(limit){
        $('#loading-image').show();      
        $('#limit').val(limit);
        var review_status = $('#review_status').val();
        var form_data = {
          limit         : limit,
          review_status : review_status,  
        };    
        $.ajax({
          url   : "<?php echo site_url('admin/cvreview/cvreviewsajax')?>",
          type  : 'POST',
          data  : form_data,
          success : function(data){
            // alert(data);
            $("#profloading").hide();
            $('#cvreviewsData').html(data);
          },
          complete:function(){
            $('.paging_page').show();
            $('#loading-image').hide();
          }
        }); 
    }

    $(document).on('click', '.paging_page', function(){  
        var limit       = parseInt($('#limit').val());
        b = parseInt(50);
        var total_limit = limit + b;
        loadcvreviews(total_limit);
    });    
    function appent(){
        
    }
} );


</script>
